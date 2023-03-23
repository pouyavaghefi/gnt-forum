    <header>
        <div class="header js-header js-dropdown">
            <div class="container">
                <div class="header__logo">
                    @include('frontend.layouts.includes.ltop')
                </div>
                <div class="header__search">
                    @include('frontend.layouts.includes.mtop')
                </div>
                <div class="header__menu BKoodakBold">
                    @include('frontend.layouts.includes.rtop')
                </div>
                @include('frontend.layouts.parsers.auth')
            </div>
            @auth
                <div class="header__offset-btn">
                    <a title="ثبت پرسش جدید" href="{{ route('question.new') }}"><img src="{{ asset('assets/fonts/icons/main/New_Topic.svg') }}" alt="ثبت پرسش جدید"></a>
                </div>
            @endauth
        </div>
    </header>
