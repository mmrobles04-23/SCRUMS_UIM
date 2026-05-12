<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bienvenido al Sistema UIM</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #1a365d;
            /* UNAM Azul */
            color: #ffffff;
            text-align: center;
            padding: 30px 20px;
            border-bottom: 5px solid #d4af37;
            /* UNAM Dorado */
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 40px 30px;
            line-height: 1.6;
        }

        .content h2 {
            color: #1a365d;
            font-size: 20px;
            margin-top: 0;
        }

        .credentials-box {
            background-color: #f8f9fa;
            border-left: 4px solid #1a365d;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 4px;
        }

        .credentials-box p {
            margin: 5px 0;
            font-size: 15px;
        }

        .btn-container {
            text-align: center;
            margin: 35px 0;
        }

        .btn {
            display: inline-block;
            background-color: #d4af37;
            /* UNAM Dorado */
            color: #1a365d;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #c19b2e;
        }

        .footer {
            background-color: #f4f7f6;
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
            border-top: 1px solid #eeeeee;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Unidad de Investigación Multidisciplinaria Aplicada</h1>
        </div>

        <div class="content">
            <h2>¡Hola, {{ $user->nombre }}!</h2>

            <p>Te damos la más cordial bienvenida al sistema administrativo de la Unidad de Investigación
                Multidisciplinaria Aplicada (UIMA) de la FES Acatlán.</p>

            <p>Tu cuenta ha sido creada exitosamente. A continuación, te compartimos tus credenciales de acceso:</p>

            <div class="credentials-box">
                <p><strong>Usuario:</strong> {{ $user->name }}</p>
                <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
                <p><strong>Contraseña:</strong> {{ $password }}</p>
            </div>

            <p>Por motivos de seguridad, te sugerimos cambiar tu contraseña una vez que hayas ingresado al sistema por
                primera vez.</p>

            <div class="btn-container">
                <a href="{{ $loginUrl }}" class="btn">Acceder al Sistema</a>
            </div>

            <p>Si tienes alguna duda o problema para ingresar, no dudes en contactar al administrador del sistema.</p>

            <p>Atentamente,<br>
                <strong>El equipo de UIMA FES Acatlán</strong>
            </p>
        </div>

        <div class="footer">
            Este es un correo generado automáticamente, por favor no respondas a este mensaje.
        </div>
    </div>

</body>

</html>