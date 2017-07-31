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

            <table>
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->firstname . ", " . $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if ($user->getGroup() != null)
                        {{ $user->getGroup()->name }}
                      @endif
                    </td>
                    <td>
                      <form method="POST" action="{{ Route('make_leader', $user->id) }}">
                        {{ csrf_field() }}
                        @if(!$user->is_leader)
                          <button class="btn waves-effect waves-light green darken-1" type="submit" name="action">Make leader</button>
                        @else
                          <button class="btn waves-effect waves-light red darken-1" type="submit" name="action">Remove leader</button>
                        @endif
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
    </body>
</html>
<script>
    $(".dropdown-button").dropdown();
</script>
