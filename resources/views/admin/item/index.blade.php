@extends('admin.page.index')

@section('content')
<thead>
	<tr>
		<th>Poster</th>
		<th>Album</th>
		<th>Title</th>
		<th>Artist</th>
		<th>Number</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
@if($item->count())
	@foreach($item as $a)
	<tr>
		<td>
			<img src="{{ $a->image() }}" style="max-width: 50px">
		</td>
		<td>{{ $a->album ? $a->album->title : 'No album' }}</td>
		<td>{{ $a->title }}</td>
		<td>{{ $a->artist }}</td>
		<td>{{ $a->number ?: '' }}</td>
		<td>
			<a href="{{ url('admin/' . $module . '/' . $a->id . '/edit') }}" type="button" class="btn btn-icon waves-effect waves-light btn-success" title="Edit"> <i class="fa fa-pencil"></i> </a>
			<a href="{{ url('item/' . $a->id) }}" type="button" class="btn btn-icon waves-effect waves-light btn-primary" title="View" target="_blank"> <i class="fa fa-eye"></i> </a>
			<a href="javascript:void(0)" data-id="{{ $a->id }}" type="button" class="btn btn-icon waves-effect waves-light btn-danger delete-btn" title="Delete"> <i class="fa fa-remove"></i> </a>
		</td>
	</tr>	
	@endforeach
@else
	<tr>
		<td class="text-center" colspan="6">No Data</td>
	</tr>
@endif
</tbody>
<!--- end row -->
@endsection


@section('action')
<select class="form-control" name="album" style="border-radius: 0">
	<option value=''>All</option>
	<option value='0' {{ request()->album == '0' ? 'selected' : '' }}>No album</option>
	@foreach($album as $k => $v)
	<option value="{{ $k }}" {{ request()->album == $k ? 'selected' : '' }}>{{ $v }}</option>
	@endforeach
</select>
@endsection