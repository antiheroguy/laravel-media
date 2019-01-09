<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
        <!-- Image logo -->
        <a href="{{ url('admin') }}" class="logo">
            <span>
                <img src="{{url('images/logo.png') }}" alt="" height="25">
            </span>
            <i>
                <img src="{{url('images/logo_sm.png') }}" alt="" height="28">
            </i>
        </a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown user-box">
                    <a href="{{ url('') }}" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{ Auth::user()->image() }}" alt="user-img" class="img-circle user-img">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li><a href="{{ url('admin/user/' . Auth::user()->id . '/edit') }}">Profile</a></li>
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </li>

            </ul> <!-- end navbar-right -->

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
<!-- Top Bar End -->