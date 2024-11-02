<header>
    <div class="header_wrapper">
        <div class="header-col-L">
            <a href="/" class="header-logo">
                <img src="{{ asset('images/graphics/logo-header.png') }}" alt="">
            </a>

        </div>
        <div class="header-col-R">

            <div class="relative flex items-center gap-2 relative"> 
                <div id="user-name" class="flex items-center justify-center text-white max-w-full truncate">
                    
                </div>

                <div id="btn-dropdown" class="cursor-pointer">
                    <img width="40" height="40" src="{{asset('images/graphics/arrow-down.png')}}" alt="">
                </div>


                <div id="dropdown" class="absolute top-12 right-0 rounded-lg hidden before:h-[30px] before:w-full before:left-0 before:top-[-17px] before:absolute">
                    {{-- <ul>
                        <li>
                            Thông tin tài khoản
                        </li>
                        <li>
                            Nạp xu
                        </li>
                        <li>
                            Hỗ trợ
                        </li>
                        <li>
                            Đăng xuất
                        </li>
                    </ul> --}}
                    <ul id="user-menu-dropdown" class="px-4 pt-2 text-sm">
                        <li class="flex items-center justify-between py-2.5 border-b border-white">
                            <apan class="text-white flex-1 btn-user-model cursor-pointer" >Thông tin tài khoản</apan>
                            
                            <img width="20" height="20" src="{{asset('images/graphics/arrow-narrow-right.png')}}" alt="">
                        </li>
                        <li class="flex items-center justify-between py-2.5 border-b border-white">
                            <span class="text-white flex-1 btn-coin cursor-pointer">Nạp xu</span>
                            <img width="20" height="20" src="{{asset('images/graphics/arrow-narrow-right.png')}}" alt="">
                        </li>
                        <li class="flex items-center justify-between py-2.5 border-b border-white">
                            <span class="text-white flex-1 btn-help-model cursor-pointer">Hỗ trợ</span>
                            <img width="20" height="20" src="{{asset('images/graphics/arrow-narrow-right.png')}}" alt="">
                        </li>
                        <li class="flex items-center justify-between py-2.5">
                            <span class="text-white flex-1 btn-logout1 cursor-pointer">Đăng xuất</span>
                            <img width="18" height="18" src="{{asset('images/graphics/logout-img.png')}}" alt="">
                        </li>
                    </ul>
                </div>
            </div>

            <script>
                window.telegramLink = "https://t.me/{{ env('SUPPORT') }}";
                // window.telegramContactLink = "https://t.me/{{ env('TELEGRAM_GROUP_LINK') }}";
            </script>

            <!-- <div class="header-mobile"> -->
                <div class="header-group-btn !hidden">
                    <div class="logo-mobile"><img src="{{ asset('images/graphics/logo-header.png') }}" alt=""></div>
                    {{-- <div class="heeader-btn_item" id="user-name"></div> --}}
                    <div class="heeader-btn_item">
                        Xu <span class="ml-1" id="coin"></span>
                    </div>
                    <div class="heeader-btn_item btn-coin">
                        Nạp xu
                    </div>
                    <div class="heeader-btn_item btn-help">
                        Hỗ trợ
                    </div>
                    {{-- <script>
                        window.telegramLink = "https://t.me/{{ env('SUPPORT') }}";
                    </script> --}}
                    <div class="heeader-btn_item btn-logout1">
                        Đăng xuất
                    </div>
                </div>
            <!-- </div> -->

            <div class="hamburger !hidden">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
            </div>
        </div>
    </div>
</header>

<script>
    const btnDropdown = document.getElementById('btn-dropdown');

    btnDropdown.addEventListener('click', () => {
        const userMenuDropdown = document.getElementById('dropdown');
        userMenuDropdown.classList.toggle('hidden');
    });

    // Check click outside dropdown
    document.addEventListener('click', function(event) {
        var isClickInside = btnDropdown.contains(event.target);

        if (!isClickInside) {
            const userMenuDropdown = document.getElementById('dropdown');
            userMenuDropdown.classList.add('hidden');
        }
    });
</script>