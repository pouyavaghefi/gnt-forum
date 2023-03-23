<form method="POST" action="{{ route('auth.2fa.verify') }}">
    @csrf

    <div class="signup__section">
        <label class="signup__label BMehrBold" for="token"><strong>کد ارسال شده به شماره موبایل خود را وارد کنید</strong></label>
        <div class="message-input" dir="ltr">
            <input type="text" name="token" class="form-control" id="token" value="" dir="ltr">
        </div>
    </div>

    <button id="login" class="signup__btn-create btn btn--type-02 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')"><span class="button__text"> ثبت و ادامه </span></button>
    </br>
</form>
