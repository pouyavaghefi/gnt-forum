<form method="POST" action="{{ route('auth.register.new') }}">
    @csrf
    <div class="row" data-visible="desktop">
        <div class="col-md-6">
            <div class="signup__section BMehrBold">
                <label class="signup__label" for="firstname"><strong>نام</strong> (حداقل ۳ کاراکتر/ فقط حروف فارسی)</label>
                <input type="text" name="fname" class="form-control" id="firstname" value="{{ old('fname') }}" maxlength="10">
            </div>
        </div>
        <div class="col-md-6">
            <div class="signup__section BMehrBold">
                <label class="signup__label" for="lastname"><strong>نام خانوادگی</strong> (حداقل ۴ کاراکتر/ فقط حروف فارسی)</label>
                <input type="text" name="lname"class="form-control" id="lastname" value="{{ old('lname') }}" maxlength="11">
            </div>
        </div>
    </div>
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="username"><strong>نام کاربری</strong> (حاوی اعداد و نماد نباشد/ فقط حروف انگلیسی/ حداقل ۵ حرف)</label>
        <div class="message-input" dir="ltr">
            <input type="text" name="uname" class="form-control" id="username" value="{{ old('username') }}" dir="ltr" maxlength="12" onblur="checkusername()" onkeyup="this.value = this.value.toLowerCase();">
            <span id="usernamestatus" class="message-input__strong BMehrBold" style="display:none"></span>
        </div>
    </div>
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="phone"><strong>شماره موبایل</strong></label>
        <div class="message-input" dir="ltr">
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" dir="ltr" maxlength="11" onKeyPress="if(this.value.length==11) return false;" onblur="checkmobilephone()">
            <span id="mobilephonestatus" class="message-input__strong BMehrBold" style="display:none"></span>
        </div>
    </div>
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="password"><strong>رمز عبور</strong> (حداقل ۸ کاراکتر/ فقط حروف انگلیسی)</label>
        <div class="message-input" dir="ltr">
            <input type="password" name="password" class="form-control" id="password" maxlength="16" onKeyPress="if(this.value.length==16) return false;" autocomplete="off" onblur="checkpasswordlength()">
            <span id="passwordstrengthstatus" class="message-input__strong BMehrBold" style="display:none"></span>
        </div>
    </div>
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="password_confirmation"><strong>تکرار رمز عبور</strong></label>
        <div class="message-input" dir="ltr">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" maxlength="16" onKeyPress="if(this.value.length==16) return false;" autocomplete="off" onblur="checkpasswordconfirmation()">
            <span id="passwordconfirmationstatus" class="message-input__strong BMehrBold" style="display:none"></span>
        </div>
    </div>
    <div class="signup__checkbox BMehrBold">
        <div class="row">
            <div class="col-md-12">
                <label class="signup__box">
                    <label class="custom-checkbox">
                        <input type="checkbox" name="rules" id="rules_checkmark">
                        <i></i>
                    </label>
                    <span>
                        &nbsp;
                        من به
                        <a id="rules">قوانین و مقررات</a>
                        سایت متعهد هستم
                        &nbsp;</span>
                </label>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:50px" dir="ltr">
        @foreach(range(0,5) as $i)
            <div class="col-2">
                <img src="{{ asset("/storage/captcha/".$ip."/".$i."captcha.png") }}">
            </div>
        @endforeach
    </div></br>
    <div class="signup__section">
        <label class="signup__label BMehrBold" for="captchacode" dir="rtl"><strong>کد کپچا را وارد کنید</strong> (از چپ به راست) </label>
        <div class="message-input" dir="ltr">
            <input type="text" name="ccode" class="form-control" id="captchacode" maxlength="6" minlength="6" onKeyPress="if(this.value.length==6) return false;" autocomplete="off" required="required" onkeyup="this.value = this.value.toUpperCase();">
        </div>
    </div>

    <button id="register" class="signup__btn-create btn btn--type-02 BJadidBold button button__text" onclick="this.classList.toggle('button--loading')" disabled="disabled"><span class="button__text"> بزن بریم &#9996; </span></button>
    </br>
    <a href="{{ route('auth.login') }}" class="btn-link BSinaBold"> در صورت داشتن حساب کاربری وارد شوید  </a>
</form>
