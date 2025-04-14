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
        'name' => 'Mr. McRobie Gary'
    ];
    Mail::to('emekaonuorah453@gmail.com')->queue(new CustomMail($data));
});

Route::get('/job', function() {
    // $app_name = env('APP_NAME');
    $emi = 'emekaonuorah453@gmail.com';
    $gary = 'gary.mcrobie@gmail.com';
    $data = [
        'view' => 'emails.admin.job_offer',
        'subject' => "Job Offer: Head of Administrator Position at Credit Tide",
        'name' => 'Mr. McRobie Gary',
    ];
    Mail::to($gary)->queue(new CustomMail($data));
});
