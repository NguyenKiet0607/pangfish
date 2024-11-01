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

  /*  media query */

  /* Xuống mobile thì ẩn background */
  @media (max-width: 768px) {
	#bg-game-slot {
	  background: none !important;
	}
  }
</style>

@section('body')
      <div class="bacarat-1-page bg-type1 w-full">
        @include('client.header')
		<div class="mt-24 ">
			<section id="bg-game-slot" class="!w-full md:w-[90vw] md:h-[80vh]"> 
				<div class="flex flex-col items-center">
				  	<div class="flex flex-wrap items-center justify-center md:justify-between mb-4">
  						<a href="/">
							<img class="w-[150px] h-[58px]" src="{{asset('images/graphics/btn-back-game-slot.png')}}" alt="">
						</a>
  					
						<div class="flex justify-center items-center text-white text-xl font-bold" id="bg-game-name">
							<span>
								{{ $game->name }}
							</span>
						</div>
	  
						<div class="relative flex justify-start items-center ps-7" id="bg-game-search">
							<input id="game-search-input" type="text" class="bg-transparent border-none text-white text-left focus:outline-none" placeholder="Nhập tên game">
							
							<img class="absolute top-[8px] right-0 cursor-pointer" width="64px" height="64px" src="{{asset('images/graphics/btn-game-search.png')}}" alt="">
						</div>
					</div>

					<div id="game-list" class="grid grid-cols-1 sm:grid-cols-3  gap-5 overflow-y-auto max-h-[50vh]">
						@foreach($slots as $slot)
							<a class="game-item" data-name="{{$slot->name}}" href="{{ route('detail-slot', [$slot->slug, $slot->id]) }}">
							  <div class="slot_item">
								<div class="slot_image">
									<img alt="slot image" src="{{ asset('images/'.$slot->image_url) }}">
								</div>
								<div class="slot_title mb-2">
									<span>{{ $slot->name }}</span>
								</div>
								<div class="slot_percent_1 percent_{{ $slot->id }}">
									{{ $slot->percent }}
								</div>

								<div class="animation-bar-1">
									<span class="w-[70%] h-[12px]"></span>

									<div class="bg-white rounded-full w-[30%] h-[12px]">

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
			const gameChildTitles = document.querySelectorAll('.slot_title');

			gameChildTitles.forEach((gameName) => {
				const textElement = gameName.querySelector('span');

				// Create a temporary element to measure text width
				const tempElement = document.createElement('span');
				tempElement.style.visibility = 'hidden';
				tempElement.style.whiteSpace = 'nowrap';
				tempElement.style.position = 'absolute';
				tempElement.style.fontSize = window.getComputedStyle(textElement).fontSize;
				tempElement.textContent = textElement.textContent;

				document.body.appendChild(tempElement);

				if (tempElement.offsetWidth > 120) {
					textElement.classList.add('scrolling-text');
				}

				document.body.removeChild(tempElement);


			});
		});
	</script>

	{{-- Search --}}
	<script>
		// Handle autocomplete search
		const searchInput = document.getElementById('game-search-input');
		const gameList = document.getElementById('game-list');

		searchInput.addEventListener('input', (e) => {
		    const searchValue = e.target.value ? e.target.value.trim().toLowerCase() : '';
		    const gameItems = gameList.querySelectorAll('.game-item');

			// Check empty search
			if (searchValue === '') {
				gameItems.forEach((gameItem) => {
					gameItem.style.display = 'block';
				})
				return;
			}

			
		    gameItems.forEach((gameItem) => {
		        const gameName = gameItem.getAttribute('data-name');

		        if (gameName) { // Kiểm tra nếu gameName không phải null
		            const gameNameLowerCase = gameName.toLowerCase();

		            if (gameNameLowerCase.includes(searchValue)) {
		                gameItem.style.display = 'block';
		            } else {
		                gameItem.style.display = 'none';
		            }
		        } else {
		            console.warn("data-name attribute is missing for game item:", gameItem);
		            gameItem.style.display = 'none'; // Ẩn nếu không có data-name
		        }
		    });
		});

	</script>
@endsection
