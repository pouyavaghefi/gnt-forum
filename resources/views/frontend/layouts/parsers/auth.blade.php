@auth
    @include('frontend.layouts.parsers.notifications')
@endauth

@guest
    <div class="header__user">
        <div class="header__user-btn">
                <a class="BEsfehanBold" href="{{ route('auth.register') }}">ثبت نام</a>&nbsp;<strong>/</strong>&nbsp;
                <a class="BEsfehanBold" href="{{ route('auth.login') }}" style="color:#F8BC64;">ورود به حساب کاربری</a>
        </div>
    </div>
@endguest

@auth
    <div class="header__user">
        <div class="header__user-btn" data-dropdown-btn="user">
            <img src="{{ asset('assets/fonts/icons/avatars/'.show_avatar(strtolower(auth()->user()->usr_user_name[0]))) }}" alt="avatar">
            {{ auth()->user()->usr_user_name }}
            <i class="icon-Arrow_Below"></i>
        </div>
        <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
            <div>
                <div class="dropdown__icons">
                    <a href="{{ route('auth.logout') }}" title="خروج از حساب کاربری"><i class="icon-Logout"></i></a>
                </div>
            </div>
            <div>
                <ul class="dropdown__catalog BHoma" dir="rtl">
                    <li><a href="/profile">مشاهده پروفایل</a></li>
                    <li><a href="/account">اطلاعات حساب کاربری</a></li>
                    <li><a href="/settings">تنظیمات</a></li>
                </ul>
            </div>
        </nav>
    </div>
@endauth
