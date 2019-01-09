<!DOCTYPE html>
<html>
    <head>
        @include('admin.layout._head')
        @yield('style')
    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">
            
            @include('admin.layout._header')

            @include('admin.layout._sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <div class="card-box">
                                    <h4 class="m-b-20 header-title">{{ $title or 'Admin' }}</h4>
                                    @yield('main')
                                </div>
                            </div>
                        </div>
                        @yield('modal')
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © <a href="http://www.hero.tk" target="_blank">Hero</a>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            
            <div id="loading"></div>
        </div>
        <!-- END wrapper -->
        @include('admin.layout._script')
        @yield('script')
    </body>
</html>