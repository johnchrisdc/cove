<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialized.css') }}"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body>
        <div class="navbar-fixed">
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </ul>
            <nav>
              <div class="container">
                  <div class="nav-wrapper">
                      <a href="/" class="brand-logo">Cove</a>
                      <ul id="nav-mobile" class="right">
                          @if (Route::has('login'))
                              @if (Auth::check())
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                @if (Auth::user()->is_admin)
                                  <li><a href="{{ url('/admin') }}">Admin</a></li>
                                @endif
                                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->firstname }}<i class="material-icons right">arrow_drop_down</i></a></li>
                              @else
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                              @endif
                          @endif
                      </ul>
                  </div>
              </div>
            </nav>
        </div>

    </body>
</html>
<script>
    $(".dropdown-button").dropdown();
</script>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
