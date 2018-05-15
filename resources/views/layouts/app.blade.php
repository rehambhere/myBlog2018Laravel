<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('style')
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
        <div class="container">
           <div class="row">
               @if(\Illuminate\Support\Facades\Auth::user())
          <div class="col-md-4">
            @if(\Illuminate\Support\Facades\Auth::user()->admin)
              <ul class="list-group">
                  <li class="list-group-item"><a href="{{route('users.index')}}">All user</a> </li>

              </ul>
              <ul class="list-group">
                  <li class="list-group-item"><a href="{{route('users.create')}}">create new user</a> </li>

              </ul>
         @endif
              <ul class="list-group">
                  <li class="list-group-item">
                      <a href="{{route('categories.index')}}">All categories</a> </li>

              </ul>
              <ul class="list-group">
                  <li class="list-group-item">
                      <a href="{{route('categories.create')}}">create new categories</a> </li>

              </ul>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('posts.create')}}">create new post</a> </li>

            </ul>
              <ul class="list-group">
                  <li class="list-group-item"><a href="{{route('posts.index')}}">All post</a> </li>

              </ul>
              <ul class="list-group">
                  <li class="list-group-item"><a href="{{route('tags.index')}}">All tags</a> </li>

              </ul>
              <ul class="list-group">
                  <li class="list-group-item"><a href="{{route('tags.create')}}">create new tags</a> </li>

              </ul>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('profiles.index')}}">Profile</a> </li>

                </ul>
                @if(\Illuminate\Support\Facades\Auth::user()->admin)

                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('settings.index')}}">Settings</a> </li>

                    </ul>
                  @endif

        </div>
               @endif
        <div class="col-md-8 col-lg-offset-2">
                @yield('content')

        </div>
    </div>
</div>
        </main>
    </div>
<script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");

        @endif
        @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}")
        @endif
    </script>
    <script src="{{asset('js/nn.js')}}"></script>
@yield('script')


</body>
</html>
