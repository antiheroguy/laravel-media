@extends('admin.page.index')

@section('content')
<thead>
	<tr>
		<th>Logo</th>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
@if($user->count())
	@foreach($user as $a)
	<tr>
		<td>
			<img src="{{ $a->image() }}" style="max-width: 50px">
		</td>
		<td>{{ $a->name }}</td>
		<td>{{ $a->email }}</td>
		<td>
			<a href="{{ url('admin/' . $module . '/' .  $a->id . '/edit') }}" type="button" class="btn btn-icon waves-effect waves-light btn-success" title="Edit"> <i class="fa fa-pencil"></i> </a>
			@if($a->id != Auth::user()->id)
			<a href="javascript:void(0)" data-id="{{ $a->id }}" type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-btn" title="Delete"> <i class="fa fa-remove"></i> </a>
			@endif
		</td>
	</tr>	
	@endforeach
@else
	<tr>
		<td class="text-center" colspan="4">No Data</td>
	</tr>
@endif
</tbody>
<!--- end row -->
@endsection