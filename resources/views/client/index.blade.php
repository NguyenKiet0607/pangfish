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
    <section class="w-full mt-28 px-[50px]">
        <div class="grid grid-cols-6 gap-4">
            @foreach($games as $game)
                <div data-id="{{ $game->id }}" class="detail-game" data-slug="{{ $game->slug }}">
                    <img class="w-[100px] h-[160px] object-contain" src="{{ asset('images/games/'.$game->image_url) }}" alt="jili">
                </div>
            @endforeach
            {{-- <div class="bg-blue-200 p-4 rounded">

            </div> --}}
            
        </div>
        <div class="flex justify-center mt-5">
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
        </div>
        
    </section>
</div>
@section('js')
<!-- <script src="{{ asset('js/home.js') }}"></script> -->
@endsection
