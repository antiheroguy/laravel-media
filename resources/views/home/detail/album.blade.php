@extends('home.layout.base')

@section('content')
<div class="f-post-content-box">
	<video id="player"></video>
	<div class="f-post-title">
		<h2 class="pull-left">{{ $album->title }}</h2>
		<div class="pull-right f-post-view">
			<span>{{ number_format($album->view) }} lượt xem</span>
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
			<p>Xuất bản {{ $album->created_at }}</p>
		</div>
		<div class="f-post-share pull-right">
			<a href="javascript:void(0)" class="fps-btn btn" id="switch" title="Tắt đèn">
				<i class="fa fa-lightbulb-o"></i>
			</a>
			<a href="javascript:void(0)" class="fps-btn btn" id="fullscreen" title="Phóng to">
				<i class="fa fa-expand"></i>
			</a>
			<a href="javascript:void(0)" class="fps-btn btn" id="auto" title="Tự động chuyển tập: Bật">
				<i class="fa fa-toggle-on"></i>
			</a>
		</div>
	</div>
	<div class="f-post-tags">
         <h5>Chọn tập</h5>
         @foreach($album->item as $i)
         <a href="javascript:void(0)" class="ep" data-id="{{ $i->id }}">{{ $i->number }}</a>
         @endforeach
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

		var storage = localStorage.getItem('album{{$album->id}}');

		var ep = storage ? storage : {{ $album->item[0]->id }};

		const player = new Plyr('#player', {
			controls: ['play-large', 'play', 'progress', 'current-time', 'duration', 'mute', 'volume', 'settings', 'pip', 'fullscreen'],
			autoplay: true,
			disableContextMenu: true,
			ratio: '4:3'
		});

		$('#fullscreen').click(function() {
			player.fullscreen.enter();
		});

		$('#auto').click(function() {
			$(this).attr('title', $(this).find('.fa-toggle-on').length ? 'Tự động chuyển tập: Tắt' : 'Tự động chuyển tập: Bật');
			$(this).find('i').toggleClass('fa-toggle-on').toggleClass('fa-toggle-off');
		});

		player.on('ended', event => {
			if($('#auto').find('.fa-toggle-on').length && $('.ep[data-id="'+ep+'"]').next().length) {
				ep = $('.ep[data-id="'+ep+'"]').next().data('id');
				load();
			}
		});

		player.on('enterfullscreen', event => {
			$('video').css('height', 'auto !important');
		});

		$('.ep').click(function() {
			ep = parseInt($(this).data('id'));
			load();
		});

		function load() {
			$('.ep').removeClass('active');
			$('.ep[data-id="'+ep+'"]').addClass('active');
			localStorage.setItem('album{{$album->id}}', ep);
			$.ajax({
				url: '{{ url('detail') }}',
				type: 'POST',
				data: {
					id: ep,
					_token: '{{ csrf_token() }}'
				},
				success: function(data) {
					if(!data.error) {
						$('html, body').animate({ scrollTop: 0 }, 'slow');
						player.source = {
						    type: 'video',
						    title: data.title,
						    sources: [
						        {
						            src: data.url,
						            type: 'video/mp4',
						        },
						    ],
						}
						$('.plyr video').allofthelights();
						player.play();
					}
				}
			});
		}

		load();
    });
</script>
@endsection