@extends('admin.page.form')

@section('content')
<div class="form-group">
    <label class="control-label" for="album">Album</label>
    <select class="form-control select2" id="album" name="album_id" data-placeholder="Select Album">
        @if($album)
            <option></option>
            @foreach($album as $k => $v)
            <option value="{{ $k }}" {{ isset($item) && $item->album_id == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group">
	<label class="control-label required" for="title">Title</label>
	<input type="text" class="form-control" id="title" name="title" value="{{ $item->title or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="artist">Artist</label>
	<input type="text" class="form-control" id="artist" name="artist" value="{{ $item->artist or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="url">URL</label>
	<input type="text" class="form-control" id="url" name="url" value="{{ $item->url or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="number">Number</label>
	<input type="number" class="form-control" id="number" name="number" value="{{ $item->number or 0 }}" required>
</div>
@endsection

@section('script')
	<script>
        $('#album').change(function() {
        	$.ajax({
        		url: "{{ url('admin/ajax/album') }}",
        		type: 'POST',
        		data: {
        			id: $(this).val()
        		},
        		success: function(data) {
        			$('#title').val(data.title);
        			$('#artist').val(data.artist);
                    $('#number').val(data.number);
        		}
        	})
        });

		$('#form').validate({
			rules: {
                title: {
                    required: true
                },
                artist: {
                    required: true
                },
                url: {
                    required: true
                },
                number: {
                    required: true
                }
            },
		});
	</script>
@endsection