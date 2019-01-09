<!-- jQuery  -->
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/metisMenu.min.js') }}"></script>
<script src="{{ url('js/waves.js') }}"></script>
<script src="{{ url('js/jquery.slimscroll.js') }}"></script>

<!-- Sweet-Alert  -->
<script src="{{ url('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>

<!-- Bootstrap fileupload js -->
<script src="{{ url('plugins/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>

<!-- Jquery Validation -->
<script src="{{ url('plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ url('plugins/jquery-validation/js/additional-methods.min.js') }}"></script>

<!-- Select 2 -->
<script src="{{ url('plugins/select2/js/select2.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ url('plugins/moment/moment.js') }}"></script>
<script src="{{ url('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Datepicker -->
<script src="{{ url('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Counterjs  -->
<script src="{{ url('plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- App js -->
<script src="{{ url('js/jquery.core.js') }}"></script>
<script src="{{ url('js/jquery.app.js') }}"></script>

<script>

	// ajax token
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-Token': '{{ csrf_token() }}',
	    }
	});

	// select 2 errors
	$.validator.setDefaults({
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else if (element.hasClass('select2-hidden-accessible')) {     
				error.insertAfter(element.next('span'));
			} else if (element.hasClass('upload')) {
				error.insertAfter(element.closest('.fileupload'));
			} else {
				error.insertAfter(element);
			}
		}
	});

	// validate select2
	$('.select2-hidden-accessible').on('change', function() {
		$(this).valid();
	});

	// validate when submit
	$('#form').submit(function() {
		$(this).validate();
		$(window).unbind("beforeunload");
	    return true;
	});

	// before unload action
	$("#form :input").one("change", function() { 
	    $(window).bind('beforeunload', function() {
	        return true;
	    });
	});

	// delete action
	@if(isset($module))
	$('.delete-btn').click(function() {
		var id = $(this).data('id');
		swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function () {
        	$.ajax({
				url: "{{ url('admin/' . $module) }}/"+id,
				type: 'POST',
				data: {
					_method: 'DELETE',
				},
				success: function(data) {
					location.reload();
				},
			});
        });
	});
	@endif

	$(document).ready(function() {

		// flash message
		@if(session('status'))
		swal('Success!', '{{ session('status') }}', 'success')
		@endif

		// select2 init
		$('.select2').select2({
			width: '100%',
			theme: 'bootstrap',
			placeholder: function() {
				$(this).data('placeholder');
			}
		});

	}).ajaxStart(function () {
		$('#loading').show();
	}).ajaxStop(function () {
		$('#loading').hide();
	});

</script>