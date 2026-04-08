<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Validation\ValidationException;

class WebPasswordResetController extends Controller
{
    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $payload = $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $payload['email'])->first();

        if (!$user) {
            return redirect()->route('web.reset.form')->with('status', 'Si su correo electrónico está registrado, recibirá un código de restablecimiento.');
        }

        $code = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);

        DB::table('password_reset_codes')->updateOrInsert(
            ['email' => $payload['email']],
            [
                'token' => Hash::make($code),
                'created_at' => now(),
            ]
        );

        Mail::to($user)->send(new PasswordResetCode($code));

        return redirect()->route('web.reset.form')->with('status', 'Código de restablecimiento enviado a su correo electrónico.');
    }

    public function showReset()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|size:8',
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->mixedCase()->numbers()->symbols(),
            ],
        ]);

        $record = DB::table('password_reset_codes')->where('email', $request->email)->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            throw ValidationException::withMessages(['token' => 'Código de restablecimiento inválido o expirado.']);
        }

        if (now()->diffInMinutes($record->created_at) > 15) {
            throw ValidationException::withMessages(['token' => 'Código de restablecimiento expirado.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        DB::table('password_reset_codes')->where('email', $request->email)->delete();

        return redirect()->route('web.login')->with('status', 'Contraseña restablecida con éxito.');
    }
}
