<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Новая заявка</title>
</head>
 
<body>
            <h1>Новая заявка!</h1>
            Уважаемый пользователь, в категории {{ $categories[$job->category_id] }} была добавлена новая заявка.
                <a href='{{ url("master/active/jobs/") }}'>Переити к активным заявкам </a>

             </body>
</html>