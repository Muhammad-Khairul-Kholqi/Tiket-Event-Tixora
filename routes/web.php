<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.public.landing.home');
});
