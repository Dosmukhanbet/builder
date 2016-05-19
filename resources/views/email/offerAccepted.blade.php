<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Новая заявка</title>
</head>

<body>
            <h3>Ваше предложение принято!</h3>
            Уважаемый пользователь, Ваше предложение было принято.

            {{--Данные автора заявки--}}
              <h4>Данные создателя заявки:</h4>
              <ul>
                  <li>Имя: {{ $jobcreator->name }}</li>
                  <li>Мобильный номер: {{ $jobcreator->phone_number }}</li>
                  <li>Электронный адрес: {{ $jobcreator->email }}</li>
              </ul>

             </body>
</html>