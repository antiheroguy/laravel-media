<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metisMenu nav" id="side-menu">

                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ url('admin') }}"><i class="fa fa-home"></i> <span> Home </span></a>
                </li>

                <li class="{{ Request::is('admin/album*') ? 'active' : '' }}">
                    <a class="{{ Request::is('admin/album*') ? 'active' : '' }}" href="{{ url('admin/album') }}"><i class="fa fa-tv"></i> <span> Album </span></a>
                </li>

                <li class="{{ Request::is('admin/item*') ? 'active' : '' }}">
                    <a class="{{ Request::is('admin/item*') ? 'active' : '' }}" href="{{ url('admin/item') }}"><i class="fa fa-camera-retro"></i> <span> Item </span></a>
                </li>

                <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                    <a class="{{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span> User </span></a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->