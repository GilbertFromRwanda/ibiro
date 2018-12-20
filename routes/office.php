<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('office')->user();

    //dd($users);

    return view('office.home');
})->name('home');

