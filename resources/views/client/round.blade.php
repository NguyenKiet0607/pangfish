<div class="model-logout model-logout_active" style="display: none" id="{{ $id }}">
    <div class="model-logout_overlay"></div>
    <div class="relative flex flex-col justify-around items-center">
        <img class="close-btn absolute top-[-28px] right-[0px] cursor-pointer z-10" width="96" height="96" src="{{asset('images/graphics/btn-close-round.png')}}" alt="">
        <div id="bg-rounded-popup" class="relative flex flex-col justify-around px-[40px]">
            <div class="flex items-center">
                <div>
                    <img class="w-[300px]" src="{{asset('images/graphics/round-img.png')}}" alt="">
    
                    <div id="bg-round-game-btn" class="relative top-[-54px] flex justify-center items-center">
                        Lượng đạn bắn
                        
                    </div>
                </div>
                <div>
                    <img class="w-[300px]" src="{{asset('images/background/bg-round-frame-time.png')}}" alt="">

                    <div class="round_count mt-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="model-logout model-logout_active" style="display: none" id="{{ $id }}">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper">
        <div class="model-title">
            <h1>Khung giờ chơi</h1>
        </div>
        <h3></h3>
        <div class="round_count"></div>
        <div class="group_btn">
            <div class="btn btn-model-cc">Đóng</div>
        </div>
    </div>
</div> --}}