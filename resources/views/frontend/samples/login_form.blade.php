<form method="POST" action="{{ route('auth.login') }}">
    @csrf
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="phone"><strong>شماره موبایل/ نام کاربری/ ایمیل</strong></label>
        <div class="message-input" dir="ltr">
            <input type="text" name="userinput" class="form-control" id="phone" value="" dir="ltr">
        </div>
    </div>

    <button id="login" class="signup__btn-create btn btn--type-02 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')"><span class="button__text"> وارد شو </span></button>
    </br>
    <a href="{{ route('auth.register') }}" class="btn-link BSinaBold"> در صورت نداشتن حساب کاربری ثبت نام کنید </a>
</form>
