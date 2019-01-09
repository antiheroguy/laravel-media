@extends('home.layout.base')

@section('content')
<div class="fvv-content-box">
	<h2 class="fvv-content-title">{{ request()->s ? 'Tìm kiếm theo từ khóa "' . request()->s . '"' : 'Phim bộ' }}</h2>
	<div class="fvv-content-body">
		<div class="row">
			@if(count($album))
			@foreach($album as $a)
			<div class="f-post-category-item col-12 col-md-3">
				<div class="new-post-item">
					<div class="new-post-item-inner">
						<a href="{{ $a->link() }}">
							<div class="post-avatar">
								<img src="{{ $a->image() }}">
							</div>
							<div class="post-content">
								<h3 class="text-white">{{ $a->title }}</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="f-post-category-item col-12">
				<h6>Không có mục nào</h6>
			</div>
			@endif
		</div>
		{{ $album->appends(['s' => request()->s])->links('vendor.pagination.bootstrap-4') }}
	</div>
</div>
<div class="clearfix"></div>
<div class="fvv-content-box">
	<h2 class="fvv-content-title">Phim lẻ</h2>
	<div class="fvv-content-body">
		@if(count($item))
		<div class="owl-carousel cate-post-slide slide-style">
			@foreach($item as $i)
			<div class="item">
				<div class="cate-post-item">
					<div class="cate-post-item-inner">
						<a href="{{ $i->link() }}">
							<div class="post-avatar">
								<img src="{{ $i->image() }}">
							</div>
							<div class="post-content">
								<h3 class="text-default">{{ $i->title }}</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<h6>Không có mục nào</h6>
		@endif
	</div>
</div>
@endsection

@section('script')
	<script>
		$('.cate-post-slide').owlCarousel({
		    loop: false,
		    margin: 20,
		    dots: false,
		    autoplay: true,
		    responsive: {
		        0: {
		            items: 2
		        },
		        500: {
		            items: 3
		        },
		        1000: {
		            items: 4
		        }
		    },
		    navText: [
		    	"<i class='fa fa-angle-left' aria-hidden='true'></i>",
		    	"<i class='fa fa-angle-right' aria-hidden='true'></i>"
		    ]
		});
	</script>
@endsection