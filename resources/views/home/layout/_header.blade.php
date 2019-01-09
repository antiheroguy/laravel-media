<!-- HEADER -->
<header id="header" class="f-header">
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <div class="btn-menu-mb">
                <a href="javascript:void(0)" data-target="#fvv-menu-mb" data-toggle="modal">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-2 f-logo">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('images/logo.png') }}" alt="">
                </a>
            </div>

            <div class="navbar-collapse" id="f-navbar-search">
                <div class="mr-auto f-navbar-search">
                    <form class="form-inline my-2 my-lg-0" action="/">
                        <input class="form-control transition" name="s" type="text" placeholder="Tìm kiếm" id="nav-input-search">
                        <button class="btn button-default my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

                <div class="ml-auto list-action-nav">
                    <div class="f-search-mb">
                        <a href="#" class="dropdown-toggle" id="dropdown-search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>

                        <div class="dropdown-menu" aria-labelledby="dropdown-search">
                            <form class="dropdown-search-mb" action="/">
                                <input class="form-control transition" name="s" type="text" placeholder="Tìm kiếm" id="nav-input-search-mb">
                                <button class="btn button-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="f-nav-user">
                        <a href="https://www.hero.tk" target="_blank">
                            <img src="{{ url('images/avatar.jpg') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</header>
<!-- !HEADER -->