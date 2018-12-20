<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ibiro</title>

        <!-- Fonts -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
<link rel="icon" type="image/jpg" href="{!! asset('img/logos.jpg') !!}" />

    </head>
    <body>
        <div class="container">
        <div class="row">
          <div class="login-page">
            <div class="col-md-4 col-md-offset-4">
              <center>
               <img src="{!! asset('img/logos.jpg')!!}" alt=""class="login-logo">
              </center>
               <form class="form-horizontal" role="form" method="POST" action="{{ url('/office/login') }}"
                autocomplete="off">
                           {{ csrf_field() }}
           <div class="form-group" id="loginGroup">
         <input id="Office_code" type="text" class="form-control" name="Office_code"
         value="{{ old('Office_code') }}" required autofocus placeholder="Your Code">

                         @if ($errors->has('Office_code'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('Office_code') }}</strong>
                             </span>
                         @endif
           <input id="password" type="password" class="form-control" name="password" required placeholder="Your password">

                   @if ($errors->has('password'))
                       <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
           </div>
          <div class="form-group">
             <center>
               <button class="btn btn-primary" type="submit" id="btnLogin">Login
               </button></center>
           </div>
       </form>
   </div>
    </div>

  </div>
  </div>


 <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/langue.js')}}"></script>
    </body>
</html>
