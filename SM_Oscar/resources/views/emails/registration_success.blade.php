<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido a CoreAppmedia</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #2d3748;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .content {
            padding: 40px;
            color: #4a5568;
            line-height: 1.6;
        }
        .content h2 {
            color: #2d3748;
            margin-top: 0;
        }
        .details {
            background-color: #edf2f7;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
            font-weight: bold;
        }
        .details span {
            font-weight: normal;
        }
        .footer {
            background-color: #edf2f7;
            color: #718096;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }
        .btn {
            display: inline-block;
            background-color: #4299e1;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #3182ce;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UIM FES ACATLÁN</h1>
        </div>
        <div class="content">
            <h2>¡Bienvenido, {{ $user->nombre }}!</h2>
            <p>Tu registro en nuestra plataforma ha sido exitoso. Para completar el proceso y activar tu cuenta de administrador, debes verificar tu correo electrónico.</p>
            
            <div class="details">
                <p>Nombre Completo: <span>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</span></p>
                <p>Correo Electrónico: <span>{{ $user->email }}</span></p>
            </div>

            <p style="text-align: center; margin: 30px 0;">
                <strong>¡Importante!</strong><br>
                Haz clic en el siguiente botón para verificar tu cuenta y obtener permisos de administrador:
            </p>

            <center>
                <a href="{{ $verificationUrl }}" class="btn" style="background-color: #1E3C70;">Verificar mi cuenta de Administrador</a>
            </center>

            <p style="font-size: 12px; color: #718096; margin-top: 30px; text-align: center;">
                Si no puedes hacer clic en el botón, copia y pega este enlace en tu navegador:<br>
                <a href="{{ $verificationUrl }}" style="color: #1E3C70;">{{ $verificationUrl }}</a>
            </p>

            <p style="margin-top: 30px; font-size: 14px; color: #e53e3e; text-align: center;">
                <strong>Nota:</strong> Si no verificas tu cuenta, no podrás iniciar sesión en la plataforma.
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} UIM FES ACATLÁN. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
