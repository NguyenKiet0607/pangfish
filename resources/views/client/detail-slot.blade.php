@extends('client.layout')

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
    <div class="bacarat-1-page bg-type1 mt-10">
        @include('client.header')
        <section class="slectgame-slide">
            <div class="slectgame_inner detail_game_inner1">
                <div class="row">
                    <div class="col-4 ava1">
                        <a href="/slot/{{ $gameParent->slug }}">
                            <img class="w-[150px] h-[58px]" src="{{asset('images/graphics/btn-back-game-slot.png')}}" alt="">
                        </a>
                        
                        <img class="w-[260px]" alt="ava1" src="{{ asset('images/graphics/game-detail-avatar.png') }}">
                    </div>
                    <div class="col-8 ava2">
                        <div class="d-flex">
                            <div class="img-parent flex justify-center items-center">
                                <img class="rounded-full size-[40px]" alt="" src="{{ asset('images/'.$gameParent->image_url) }}" height="35px">
                            </div>
                            <div class="img-child flex justify-center items-center">
                                <img class="rounded-full size-[40px]" alt="" src="{{ asset('images/'.$game->image_url) }}">
                            </div>
                            <div class="title flex-1 overflow-hidden">
                                <span>{{ $game->name }}</span>
                            </div>
                        </div>
                        <div class="count-down">
                            <div class="count-down-title">ĐẾM NGƯỢC</div>
                            <div class="count-down-title count-down-time"></div>
                            {{-- <div class="count-down-image">
                                <img alt="" src="{{ asset('images/1_tmp.png') }}" >
                            </div> --}}
                        </div>
                        <div class="mt-2 position-relative">
                            {{-- <div class="percentage">{{ $game->percent.'%' }}</div> --}}
                            {{-- <div class="round">Nhận khung giờ chơi</div>
                            <div id="text-line1" class="text-line" style="display: none;"></div>
                            <div id="text-line2" class="text-line" style="display: none;"></div> --}}

                            <div id="round-time-bg" class="round flex justify-center items-center cursor-pointer">
                                <h3 class="text-white text-lg font-bold">Nhận khung giờ chơi</h3>
                                <div>
                                    <div id="text-line1" class="text-line" style="display: none;"></div>
                                    <div id="text-line2" class="text-line" style="display: none;"></div> 
                                </div>
                            </div>

                            {{-- <img class="w-[300px] h-[74px] cursor-pointer" alt="" src="{{ asset('images/graphics/btn-game-time.png') }}"> --}}
                        </div>

                        <div class="mt-2">
                            <img class="w-[260px]" alt="ava1" src="{{ asset('images/background/bg-game-detail-percent.png') }}">
                            
                        </div>

                        <div class="relative">
                            <div class="image-container">
                                <img alt="" src="{{ asset('images/background/bg-game-detail-progress.png') }}">
                                <div class="progress-bar-a red"></div>
                                <div class="progress-bar-a green"></div>
                                {{-- <div class="progress-bar-a blue"></div> --}}
                                <div class="progress-bar-a yellow"></div>
                            </div>

                            <div class="flex justify-center items-center" id="bg-game-detail-progress-circle">
                                <div class="absolute bottom-0 left-[48%] -transform-x-[48%] text-2xl font-bold text-white">
                                    {{ $game->percent.'%' }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=".slectslot_inner detail_game_inner2 col-11">
                <div class="title-Page">
                    <div class="btn-back bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] p-3 rounded-full text-white">
                        {{-- <a href="/slot/{{ $gameParent->slug }}"><img src="{{ asset('images/333.png') }}" alt="back"></a> --}}
                        Quay lại
                    </div>
                    
                    <h1>{{ $game->name }}</h1>
                </div>
                <div class="slot_wrapper">
                    <div class="avatar-game">
                        <img src="{{ asset('images/'.$game->image_url) }}" alt="avatar">
                    </div>
                    <div class="percent-game">
                        <div class="background"></div>
                        <div class="percentage">{{ $game->percent }}%</div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="count-down-wrapper">
                        <div class="count-down-time">19:00</div>
                    </div>
                </div>
                <div class="round bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] px-3 py-2 text-white rounded-full">Nhận khung giờ chơi</div>
                <div id="text-line1-mobile" class="text-line-mobile" ></div>
                <div id="text-line2-mobile" class="text-line-mobile"></div>
            </div>
        </section>
        <style>
            .iframe-container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

        </style>
        {{-- <div class="iframe-container">
            <iframe id="ytplayer" type="text/html"
                    src="https://www.youtube.com/embed/P7Rxe8ocqP0?si=svzKwsYa_eA9ve8c"
                    frameborder="0" allowfullscreen></iframe>
        </div> --}}
    </div>
    @include('client.round', ['id' => 'round-modal'])
@endsection

@section('js')
    <script>
        var decreaseCoinTime = {{ env('DECREASE_COIN_TIME', 30) }}
        var coin = {{ auth()->user()->coin }};
        var expired_time = {{ auth()->user()->expired_time }};
        var distance = expired_time*1000;
        var slug = '{{ $slug }}';
    </script>
    <script src="{{ asset('js/game-detail.js') }}"></script>

    <script>
		document.addEventListener('DOMContentLoaded', () => {
			const gameName = document.querySelector('.title');

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
				textElement.classList.add('scrolling-text-game-parent');
			}

			document.body.removeChild(tempElement);
	    });
	</script>
@endsection
