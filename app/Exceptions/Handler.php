<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
      protected $dontFlash = [
        'password',
        'password_confirmation',
        ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {

        /* Mail::send(['text' =>'mail'],['name' =>'gilbert'],function($message){

    .$message->to('niyogibertos@gmail.com','TO gilbert')->subject('Problem found in Ibiro_apps')->from('niyogibertos@gmail.com','Niyonsaba');
    });*/
  //return view('errors.500');
        parent::report($exception);

    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
///return view('errors.500');
    return parent::render($request, $exception);
    }
}
