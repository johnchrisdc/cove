<html>
    <head>
        <title>Admin :: Groups</title>

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
          <br>
          <div class="row">
            <a class="waves-effect waves-light btn modal-trigger" href="#modal_new_group">New Group</a>

            <div class="card-panel white">
              <table>
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Leader</th>
                      <th>Members</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($groups as $group)
                    <tr>
                      <td>{{ $group->name }}</td>
                      <td>{{ $group->leader->getName() }}</td>
                      <td></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>

    <div id="modal_new_group" class="modal modal-fixed-footer">
      <form method="POST" action="{{ route('new_group') }}">
        {{ csrf_field() }}
        <div class="modal-content">
          <h5>New Group</h5>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="name" name="name" type="text" class="validate">
                <label for="name">Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <select name="leader_id">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->firstname . ", " . $user->lastname }}</option>
                  @endforeach
                </select>
                <label>Leader</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description">Description</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn waves-effect waves-light" type="submit" name="action">Create
          </button>
        </div>
      </form>
    </div>

    </body>
</html>
@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
     <script>
          Materialize.toast('{{$error}}', 3000, 'rounded');
     </script>
  @endforeach
@endif
<script>
    $(".dropdown-button").dropdown();
    $('.modal').modal();
    $('select').material_select();
</script>
