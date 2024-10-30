<div class="model-logout model-logout_active" style="display: none" id="{{ $id }}">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper relative">

        <img class="close-btn absolute top-[17px] right-[0px] cursor-pointer" width="80" height="80" src="{{asset('images/graphics/close-btn.png')}}" alt="">

        <div class="model-title">
            <h1>{{ $title }}</h1>
        </div>
        <h3>{{ $content }}</h3>
        <div class="group_btn">
            <div class="btn btn-model-cc">Đóng</div>
        </div>
    </div>
</div>