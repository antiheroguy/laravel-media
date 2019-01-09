@extends('admin.page.form')

@section('content')
<div class="form-group">
	<label class="control-label required" for="name">Name</label>
	<input type="text" class="form-control" id="name" name="name" value="{{ $user->name or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="email">Email</label>
	<input type="text" class="form-control" id="email" name="email" value="{{ $user->email or '' }}" required>
</div>
<div class="form-group">
	<label class="control-label required" for="password">Password</label>
	<input type="password" class="form-control" id="password" name="password">
</div>
<div class="form-group">
	<label class="control-label required" for="password_confirm">Password Confirm</label>
	<input type="password" class="form-control" id="password_confirm" name="password_confirm">
</div>
<div class="form-group">
	<label class="control-label">Logo</label>
	<div class="fileupload fileupload-{{isset($user->logo) && $user->logo ? 'exists' : 'new' }}" data-provides="fileupload">
		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
			@if (isset($user->logo) && $user->logo)
			<img src="{{ $user->image() }}" alt="image" />
			@endif
		</div>
		<div>
			<button type="button" class="btn btn-default btn-file">
				<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
				<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
				<input type="file" name="logo_file" class="btn-default upload" />
				@if(isset($user->logo) && $user->logo)
				<input type="hidden" name="logo" value="{{ $user->logo }}">
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
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
	                  	url: "{{ url('admin/ajax/mail') }}",
	                  	type:"post",
	                  	data: {
	                     	email: function(){
		                    	return $("#email").val();
		                    },
		                    id: "{{ isset($user) ? $user->id : 0 }}"
	                  	}
	               	}
                },
                password: {
                	@if(!isset($user))
	               	required: true,
	               	@endif
	               	minlength: 6
	            },
	            password_confirm: {
	            	@if(!isset($user))
	               	required: true,
	               	@endif
	               	equalTo: "#password"
	            },
            	logo_file: {
                    accept: "image/*"
                },
            },
            messages: {
				email: {
					email: "Please enter a valid email address",
					remote: "The email has already been taken",
				},
				password_confirm: {
					equalTo: "Confirm password does not match the password",
				},
			}
		});
	</script>
@endsection