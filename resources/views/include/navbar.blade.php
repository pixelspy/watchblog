<nav id="header" class="navbar">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                WB
                {{-- {{ config('app.name', 'WB') }} --}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav">
                {{-- <li><a href="/">Home</a></li> --}}
                {{-- <li><a href="/posts">All Posts</a></li> --}}
                <li><a href="/users">Users</a></li>
                {{--<li><a href="/search">Search</a></li>--}}
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="linkLarge">Login</a></li>
                    <li><a href="{{ route('register') }}" id="signUp_btn">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height: 32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/posts/create">Create a Post</a></li>
                        <li><a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}">Profile</a></li>
                        <li><a href="/categories">Categories</a> </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!--<li><a href="/posts/create">Create Post</a> </li> --!>
