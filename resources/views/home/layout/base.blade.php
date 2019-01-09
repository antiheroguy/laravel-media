<!DOCTYPE html>
<html lang="vi">
<head>
	@include('home.layout._head')
	@yield('style')
</head>

<body>
	<div class="wrapper">
		@include('home.layout._header')
		<!-- menu mobile -->
		<div class="modal left fade" id="fvv-menu-mb" tabindex="-1" role="dialog" aria-labelledby="f-menu-mb-label">
			<div class="modal-dialog" role="document">
				<div class="fvv-menu-mb-header">
					<div class="btn-menu-mb">
						<a href="javascript:void(0)" data-dismiss="modal">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</a>
					</div>
					<div class="logo">
						<a href="#">
							<img src="{{ url('images/logo.png') }}" alt="">
						</a>
					</div>
				</div>
				<div class="modal-content">
					<div class="fvv-sidebar">
						@include('home.layout._sidebar')
					</div>
				</div>
			</div>
		</div>
		<div class="f-content">
			<div class="container-fluid">
				<div class="row flex-xl-nowrap">
					<div class="col-12 col-md-2 col-xl-2 fvv-sidebar">
						@include('home.layout._sidebar')
					</div>
					<div class="col-12 col-md-10 col-xl-10 fvv-content">
						@yield('content')
						<div class="f-footer">
							<p>Copyright © 2018 <a href="https://www.hero.tk">Hero</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('home.layout._script')
	@yield('script')
</body>
</html>