@extends('admin.page.form')

@section('content')
<div class="form-group">
	<label class="control-label required" for="title">Title</label>
	<input type="text" class="form-control" id="title" name="title" value="{{ $album->title or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="artist">Artist</label>
	<input type="text" class="form-control" id="artist" name="artist" value="{{ $album->artist or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required">Poster</label>
	<div class="fileupload fileupload-{{isset($album->poster) ? 'exists' : 'new' }}" data-provides="fileupload">
		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
			@if (isset($album->poster))
			<img src="{{ $album->image() }}" alt="image" />
			@endif
		</div>
		<div>
			<button type="button" class="btn btn-default btn-file">
				<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
				<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
				<input type="file" name="poster_file" class="btn-default upload" />
				@if(isset($album))
				<input type="hidden" name="poster" value="{{ $album->poster }}">
				@endif
			</button>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script>
		jQuery.extend(jQuery.validator.messages, {
            accept: "Accept only image files",
        });

		$('#form').validate({
			rules: {
                title: {
                    required: true
                },
                artist: {
                    required: true
                },
            	poster_file: {
                    @if (!isset($album))
                    required: true,
                    @endif
                    accept: "image/*"
                },
            },
		});
	</script>
@endsection