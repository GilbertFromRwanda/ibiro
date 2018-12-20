<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gracian">
    <meta name="author" content="Gilbert">
    <meta name="keywords" content="Gahunda, Umuyobozi utaraboneka kubiro, amatangazo, Gushima ,Kunenga, ibiro, Uturere, imirenge"/>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Ibiro') }}</title>
    <link rel="stylesheet" href="{!! asset('css/office.css')!!}">
    <link rel="stylesheet" href="{!! asset('css/board.css')!!}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap/css/bootstrap.css')!!}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/jpg" href="{!! asset('img/logos.jpg') !!}" />
    <link rel="stylesheet" href="{!! asset('css/display.css')!!}">
  </head>
  <body>
    <header>
      <div class="mobile-header">
       <nav class="mob-navigation">
         <ul>
           <li><a href="/">Ahabanza</a></li>
           <li><a href="{{route('districts')}}">Akarere</a></li>
            <li><a href="{{route('sectors')}}">Umurenge</a></li>
            <li><a href="#">Abo turibo</a></li>
            <li><a href="#">Ubufasha</a></li>
            @auth('getinfo')
          <li> <a href="{{ route('logout')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" onclick="event.preventDefault();
                                   document.getElementById('logout_supervisor').submit();">
            <span class="fa fa-power-off" id="menu-icon"></span>
            <span class="menu-title">Gusohoka(supervisor)</span>
          </a>
          <form id="logout_supervisor" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
        </li>
      @endauth
         </ul>
       </nav>
      </div>
    <span class="glyphicon glyphicon-list" id="humber"></span>
    <a  href="#">
  <button type="button" class="log-sm" onclick="window.location.href='{{route('login')}}'"><span class="fa fa-user-secret"></span></button>


   </a>
   <form id="logout_supervisor" action="{{ route('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
       </form>
     <nav class="navigation">
     <ul>
       <li><a href="/">Ahabanza</a></li>
       <li><a href="{{route('districts')}}">Akarere</a></li>
        <li><a href="{{route('sectors')}}">Umurenge</a></li>
     </ul>
     </nav>
     <img src="{!! asset('img/logos.jpg') !!}" class="logo">
     <nav class="navigation1">
     <ul>
        <li><a href="#">Abo turibo</a></li>
        <li><a href="#">Ubufasha</a></li>
         @auth('getinfo')
       <li> <a href="{{ route('logout')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" onclick="event.preventDefault();
                                document.getElementById('logout_supervisor').submit();">
         <span class="fa fa-power-off" id="menu-icon"></span>
         <span class="menu-title">Gusohoka(supervisor)</span>
       </a>
       <form id="logout_supervisor" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
           </form>
     </li>
   @endauth
     </ul>
     </nav>
    </header>
   @yield('content')

   <script type="text/javascript" src="{!! asset('js/jquery.min.js')!!}"></script>
   <script type="text/javascript" src="{!! asset('js/scroll.js')!!}"></script>
   <script type="text/javascript" src="{!! asset('js/slide.js')!!}"></script>
   @yield('script')
</body>
</html>
