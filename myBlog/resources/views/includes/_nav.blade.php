<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="about">Muhaimenul</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('index') ? "active" : "" }}" >
                    {{ Html::link('index', 'Home') }}
                </li>
                <li class="{{ Request::is('about') ? "active" : "" }}" >
                    {{ Html::link('about', 'About') }}
                </li>
                <li class="{{ Request::is('work') ? "active" : "" }}" >
                    {{ Html::link('work', 'My Work') }}
                </li>
                <li class="{{ Request::is('allposts') ? "active" : "" }}" >
                    {{ Html::link('allposts/', 'Blog') }}
                </li>
                <!--<li class="{{-- Request::is('posts/create') ? "active" : "" }}" >
                    {{ Html::link('posts/create', 'Add Post') --}}
                </li>-->
                <li class="{{ Request::is('contact') ? "active" : "" }}" >
                    {{ Html::link('contact', 'Contact') }}
                </li>

                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('login') }}" style="color:#777">Login</a></li>
                            <li><a href="{{ route('register') }} " style="color:#777">Register</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('posts/') }}" style="color:#777">All Post</a></li>
                            <li><a href="{{ url('posts/create') }}" style="color:#777">Add Post</a></li>
                            <li><a href="{{ route('categories.index') }}" style="color:#777">Categories</a></li>
                            <li><a href="{{ route('tags.index') }}" style="color:#777">Tags</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a style="color:#777" href="{{ route('logout') }}"
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
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


