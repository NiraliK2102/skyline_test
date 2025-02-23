PHP 8.2.12 — Laravel 11.43.2

Database name:
skyline_test_db

To Run The Code:

composer install
composer create-project --prefer-dist laravel/laravel skyline_test
cd skyline_test
php artisan migrate
php artisan serve --host=127.0.0.1


Authentication URL's:

1. Register - Method POST:

http://127.0.0.1:8000/api/register 
{
    "name":"userone",
    "email": "user123@gmail.com",
    "password":"4444",
    "password_confirmation":"4444"
}


2. Login - Method POST:

http://127.0.0.1:8000/api/login 
{
    "email": "user123@gmail.com",
    "password":"3333"
}

3.Logout - Method POST:

http://127.0.0.1:8000/api/logout

AuthType - Bearer Token


ToDo URL's:

1. Add a TODO (Method POST) - http://127.0.0.1:8000/api/todos
2. Edit a TODO (Method PUT) - http://127.0.0.1:8000/api/todos/{id}
3. GET ALL TODOS (Method GET) - http://127.0.0.1:8000/api/todos
4. GET a TODO (Method GET) - http://127.0.0.1:8000/api/todos/{id}
5. Delete a TODO (Method DELETE) - http://127.0.0.1:8000/api/todos/{id}

AuthType - Bearer Token 
Header : 
    key - Accept 
    value - application/json