<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ibiro</title>
    <link rel="stylesheet" href="{!! asset('css/dashboard.css')!!}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap/css/bootstrap.css')!!}">
    <link rel="stylesheet" href="{!! asset('css/font-awesome/css/font-awesome.css')!!}">
    <link rel="icon" type="image/jpg" href="{!! asset('img/logos.jpg') !!}" />
  </head>
  <body>
     @include('office.office-changeprofile');
   <div class="introduction">
     @isset($oname)
       {!!$oname!!}

     @endisset

   </div>
   <section class="dashboard-all">
     <header>
       <div class="col-md-12 col-sm-12">
      <div class="logo">
        <img src="{!! asset('img/republick.png')!!}" alt="" class="logo-img">
      </div>
      <span class="glyphicon glyphicon-list" id="humbuger"></span>
      <nav class="navigation-bar">
        <ul>
          <li class="list-1"><a href="/office/staff">
            <span class="fa fa-user" id="menu-icon"></span>
            <span class="menu-title">Staff</span>
          </a>
        </li>
          <li class="list-1"><a href="#">
            <span class="fa fa-user-secret" id="menu-icon"></span>
            <span class="menu-title">Bwira Abaturage</span>
            <span class="fa fa-caret-down"></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="/office/office-announce">
              <span class="fa fa-eercast" id="menu-icon"></span>
              <span class="menu-title">Itangazo</span>
                </a>
            </li>
            <li><a href="/office/office-inama">
              <span class="fa fa-podcast" id="menu-icon"></span>
              <span class="menu-title">Ibyavugiwe mu nama</span></a></li>
            <li><a href="/office/office-agenda">
              <span class="fa fa-building" id="menu-icon"></span>
              <span class="menu-title">Gahunda y'Ibiro</span></a>
            </li>
            <li><a href="/office/empAbsence">
              <span class="fa fa-building-o" id="menu-icon"></span>
              <span class="menu-title">Abakozi badahari</span>
             </a>
            </li>
           </ul>

        </li>
          <li class="list-1"><a href="#">
            <span class="fa fa-free-code-camp" id="menu-icon"></span>
            <span class="menu-title">Ibyatangajwe</span>
            <span class="fa fa-caret-down"></span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{url('/office/viewamatangazo')}}">
                <span class="fa fa-eercast" id="menu-icon"></span>
                <span class="menu-title">Amatangazo</span>
                  </a>
              </li>
              <li><a href="{{url('office/viewinama')}}">
                <span class="fa fa-podcast" id="menu-icon"></span>
                <span class="menu-title">Ibyavugiwe mu nama</span></a></li>
              <li><a href="{{url('office/viewofficeagenda')}}">
                <span class="fa fa-building" id="menu-icon"></span>
                <span class="menu-title">Gahunda y'Ibiro</span></a>
              </li>
              <li><a href="{{url('office/viewunavailable')}}">
                <span class="fa fa-building-o" id="menu-icon"></span>
                <span class="menu-title">Abakozi Bataraboneka</span>
              </a></li>
            </ul>
          </li>
          <li><a href="{{url('/office/comments')}}" class="office_inbox">
            <span class="fa fa-envelope" id="menu-icon"></span>
            <span class="menu-title">Ubutumwa</span> <span class="badge">10</span
            </a></li>
          <li id="konti"><a href="#">
            <span class="fa fa-cog" id="menu-icon"></span>
            <span class="menu-title">Konti Yanjye</span>
        </a></li>
          <li> <a href="{{ route('logoutO')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
            <span class="fa fa-power-off" id="menu-icon"></span>
            <span class="menu-title">Gusohoka</span>
          </a>
          <form id="logout-form" action="{{ route('logoutO') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

        </li>
        </ul>
      </nav>
    </div>
     </header>
     @yield('dashboard-content')

   </section>
  <script type="text/javascript" src="{!! asset('js/jquery.min.js')!!}"></script>
  <script type="text/javascript" src="{!! asset('js/dashboard-menu.js')!!}"></script>
  <script type="text/javascript" src="{!! asset('js/dashboardScroll.js')!!}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  @yield('script')
  </body>
</html>
