<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration confirm</title>
</head>

<body>
<h1>Спасибо за регистрацию!</h1>

<p>Переидите по ссылке для завершения регистрации
<a href='{{ url("register/confirm/{user->token}") }}'>Ссылка</a>
</p>

</body>
</html>