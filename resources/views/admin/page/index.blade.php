@extends('admin.layout.base')

@section('main')
<div class="col-md-6 col-xs-12" style="padding: 0">
	<a href="{{ url('admin/' . $module . '/create') }}" class="btn btn-primary waves-effect waves-light m-b-20">Add <i class="fa fa-plus-circle"></i></a>
</div>
<div class="col-md-6 col-xs-12" style="padding: 0">
	<form action="{{ url('admin/' . $module) }}">
		<div class="input-group pull-right" style="max-width: 100%; display: flex; align-items: center;">
			@yield('action')
			<input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}" style="margin-left: 10px">
			<span class="input-group-btn" style="width: auto">
				<button type="submit" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
			</span>
		</div>
	</form>
</div>
<table class="table table-space table-bordered table-colored table-primary m-0">
	@yield('content')
</table>
<div class="text-right">
	{{ $$module->appends(request()->all())->links() }}
</div>
<!--- end row -->
@endsection