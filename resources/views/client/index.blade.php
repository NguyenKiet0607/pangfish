@extends('client.layout')

@section('css')
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

<div class="bacarat-1-page bg-type1 w-full">
    @include('client.header')
    <section class="w-full mt-10 px-2 md:px-[50px]">
        <div class="flex flex-wrap justify-center max-h-[80vh] overflow-auto" >
            @foreach($games as $game)
            {{-- w-[calc(100%/5-16px)] sm:w-[calc(100%/6-16px)] --}}
                <div data-id="{{ $game->id }}" class="detail-game h-[150px] h-[150px] md:w-[225px] sm:h-[180px] py-2" data-slug="{{ $game->slug }}">
                    <img class="w-full h-full object-contain" src="{{ asset('images/'.$game->image_url) }}" alt="{{$game->slug}}">
                </div>
            @endforeach
            
        </div>
        {{-- <div class="flex justify-center">
            @if($games->onFirstPage())
                <button class="flex items-center justify-center border-4 border-white size-[64px] mr-2 bg-gray-400 text-white rounded-full" disabled>
                    <img class="w-4 h-4" src="{{ asset('images/graphics/prev-icon.png') }}" alt="">
                </button>
            @else
                <a href="{{ $games->previousPageUrl() }}" class="flex items-center justify-center border-4 border-white size-[64px] mr-2 bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] text-white rounded-full">
                    <img class="w-4 h-4" src="{{ asset('images/graphics/prev-icon.png') }}" alt="">
                </a>
            @endif

            @if($games->hasMorePages())
                <a href="{{ $games->nextPageUrl() }}" class="flex items-center justify-center border-4 border-white size-[64px] bg-gradient-to-r from-[#00ACE4] to-[#4BE5E4] text-white rounded-full"><img class="w-4 h-4" src="{{ asset('images/graphics/next-icon.png') }}" alt=""></a>
            @else
                <button class="flex items-center justify-center border-4 border-white size-[64px] bg-gray-400 text-white rounded-full" disabled>
                    <img class="w-4 h-4" src="{{ asset('images/graphics/next-icon.png') }}" alt="">
                </button>
            @endif
        </div> --}}
        
    </section>
</div>
@section('js')
<!-- <script src="{{ asset('js/home.js') }}"></script> -->
@endsection
