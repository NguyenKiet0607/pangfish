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
    <section class="w-full h-screen mt-28 px-[50px] overflow-auto">
        <div class="grid grid-cols-6 gap-4">
            @foreach($games as $game)
                <div data-id="{{ $game->id }}" class="detail-game" data-slug="{{ $game->slug }}">
                    <img src="{{ asset('images/games/'.$game->image_url) }}" alt="jili">
                </div>
            @endforeach
            {{-- <div class="bg-blue-200 p-4 rounded">

            </div> --}}
            
        </div>
        {{-- <div class="slectgame_inner col-md-8 col-11">
            <div class="text-center mt-3">
                <img src="{{ asset('images/slot.png') }}" alt="slot">
            </div>
            <div class="slot_wrapper">
                @foreach($games as $game)
                    <div data-id="{{ $game->id }}" class="detail-game" data-slug="{{ $game->slug }}">
                        <img src="{{ asset('images/'.$game->image_url) }}" alt="jili">
                    </div>
                @endforeach
            
            </div>
        </div> --}}
    </section>
</div>
@section('js')
<!-- <script src="{{ asset('js/home.js') }}"></script> -->
@endsection
