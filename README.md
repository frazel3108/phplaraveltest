# phplaraveltest

Перед началом работы необходимо в дирректории создать папку `databases`

При желании можно настроить в файлах `docker-compose.yml` и `laravel/.env` пароль к базе данных.
____
После запуска `docker-compose up --build` необходимо перейти в adminer по адресу *http://127.0.0.1:6080/*

Авторизовавшись создать базу данных **php_laravel** c utf8mb4_general_ci
____
Открыв терминал необходимо выполнить вход в контейнер сервиса web: `docker-compose exec web bash`

Выполнить генерацию ключа: `php artisan key:generate`
Выполнить миграцию базы данных `php artisan migrate`
Заполнить базу данных тестовыми значениями вы можете при помощи команды `php artisan db:seed --class=NotebooksTableSeeder`
____
Можно переходить к самому заданию: *http://127.0.0.1:8080/public*

Документация Swagger: *http://127.0.0.1:8080/public/api/documentation*
____
Для тестирования работоспособности кода использовался инструмент Postman для отправки запросов
