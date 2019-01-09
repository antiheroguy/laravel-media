@extends('admin.page.index')

@section('content')
<thead>
	<tr>
		<th>Poster</th>
		<th>Title</th>
		<th>Artist</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
@if($album->count())
	@foreach($album as $a)
	<tr>
		<td>
			<img src="{{ $a->image() }}" style="max-width: 50px">
		</td>
		<td>{{ $a->title }}</td>
		<td>{{ $a->artist }}</td>
		<td>
			<a href="{{ url('admin/' . $module . '/' . $a->id . '/edit') }}" type="button" class="btn btn-icon waves-effect waves-light btn-success" title="Edit"> <i class="fa fa-pencil"></i> </a>
			<a href="{{ url('album/' . $a->id) }}" type="button" class="btn btn-icon waves-effect waves-light btn-primary" title="View" target="_blank"> <i class="fa fa-eye"></i> </a>
			<a href="javascript:void(0)" data-id="{{ $a->id }}" type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-btn" title="Delete"> <i class="fa fa-remove"></i> </a>
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