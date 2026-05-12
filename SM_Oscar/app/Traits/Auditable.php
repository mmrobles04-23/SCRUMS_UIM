<?php

namespace App\Traits;

use App\Models\LogAuditoria;

trait Auditable
{
    /**
     * Boot the auditable trait for a model.
     *
     * @return void
     */
    public static function bootAuditable()
    {
        static::created(function ($model) {
            $model->logAuditoria('Creado', null, $model->getAttributes());
        });

        static::updated(function ($model) {
            $model->logAuditoria('Actualizado', $model->getOriginal(), $model->getChanges());
        });

        static::deleted(function ($model) {
            $model->logAuditoria('Eliminado', $model->getAttributes(), null);
        });
    }

    /**
     * Registra la auditoría en la base de datos.
     *
     * @param string $accion
     * @param array|null $viejos
     * @param array|null $nuevos
     * @return void
     */
    protected function logAuditoria(string $accion, ?array $viejos = null, ?array $nuevos = null)
    {
        // En algunos casos (ej. comandos de consola) no habrá usuario autenticado o request
        $userId = auth()->check() ? auth()->id() : null;
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        // Eliminar campos sensibles de los logs, ej: contraseñas
        if ($viejos && isset($viejos['password'])) {
            unset($viejos['password']);
        }
        if ($nuevos && isset($nuevos['password'])) {
            unset($nuevos['password']);
        }

        LogAuditoria::create([
            'user_id' => $userId,
            'accion' => $accion,
            'modelo' => class_basename($this),
            'modelo_id' => $this->id,
            'valores_viejos' => empty($viejos) ? null : $viejos,
            'valores_nuevos' => empty($nuevos) ? null : $nuevos,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
        ]);
    }
}
