<html>
    <head>
        <title>Login</title>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialized.css') }}"  media="screen,projection"/>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
              <div class="container">
                  <div class="nav-wrapper">
                      <a href="/" class="brand-logo">Cove</a>
                      <ul id="nav-mobile" class="right">
                          @if (Route::has('login'))
                              @if (Auth::check())
                                <li><a href="{{ url('/home') }}">Home</a></li>
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

        <br>

        <div class="container">
          <div class="row">
              <div class="card-panel white col s12 m8 l6 push-m2 push-l3">
                  <div class="row">
                    <br>
                      <form class="col s12" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}
                          <div class="row">
                          <div class="row center-align">
                            <div class="input-field col s10 m8 push-m2 push-s1">
                                <input id="email" name="email" type="email" class="validate">
                                <label for="email">E-mail</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s10 m8 push-m2 push-s1">
                              <input id="password" name="password" type="password" class="validate">
                              <label for="password">Password</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col s7 push-m2 push-s1">
                              <button class="btn waves-effect waves-light" type="submit" name="action">Login
                              </button>
                            </div>
                          </div>

                      </form>
                  </div>
              </div>
            </div>
          </div>

    </body>
</html>
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
