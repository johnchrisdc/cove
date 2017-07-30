<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cove</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialized.css') }}"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            html, body {
                background-color: #fff;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: 100;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    The Cove
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(".dropdown-button").dropdown();
</script>
