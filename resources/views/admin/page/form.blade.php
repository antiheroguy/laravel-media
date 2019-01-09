@extends('admin.layout.base')

@section('main')
<form role="form" id="form" method="POST" action="{{ isset($$module) ? url('admin/'.$module.'/' . $$module->id) : url('admin/'. $module) }}" enctype='multipart/form-data'>
	@if(isset($$module))
		{{ method_field('PUT') }}
	@endif
		{{ csrf_field() }}
	@yield('content')
	<div class="form-group text-right m-b-0">
	    <button class="btn btn-primary waves-effect waves-light" type="submit">
	        Submit
	    </button>
	    <a type="button" class="btn btn-default waves-effect m-l-5" href="{{ url('admin/' . $module) }}">
	        Cancel
	    </a>
	</div>
</form>
@endsection