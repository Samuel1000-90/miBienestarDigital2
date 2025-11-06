<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador | Mi Bienestar Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; background-color: #f8f9fa; }
        .sidebar { width: 220px; height: 100vh; background-color: #000; color: white; padding-top: 30px; position: fixed; }
        .sidebar a { color: white; display: block; padding: 10px 20px; text-decoration: none; }
        .sidebar a:hover { background-color: #343a40; }
        .content { margin-left: 240px; padding: 30px; width: 100%; }
        .btn-warning { background-color: #ffcc00; color: black; font-weight: bold; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center mb-4">Administrador</h4>
        <a href="#">Inicio</a>
        <a href="#">Usuarios</a>
        <a href="#">Reportes</a>
        <a href="{{ url('/admin/logout') }}">Cerrar Sesión</a>
    </div>

    <div class="content">
        <div class="container">
            <div class="card p-4 mb-4 shadow-sm">
                <h4>Bienvenido, Administrador</h4>
                <p>Gestione la información de los usuarios y supervise el progreso en sus hábitos.</p>
            </div>

            <div class="card p-4 shadow-sm">
                <h5>Usuarios Registrados</h5>
                <p>Aquí puedes ver y gestionar los usuarios de MiBienestarDigital.</p>
                <a href="#" class="btn btn-warning">Gestionar Usuarios</a>
            </div>

            <div class="card p-4 shadow-sm">
                <h5>Ver Reportes</h5>
                <p>Revisa estadísticas de hábitos y avances de los usuarios.</p>
                <a href="#" class="btn btn-warning">Ver Reportes</a>
            </div>
        </div>
    </div>
</body>
</html>

