<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogAuditoriaController extends Controller
{
    public function index()
    {
        // Solo usuarios con permiso_id = 1 (Desarrollador) pueden ver los logs
        abort_if(!auth()->check() || auth()->user()->permiso_id != 1, 403, 'No autorizado para ver logs de auditoría.');

        $logs = \App\Models\LogAuditoria::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.logs.index', compact('logs'));
    }
}
