<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function edit(): View
    {
        $settings = Setting::where('group', 'welcome')->get()->keyBy('key');
        return view('admin.welcome.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = Setting::where('group', 'welcome')->get();

        foreach ($settings as $setting) {
            $key = $setting->key;

            if ($setting->type === 'image' && $request->hasFile($key)) {
                if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }
                $path = $request->file($key)->store('welcome', 'public');
                Setting::set($key, $path);
            } elseif ($setting->type === 'boolean') {
                Setting::set($key, $request->boolean($key));
            } elseif ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return redirect()->route('admin.welcome.edit')->with('status', 'Configuración actualizada correctamente.');
    }
}
