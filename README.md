<h1>Protected.net Trial Task</h1>

This project is developed with XAMPP, Laravel and Postman.


<h2>Start Project:</h2>
    
    php artisan serve


<h2>DB Migrate and Seed:</h2>
    
    Up: php artisan migrate
    
    Down (all): php artisan migrate:rollback

    php artisan db:seed --class=UsersTableSeeder


<h2>PHPUnit Test:</h2>

    vendor/bin/phpunit.bat tests/Unit/UsersTest.php


<h2>cUrl commands:</h2>

<b>Create User</b>

    curl -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" -d 'first_name=Curl1&last_name=api&username=curl1&dark_mode=0' http://example.com/api/users


<b>Update Name</b>

    curl -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" -d 'last_name=apiUpdated' -X PUT http://example.com/api/users/40

<b>Toggle DarkMode ON</b>

    curl -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" -d 'dark_mode=1' -X PUT http://example.com/api/users/40

<b>Toggle DarkMode OFF</b>

    curl -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" -d 'dark_mode=0' -X PUT http://example.com/api/users/40

<b>Delete User</b>

    curl  -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" -X DELETE http://example.com/api/users/41

<b>List Users</b>

    curl -H "token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3" http://example.com/api/users

<b>Search By first name and username</b>

    curl --location --request POST 'http://127.0.0.1/api/users/search' \
    --header 'Content-Type: application/json' \
    --header 'token: 9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3' \
    --data-raw '{
        "first_name":"Barry",
        "username":"theflash"
    }'
