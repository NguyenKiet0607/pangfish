@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

<style>
  /* Change body bg */

  body {
      background: url("{{ asset('images/background/bg-3.png') }}") !important;
      background-repeat: no-repeat !important;
      background-size: cover !important;
      background-position: center !important;
  }
</style>

@section('body')
      <div class="bacarat-1-page bg-type1 w-full">
        @include('client.header')
		<div class="mt-24 ">
			<section id="bg-game-slot"> 
				<div class="flex flex-col items-center">
				  	<div class="flex items-center justify-between mb-4">
  						<a href="/">
							<img class="w-[150px] h-[58px]" src="{{asset('images/graphics/btn-back-game-slot.png')}}" alt="">
						</a>
  					
						<div class="flex justify-center items-center text-white text-xl font-bold" id="bg-game-name">
							<span>
								{{ $game->name }}
							</span>
						</div>
	  
						<div class="relative flex justify-start items-center ps-7" id="bg-game-search">
							<span class="text-left text-white">Nhập tên game</span>
							<img class="absolute top-[8px] right-0" width="64px" height="64px" src="{{asset('images/graphics/btn-game-search.png')}}" alt="">
						</div>
					</div>

					<div class="grid grid-cols-3 gap-5 overflow-y-auto max-h-[50vh]">
						@foreach($slots as $slot)
							
							<a href="{{ route('detail-slot', [$slot->slug, $slot->id]) }}">
							  <div class="slot_item">
								<div class="slot_image">
									<img alt="slot image" src="{{ asset('images/'.$slot->image_url) }}">
								</div>
								<div class="slot_title mb-2">{{ $slot->name }}</div>
								<div class="slot_percent_1 percent_{{ $slot->id }}">
									{{ $slot->percent }}
								</div>

								<div class="animation-bar-1">
									<span class="w-[70%] h-[12px]"></span>

									<div class="bg-white w-[30%] h-[12px]">

									</div>

									<div class="switch">

									</div>
								</div>
							  </div>
							</a>
						@endforeach
					</div>
				</div>

				
			</section>
		</div>
        {{-- <section class="slectgame-slide">
          <div class="slectgame_inner col-md-8 col-11 slectslot_inner">
            <div class="title-Page">
              <div class="btn-back">
                <a href="/"><img src="{{ asset('images/333.png') }}" alt="back"></a>
              </div>
              <h1>{{ $game->name }}</h1>
            </div>
            <div class="slot_wrapper slot_detail_wrapper">
              @foreach($slots as $slot)
              <a href="{{ route('detail-slot', [$slot->slug, $slot->id]) }}">
                <div class="slot_item">
                  <div class="slot_image">
                    <img alt="slot image" src="{{ asset('images/'.$slot->image_url) }}">
                  </div>
                  <div class="slot_title">{{ $slot->name }}</div>
                  <div class="slot_percent_1 percent_{{ $slot->id }}">
                      {{ $slot->percent }}%
                  </div>
                  <div class="slot_percent_2 percent_{{ $slot->id }}">{{ $slot->percent }}%</div>
                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </section> --}}
      </div>
    @endsection

 @section('js')
    <script>
      var parent_id = '{{ $game->id }}';
      var decreaseCoinTime = {{ env('DECREASE_COIN_TIME', 30) }}
      var coin = {{ auth()->user()->coin }};
      var expired_time = {{ auth()->user()->expired_time }};
    </script>
    <script src="{{ asset('js/game.js').'?v=1.0.1' }}"></script>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const gameName = document.getElementById('bg-game-name');
			const textElement = gameName.querySelector('span');

			// Create a temporary element to measure text width
			const tempElement = document.createElement('span');
			tempElement.style.visibility = 'hidden';
			tempElement.style.whiteSpace = 'nowrap';
			tempElement.style.position = 'absolute';
			tempElement.style.fontSize = window.getComputedStyle(textElement).fontSize;
			tempElement.textContent = textElement.textContent;

			document.body.appendChild(tempElement);

			if (tempElement.offsetWidth > 450) {
				textElement.classList.add('scrolling-text');
			}

			document.body.removeChild(tempElement);
		});
	</script>
@endsection
