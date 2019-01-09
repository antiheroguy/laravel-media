@extends('admin.layout.base')

@section('main')
<div class="col-md-4 col-xs-12">
	<div class="card-box widget-box-three">
		<div class="bg-icon pull-left">
			<i class="fa fa-list"></i>
		</div>
		<div class="text-right">
			<p class="m-t-5 text-uppercase font-14 font-600">Album</p>
			<h2 class="m-b-10"><span data-plugin="counterup">{{ number_format($album) }}</span></h2>
		</div>
	</div>
</div>

<div class="col-md-4 col-xs-12">
	<div class="card-box widget-box-three">
		<div class="bg-icon pull-left">
			<i class="fa fa-camera"></i>
		</div>
		<div class="text-right">
			<p class="m-t-5 text-uppercase font-14 font-600">Item</p>
			<h2 class="m-b-10"><span data-plugin="counterup">{{ number_format($item) }}</span></h2>
		</div>
	</div>
</div>

<div class="col-md-4 col-xs-12">
	<div class="card-box widget-box-three">
		<div class="bg-icon pull-left">
			<i class="fa fa-user"></i>
		</div>
		<div class="text-right">
			<p class="m-t-5 text-uppercase font-14 font-600">User</p>
			<h2 class="m-b-10"><span data-plugin="counterup">{{ number_format($user) }}</span></h2>
		</div>
	</div>
</div>
<div class="clear"></div>
@endsection