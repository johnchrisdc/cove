<html>
    <head>
        <title>Admin</title>

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
            <nav>
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </ul>
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
                              @endif
                          @endif
                      </ul>
                  </div>
              </div>
            </nav>
        </div>

        <br>

        <div class="container">
          <div class="row">

            <div class="col s12 m6 l4">
              <div class="card grey darken-3">
                <div class="card-content white-text">
                  <span class="card-title">Users</span>
                  <p>Lorem Ipsum Dolor Sit Amet.</p>
                </div>
                <div class="card-action">
                  <a href="{{ url('/admin/users') }}">Manage</a>
                </div>
              </div>
            </div>

            <div class="col s12 m6 l4">
              <div class="card light-blue darken-4">
                <div class="card-content white-text">
                  <span class="card-title">Groups</span>
                  <p>Lorem Ipsum Dolor Sit Amet.</p>
                </div>
                <div class="card-action">
                  <a href="{{ url('/admin/groups') }}">Manage</a>
                </div>
              </div>
            </div>

            <div class="col s12 m6 l4">
              <div class="card teal darken-3">
                <div class="card-content white-text">
                  <span class="card-title">Posts</span>
                  <p>Lorem Ipsum Dolor Sit Amet.</p>
                </div>
                <div class="card-action">
                  <a href="#">Manage</a>
                </div>
              </div>
            </div>

          </div>
        </div>
    </body>
</html>
<script>
    $(".dropdown-button").dropdown();
</script>
