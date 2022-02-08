<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| to be more easy work with large projects we must split our route file to many
| files in this case we use another route file for Admin and
| to declare this file to system we go to app/Providers/RouteServiceProvider.php
*/

Route::get('/admin', function () {
    return "Hello From Admin";
});
