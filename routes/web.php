<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Route::redirect('/', '/admin');
});
