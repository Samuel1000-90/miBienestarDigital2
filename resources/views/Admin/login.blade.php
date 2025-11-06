<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador | Mi Bienestar Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container {
            max-width: 400px;
            margin: 120px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-warning {
            background-color: #ffcc00;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3 class="text-center mb-4">Login Administrador</h3>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>


