<?php

Route::get('/supervisor', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('getinfo')->user();

    //dd($users);

    return view('getinfo.supervisor');
})->name('homegetinfo');
