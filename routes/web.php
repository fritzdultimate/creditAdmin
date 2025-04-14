<?php

use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/email', function() {
    // $app_name = env('APP_NAME');
    $data = [
        'view' => 'emails.admin.hoa',
        'subject' => "Congratulations on Your Appointment as Head of Administrator (HOA)",
    ];
    Mail::to('emekaonuorah453@gmail.com')->queue(new CustomMail($data));
});
