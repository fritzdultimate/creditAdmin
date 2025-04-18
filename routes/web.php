<?php

use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/email', function() {
    // $app_name = env('APP_NAME');
    $emi = 'emekaonuorah453@gmail.com';
    $gary = 'gary.mcrobie@gmail.com';
    $data = [
        'view' => 'emails.admin.hoa',
        'subject' => "Congratulations on Your Appointment as Head of Administrator (HOA)",
        'name' => 'Mr. McRobie Gary'
    ];
    Mail::to($gary)->queue(new CustomMail($data));
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

Route::get('/reconsider', function() {
    // $app_name = env('APP_NAME');
    $emi = 'emekaonuorah453@gmail.com';
    $gary = 'gary.mcrobie@gmail.com';
    $fritz = 'fritzdultimate@gmail.com';
    $data = [
        'view' => 'emails.admin.consider',
        'subject' => "Important Update Regarding Your Position & Commission Structure",
        'name' => 'Mr. McRobie Gary',
    ];
    Mail::to($gary)->queue(new CustomMail($data));
});

Route::get('/tax', function() {
    // $app_name = env('APP_NAME');
    $emi = 'emekaonuorah453@gmail.com';
    $gary = 'gary.mcrobie@gmail.com';
    $fritz = 'fritzdultimate@gmail.com';
    $data = [
        'view' => 'emails.admin.tax',
        'subject' => "Monthly Tax & Service Fee Notification",
        'name' => 'Mr. McRobie Gary',
    ];
    Mail::to($gary)->queue(new CustomMail($data));
});

Route::get('/payment-details', function() {
    // $app_name = env('APP_NAME');
    $emi = 'emekaonuorah453@gmail.com';
    $gary = 'gary.mcrobie@gmail.com';
    $fritz = 'fritzdultimate@gmail.com';
    $data = [
        'view' => 'emails.admin.payment-details',
        'subject' => "Monthly Tax & Service Fee Notification",
        'name' => 'Mr. McRobie Gary',
    ];
    Mail::to($gary)->queue(new CustomMail($data));
});
