        @if(\Session::get('passHash') == 1)
            <form method="GET" action="{{ route('auth.login.next.passwd') }}">
                <button id="login" class="signup__btn-create btn btn--type-01 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')"><span class="button__text" style="color:#000 !important;"> ورود با رمز عبور </span></button>
            </form>
        <br>
        @endif
        <form method="GET" action="{{ route('auth.login.next.token') }}">
            <button id="login" class="signup__btn-create btn btn--type-02 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')"><span class="button__text"> ورود با رمز عبور یکبار مصرف (کد یکتا) </span></button>
        </form>
        <br>
        <a href="{{ route('destroyAuthLoginSessions') }}" class="btn-link BSinaBold">
            آیا
            @if(\Session::get('loggedType') == 'mobile')
                شماره ی
            @elseif(\Session::get('loggedType') == 'username')
                نام کاربری
            @else
                ایمیل
            @endif
            &nbsp;
            {{ Session::get('foundUser') }}
            &nbsp;
            متعلق به شما
            &nbsp;
            <span style="color:red">
            نیست؟
            </span>
        </a>

