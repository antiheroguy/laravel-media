@extends('home.layout.base')

@section('content')
<div class="f-post-content-box">
	<video id="player" src="{{ $item->url }}"></video>
	<div class="f-post-title">
		<h2 class="pull-left">{{ $item->title }}</h2>
		<div class="pull-right f-post-view">
			<span>{{ number_format($item->view) }} lượt xem</span>
		</div>
	</div>
	<div class="f-post-author">
		<div class="f-post-author-img">
			<a href="https://www.hero.tk">
				<div class="f-cicle">
					<img src="{{ url('images/avatar.jpg') }}">
				</div>
			</a>

		</div>
		<div class="f-post-author-name">
			<a href="https://www.hero.tk"><b>Hero</b></a>
			<p>Xuất bản {{ $item->created_at }}</p>
		</div>
		<div class="f-post-share pull-right">
			<a href="javascript:void(0)" class="fps-btn btn" id="switch" title="Tắt đèn">
				<i class="fa fa-lightbulb-o"></i>
			</a>
			<a href="javascript:void(0)" class="fps-btn btn" id="fullscreen" title="Phóng to">
				<i class="fa fa-expand"></i>
			</a>
		</div>
	</div>
</div>
@if(count($related))
<div class="fvv-content-box">
	<h2 class="fvv-content-title">Xem thêm</h2>
	<div class="fvv-content-body">
		<div class="owl-carousel cate-post-slide slide-style">
			@foreach($related as $r)
			<div class="item">
				<div class="cate-post-item">
					<div class="cate-post-item-inner">
						<a href="{{ $r->link() }}">
							<div class="post-avatar">
								<img src="{{ $r->image() }}">
							</div>
							<div class="post-content">
								<h3 class="text-default">{{ $r->title }}</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif
@endsection

@section('script')
<script src="{{ url('js/jquery.allofthelights.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){

		const player = new Plyr('#player', {
			controls: ['play-large', 'play', 'progress', 'current-time', 'duration', 'mute', 'volume', 'settings', 'pip', 'fullscreen'],
			autoplay: true,
			disableContextMenu: true,
			ratio: '4:3'
		});

		$('#fullscreen').click(function() {
			player.fullscreen.enter();
		});

		$('#player').allofthelights();

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
		    }
		});
    });
</script>
@endsection