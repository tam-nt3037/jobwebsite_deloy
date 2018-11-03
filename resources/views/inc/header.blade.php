<style>

    a a:hover{
        text-decoration: none;
        color: #FBCD95;
    }
    ul  li  a:hover{
        text-decoration: none;
        color: #FBCD95;
    }

</style>
<header id="header" id="home" style="background-color: #A998F6;">
  <div class="container" >
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/search/IT-Software">Category</a></li>
            <li><a href="/contact">Contact</a></li>

            {{-- <li><a class="ticker-btn" href="#">Signup</a></li> --}}
            {{-- <li><a class="ticker-btn" href="#">Login</a></li> --}}
            @guest
                <li class="nav-item">
                    <a class="ticker-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="ticker-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <li class="nav-item">
                  <a class="ticker-btn" href="/admin/register">{{ __('Recruitment') }}</a>
              </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown{{---    -toggle   --}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/my-career-center/my-profile" style="color: #555;float: right;background-color: #FFFFFF;">My Profile</a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" style="background-color: #b881eb;float: right;"
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
           <!-- Right Side Of Navbar -->
          {{-- <ul class="navbar-nav ml-auto"> --}}
            <!-- Authentication Links -->

            {{-- guest --}}
            {{-- endguest --}}

          {{-- </ul>	 --}}
        </nav><!-- #nav-menu-container -->		    		
      </div>
  </div>
</header>

{{-- <header id="header" id="home">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Job Listing') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-logo_company"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
  
              <div id="logo">
                <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
              </div>
  
              <ul class="nav-menu">
                <li class="menu-active"><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/category">Category</a></li>
                <li><a href="#">Price</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact</a></li>
                <li class="menu-has-children"><a href="">Pages</a>
                  <ul>
                      <li><a href="elements.html">elements</a></li>
                      <li><a href="search.html">search</a></li>
                      <li><a href="single.html">single</a></li>
                  </ul>
                </li>		          				          
              </ul>
            </ul>
  
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto nav-menu">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="ticker-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="ticker-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
  
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
  </header> --}}