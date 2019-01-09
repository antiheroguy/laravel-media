@extends('home.layout.base')

@section('content')
<div class="fvv-content-box">
	<h2 class="fvv-content-title">Danh sách</h2>
	<div class="fvv-content-body">
		<div class="row">
			@foreach($list as $l)
			<div class="f-post-category-item col-12 col-md-3">
				<div class="new-post-item">
					<div class="new-post-item-inner">
						<a href="{{ $l->link() }}">
							<div class="post-avatar">
								<img src="{{ $l->image() }}">
							</div>
							<div class="post-content">
								<h3 class="text-white">{{ $l->title }}</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{ $list->links('vendor.pagination.bootstrap-4') }}
	</div>
</div>
@endsection