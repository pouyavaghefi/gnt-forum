<form method="POST" action="{{ route('auth.login.next.passwd') }}">
    @csrf
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="password"><strong>رمز عبور خود را وارد کنید</strong></label>
        <div class="message-input" dir="ltr">
            <input type="password" name="userinput" maxlength="16" class="form-control" id="password" value="" dir="ltr">
        </div>
    </div>

    <button id="login" class="signup__btn-create btn btn--type-02 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')"><span class="button__text"> وارد شو </span></button>
    </br>
    <a href="{{ route('auth.login.next.token') }}" class="btn-link BSinaBold"> اگر میخواهید با کد یکبار مصرف وارد شوید کلیک کنید </a>
</form>
