<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Inscripción</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .header { background-color: #1E3C70; color: #ffffff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 30px; }
        .content h2 { color: #1E3C70; border-bottom: 2px solid #D4AF37; padding-bottom: 10px; margin-top: 0; }
        .data-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .data-table th { text-align: left; padding: 10px; background-color: #f9f9f9; border-bottom: 1px solid #eee; width: 40%; }
        .data-table td { padding: 10px; border-bottom: 1px solid #eee; }
        .badge { display: inline-block; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 14px; }
        .badge-gold { background-color: #D4AF37; color: #fff; }
        .footer { background-color: #f9f9f9; color: #777; padding: 20px; text-align: center; font-size: 12px; border-top: 1px solid #eee; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #D4AF37; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    @php
        $esSeminario = $inscripcion->seminario !== null;
        $esCongreso = $inscripcion->congreso !== null;
        $evento = $esSeminario ? $inscripcion->seminario : ($esCongreso ? $inscripcion->congreso : null);
        $tipoEvento = $esSeminario ? 'Seminario' : ($esCongreso ? 'Congreso' : 'Evento');
        $urlVerMas = $esSeminario ? url('/investigacion') : url('/congreso');
        $textoVerMas = $esSeminario ? 'Ver más Seminarios' : 'Ver más Congresos';
    @endphp

    <div class="container">
        <div class="header">
            <h1>UIMA — UNAM</h1>
            <p style="margin-top: 10px; opacity: 0.9;">Unidad de Investigación Multidisciplinaria Aplicada</p>
        </div>
        <div class="content">
            <h2>Confirmación de Inscripción</h2>
            <p>Hola <strong>{{ $inscripcion->nombre_completo }}</strong>,</p>
            <p>Te confirmamos que te has inscrito exitosamente al siguiente {{ strtolower($tipoEvento) }}:</p>
            
            <table class="data-table">
                <tr>
                    <th>{{ $tipoEvento }}:</th>
                    <td><strong>{{ $evento->titulo ?? 'N/A' }}</strong></td>
                </tr>
                <tr>
                    <th>Número de Registro:</th>
                    <td><span class="badge badge-gold">{{ $inscripcion->numero_registro }}</span></td>
                </tr>
                <tr>
                    <th>Fecha de Registro:</th>
                    <td>{{ $inscripcion->created_at->format('d/m/Y H:i') }} hrs.</td>
                </tr>
                @if($esSeminario && $evento->lugar)
                <tr>
                    <th>Lugar:</th>
                    <td>{{ $evento->lugar }}</td>
                </tr>
                @endif
                @if($esCongreso && $evento->sede)
                <tr>
                    <th>Sede:</th>
                    <td>{{ $evento->sede }}</td>
                </tr>
                @endif
            </table>

            <p>Por favor, conserva tu número de registro, ya que podría ser solicitado para el ingreso o la entrega de constancias.</p>
            
            <div style="text-align: center;">
                <a href="{{ $urlVerMas }}" class="btn">{{ $textoVerMas }}</a>
            </div>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} FES Acatlán — UNAM. Todos los derechos reservados.</p>
            <p>Este es un correo automático, por favor no respondas a este mensaje.</p>
        </div>
    </div>
</body>
</html>
