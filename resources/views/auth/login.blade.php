<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="post">
    @csrf
        Usuario
        <input type="email" name="email">
        Contraseña
        <input type="password" name="password">
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>