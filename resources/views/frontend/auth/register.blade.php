@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.signup'))

@section('main')
    <!-- MAIN -->
    <main class="signup__main">
        <img class="signup__bg" src="{{ asset('assets/images/signup-bg.png') }}" alt="bg">

        <div class="container">
            <div class="signup__container">
                <div class="signup__logo BTitrTGEBold">
                    <a href="{{ env('APP_URL') }}">{{ env('APP_FARSI_NAME') }} &nbsp;<img src="{{ asset('assets/fonts/icons/main/Logo_Forum.svg') }}" alt="logo"></a>
                </div>

                <div class="signup__head">
                    <h3 class="BBardiya">به جامعه بزرگ ما ملحق شوید</h3>
{{--                    <p class="BHelal">--}}
{{--                        پس از عضویت میتوانید سوالات خود را مطرح کرده و یا حتی--}}
{{--                        کسب درآمد کنید--}}
{{--                    </p>--}}
                </div>

                <div class="signup__form" dir="rtl" id="regForm">
                    @include('frontend.layouts.partials.errors')
                    @include('frontend.samples.register_form')
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        var environ = window.location.host;
        var index = environ.includes("localhost");
        if (index) {
            var baseurl = "{{ URL::to('/') }}";
        } else {
            var baseurl = window.location.protocol + "//" + window.location.host + "/";
        }

        setTimeout(
            function()
            {
                $("html, body").animate({
                    scrollTop: $('#regForm').offset().top
                }, 1000);
            }, 2000
        );

        $(document).on('click', '#rules', function(e) {
            Swal.fire({
                type: "warning",
                width: '1000px',
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "متوجه شدم",
                html:'<b>ورود کاربران به وب‏‌سایت باشگاه نانو هنگام استفاده از پرفایل شخصی، و سایر خدمات ارائه شده توسط باشگاه نانو به معنای آگاه بودن و پذیرفتن شرایط، قوانین و همچنین نحوه استفاده از سرویس‌‏ها و خدمات است.</b></br><b>توجه داشته باشید که ثبت سفارش نیز در هر زمان به معنی پذیرفتن کامل کلیه شرایط و قوانین از سوی کاربر است.</b></br></br><h2>قوانین عمومی</h2></br><p>کلیه اصول و رویه‏‌های باشگاه نانو منطبق با قوانین جمهوری اسلامی ایران، قانون تجارت الکترونیک و قانون حمایت از حقوق مصرف کننده است و متعاقبا کاربر نیز موظف به رعایت قوانین مربوطه است.</p></br><p>در صورتی که در قوانین مندرج، رویه‏‌ها و سرویس‏‌ها تغییری ایجاد شود، در همین صفحه منتشر و به روز رسانی می شود و شما توافق می‏‌کنید که استفاده مستمر شما از سایت به معنی پذیرش هرگونه تغییر است.</p></br></br><h2>تعریف مشتری یا کاربر</h2></br><p>مشتری یا کاربر به شخصی گفته می‌شود که با اطلاعات کاربری خود که در فرم ثبت نام درج کرده است، به ثبت سفارش یا هرگونه استفاده از خدمات باشگاه نانو اقدام کند.</p></br><p>همچنین از آنجا که باشگاه نانو یک وب‌سایت آنلاین است، طبق قانون تجارت الکترونیک، مشتری یا مصرف کننده فردی است که به منظوری جز تجارت یا شغل حرفه‌ای به خرید کالا یا خدمات اقدام می‌کند.</p></br></br><h1>تعریف فروشنده</h1></br><p>محصولات ارایه شده در وب‌سایت که شامل فیلم‌ آموزشی، بازی آموزشی،دوره آموزشی، کتاب و مجله است توسط باشگاه نانو منتشر شده اند و تماما مجوزهای لازمه را کسب کرده اند.</p></br><p>مسئولیت‌های مربوط به کیفیت، قیمت، محتوا، شرایط و همچنین خدمات پس از فروش محصول بر عهده باشگاه نانو است.</p></br><p>مسئولیت‌های مربوط به کیفیت، قیمت، محتوا، شرایط و همچنین خدمات پس از فروش محصول بر عهده باشگاه نانو است.</p></br><p>فاکتور کالاهایی که در سایت عرضه می‌شود، در صورت درخواست خریدار توسط فروشنده ارسال می‌شود.</p></br><p>سفارشاتی که طی ساعات اداری به ثبت برسند حداکثر 48 ساعت کاری زمان خواهند برد تا به دست مشتریان ساکن تهران برسند و برای مشتریان سایر شهرستان ها بین 3 تا 7 روز کاری زمان خواهند برد.</p></br><p>در شرایط خاص مثل فروش شگفت‌انگیز، احتمال لغو شدن سفارش مربوط به محصولات فروشندگان به دلایلی مانند اتمام موجودی کالا وجود دارد و باشگاه نانو مجاز است بدون اطلاع قبلی نسبت به توقف سفارش‌‏گیری جدید اقدام و فروش را متوقف کند.</p></br><h2>ارتباطات الکترونیکی</h2></br></br><p>هنگامی که شما از سرویس‌‏ها و خدمات باشگاه نانو استفاده می‏‌کنید، سفارش اینترنتی خود را ثبت یا خرید می‏‌کنید و یا به باشگاه نانو ایمیل می‏‌زنید، این ارتباطات به صورت الکترونیکی انجام می‏‌شود و در صورتی که درخواست شما با رعایت کلیه اصول و رویه‏‌ها باشد، شما موافقت می‌‏کنید که باشگاه نانو به صورت الکترونیکی (از طریق پست الکترونیکی، سرویس پیام کوتاه و سایر سرویس‌های الکترونیکی) به درخواست شما پاسخ دهد.</p></br><p>همچنین آدرس ایمیل و تلفن‌هایی که مشتری در پرفایل خود ثبت می‌کند، تنها آدرس ایمیل و تلفن‌های رسمی و مورد تایید مشتری است و تمام مکاتبات و پاسخ‌های شرکت از طریق آنها صورت می‌گیرد.</p></br><p>جهت اطلاع رسانی رویدادها، خدمات و سرویس‌های ویژه یا پروموشن‌ها، امکان دارد باشگاه نانو برای اعضای وب سایت ایمیل یا پیامک ارسال نماید.</p></br><p>همچنین ممکن است باشگاه نانو برای برخی کاربران یا مشتریان خود، سوال نظرسنجی ارسال کند.</p></br><h2>سیاست‏‌های رعایت حریم شخصی</h2></br></br><p>باشگاه نانو به اطلاعات خصوصی اشخاصى که از خدمات سایت استفاده می‏‌کنند، احترام گذاشته و از آن محافظت می‏‌کند.</p></br><p>باشگاه نانو متعهد می‏‌شود در حد توان از حریم شخصی شما دفاع کند و در این راستا، تکنولوژی مورد نیاز برای هرچه مطمئن‏‌تر و امن‏‌تر شدن استفاده شما از سایت را توسعه دهد. در واقع با استفاده از سایت باشگاه نانو، شما رضایت خود را از این سیاست نشان می‏‌دهید.</p></br><p>همه مطالب در دسترس از طریق هر یک از خدمات باشگاه نانو، مانند متن، گرافیک، آرم، آیکون دکمه، تصاویر، ویدئوهای تصویری، موارد قابل دانلود و کپی، داده‌ها و کلیه محتوای تولید شده توسط باشگاه نانو جزئی از دارای های معنوی ما محسوب می‏‌شود و حق استفاده و نشر تمامی مطالب موجود و در دسترس در انحصار باشگاه نانو است و هرگونه استفاده بدون کسب مجوز کتبی، حق پیگرد قانونی را برای ما محفوظ می‏‌دارد.</p></br><p>علاوه بر این، اسکریپت‌ها، و اسامی خدمات قابل ارائه از طریق هر یک از خدمات ایجاد شده توسط باشگاه نانو و علائم تجاری ثبت شده نیز در انحصار باشگاه نانو است و هر گونه استفاده با مقاصد تجاری پیگرد قانونی دارد.</p></br><p>کاربران مجاز به بهره‌‏برداری و استفاده از لیست محصولات، مشخصات فنی، قیمت و هر گونه استفاده از مشتقات وب‏‌سایت باشگاه نانو و یا هر یک از خدمات و یا مطالب، دانلود یا کپی کردن اطلاعات با مقاصد تجاری، هر گونه استفاده از داده کاوی، روبات، یا روش‌‏های مشابه مانند جمع آوری داده‌‏ها و ابزارهای استخراج نیستند و کلیه این حقوق به صراحت برای باشگاه نانو محفوظ است.</p></br><p>در صورت استفاده از هر یک از خدمات باشگاه نانو، کاربران مسئول حفظ محرمانه بودن حساب و رمز عبور خود هستند و تمامی مسئولیت فعالیت‌‏هایی که تحت حساب کاربری و یا رمز ورود انجام می‏‌پذیرد به عهده کاربران است</p></br><h2>ثبت، پردازش و ارسال سفارش</h2></br></br><ul><li>1.	روز کاری به معنی روز شنبه تا پنج شنبه هر هفته، به استثنای تعطیلات عمومی در ایران است و کلیه سفارشات ثبت شده در طول روزهای کاری و اولین روز پس از تعطیلات پردازش می‌‏شوند.باشگاه نانو به مشتریان خود در ۷ روز هفته و ۲۴ ساعت در روز امکان سفارش‌‏گذاری می‌‏دهد.</li><li>2.	کلیه سفارشات ثبت شده در سایت باشگاه نانو به وسیله ارسال کد سفارش از طریق پیام کوتاه و پیش فاکتور از طریق ایمیل، در صف پردازش قرار می‏‌گیرند. باشگاه نانو همواره در ارسال و تحویل کلیه سفارشات ثبت شده، نهایت دقت و تلاش خود را انجام می‌دهد. با وجود این، در صورتی که موجودی محصولی در باشگاه نانو به پایان برسد، حتی پس از اقدام مشتری به سفارش‌‏گذاری، حق کنسل کردن آن سفارش و یا استرداد وجه سفارش برای باشگاه نانو محفوظ است و یا مشتری می‏‌تواند به جای کالای به اتمام رسیده، محصول دیگری را جایگزین کند.</li><li>3.	در صورت بروز مشکل در پردازش نهایی سبد خرید مانند اتمام موجودی کالا یا انصراف مشتری، مبلغ پرداخت شده طی ۲۴ الی 72 ساعت کاری به حساب مشتری واریز خواهد شد.</li><li>4.	 باشگاه نانو مجاز است بدون اطلاع قبلی نسبت به توقف سفارش‌‏گیری جدید، اقدام و فروش خود را متوقف کند و کلیه سفارشات ثبت شده قبل از توقف سفارش‌‏گیری، پردازش و ارسال می‌‏شود. حق قطع فروش کلیه و یا بخشی از محصولات به هر دلیلی مانند اتمام موجودی کالا بدون اطلاع قبلی، برای باشگاه نانو محفوظ است.</li><li>5.	 در صورت بروز هرگونه خطا نسبت به درج قیمت و ارزش ریالی کالاهای موجود در سایت باشگاه نانو، حق بلا اثر نمودن سفارش و خرید انجام شده توسط مشتری، برای باشگاه نانو محفوظ است. باشگاه نانو در اسرع وقت وجوه دریافتی را به حساب اعلام شده توسط مشتری واریز و عودت می‌نماید و مشتری با ورود به سایت باشگاه نانو می‌پذیرد از این امر آگاهی داشته و در این خصوص ادعایی نخواهد داشت.</li><li>کاربران باید هنگام سفارش کالای مورد نظر خود، فرم سفارش را با اطلاعات صحیح و به طور کامل تکمیل کنند. بدیهی است درصورت ورود اطلاعات ناقص یا نادرست، سفارش کاربر قابل پیگیری و تحویل نخواهد بود. بنابراین درج آدرس، ایمیل و شماره تماس‌های همراه و ثابت توسط مشتری، به منزله مورد تایید بودن صحت آنها است و در صورتی که این موارد به صورت صحیح یا کامل درج نشده باشد، باشگاه نانو جهت اطمینان از صحت و قطعیت ثبت سفارش می‌تواند از مشتری، اطلاعات تکمیلی و بیشتری درخواست کند.همچنین، مشتریان می‌توانند نام، آدرس و تلفن شخص دیگری را برای تحویل گرفتن سفارش وارد کنند و اگر مبلغ سفارش از پیش پرداخت شده باشد، تحویل گیرنده سفارش هنگام دریافت کالا باید کارت شناسایی همراه داشته باشد.آدرسی که خریدار به عنوان آدرس تحویل‌گیرنده ثبت یا انتخاب می‌کند، در فاکتور درج خواهد شد و لازم است درخواست کنندگان فاکتور به نام شخص حقوقی هنگام ثبت سفارش به این نکته توجه کافی داشته باشند، چرا که تغییر آدرس درج شده روی فاکتور پس از پردازش و تایید سفارش، به هیچ عنوان امکان‌پذیر نخواهد بود.</li><li>7.	 لازم به ذکر است افزودن کالا به سبد خرید به معنی رزرو کالا نیست و هیچ گونه حقی را برای مشتریان ایجاد نمی‌کند. همچنین تا پیش از ثبت نهایی، هرگونه تغییر از جمله تغییر در موجودی کالا یا قیمت، روی کالای افزوده شده به سبد خرید اعمال خواهد شد. بنابراین به مشتریانی که تمایل و تصمیم به خرید قطعی دارند توصیه می‌شود در اسرع وقت سفارش خود را نهایی کنند تا با اتمام موجودی یا تغییر قیمتی کالاها روبرو نشوند. شایان ذکر است سفارش تنها زمانی نهایی می‌شود که کاربران کد سبد خرید باشگاه نانو سفارش خود را دریافت کنند و بدیهی است که باشگاه نانو هیچ‌گونه مسوولیتی نسبت به کالاهایی که در سبد خرید رها شده است، ندارد.</li></ul>',
                title:'<b>شرایط و قوانین استفاده از سرویس‌ها و خدمات باشگاه نانو</b>'
            });
        });

        document.getElementById("firstname").addEventListener("keyup", function() {
            if (/^[a-zA-Z]+$/.test(this.value)) {
                document.getElementById("firstname").value = "";
                Swal.fire({
                    icon: 'error',
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "متوجه شدم",
                    html:'<b>ورودی فیلد نام بایستی حتما به فارسی باشد</b>',
                    title:'<b>توجه</b>'
                });
            }
        });

        document.getElementById("lastname").addEventListener("keyup", function() {
            if (/^[a-zA-Z]+$/.test(this.value)) {
                document.getElementById("lastname").value = "";
                Swal.fire({
                    icon: 'error',
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "متوجه شدم",
                    html:'<b>ورودی فیلد نام خانوادگی بایستی حتما به فارسی باشد</b>',
                    title:'<b>توجه</b>'
                });
            }
        });

        document.getElementById("username").addEventListener("keyup", function(e) {
            if (/^[a-zA-Z]+$/.test(this.value)) {
				
            }else{
                if($("#username").val() != "") {
                    document.getElementById("username").value = "";
                    Swal.fire({
                        icon: 'error',
                        type: "error",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "متوجه شدم",
                        html: '<b>ورودی فیلد نام کاربری بایستی حتما به انگلیسی باشد</b>',
                        title: '<b>توجه</b>'
                    });
                }
            }
        });

        document.getElementById("password").addEventListener("keyup", function(e) {
            if (/[a-zA-Z0-9,.;:_'\\s-]/.test(this.value)) {

            }else{
                if($("#password").val() != "") {
                    document.getElementById("password").value = "";
                    Swal.fire({
                        icon: 'error',
                        type: "error",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "متوجه شدم",
                        html: '<b>ورودی فیلد رمز عبور بایستی حتما به انگلیسی باشد</b>',
                        title: '<b>توجه</b>'
                    });
                }
            }
        });

        document.getElementById("phone").addEventListener("keyup", function(e) {
            if (/^[0-9]+$/.test(this.value)) {

            }else{
                if($("#phone").val() != "") {
                    document.getElementById("phone").value = "";
                    Swal.fire({
                        icon: 'error',
                        type: "error",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "متوجه شدم",
                        html: '<b>ورودی فیلد شماره موبایل بایستی حتما به عدد باشد</b>',
                        title: '<b>توجه</b>'
                    });
                }
            }
        });

        document.getElementById("captchacode").addEventListener("keyup", function(e) {
            if (/^[A-Za-z0-9]*$/.test(this.value)) {

            }else{
                if($("#captchacode").val() != "") {
                    document.getElementById("captchacode").value = "";
                    Swal.fire({
                        icon: 'error',
                        type: "error",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "متوجه شدم",
                        html: '<b>ورودی فیلد کپچا بایستی حتما به انگلیسی باشد</b>',
                        title: '<b>توجه</b>'
                    });
                }
            }
        });

        function checkusername(){
            var e = document.getElementById("username").value;
            if(e != ""){
                document.getElementById("usernamestatus").innerHTML = '...در حال بررسی';
                $.ajax({
                    type:'get',
                    url: baseurl + 'auth/checkUserNameExists',
                    data:{'uname':e},
                    success:function(data){
                        if(Object.keys(data).length === 0)
                        {
                            document.getElementById("usernamestatus").style.display = "inline";
                            document.getElementById("usernamestatus").innerHTML = " مجاز است";
                            document.getElementById("usernamestatus").style.setProperty('background-color', '#3cb878', 'important');
                        }else{
                            document.getElementById("usernamestatus").style.display = "inline";
                            document.getElementById("usernamestatus").innerHTML = " غیرمجاز است";
                            document.getElementById("usernamestatus").style.setProperty('background-color', 'red', 'important');
                        }
                    },
                    error:function(){

                    }
                });
            }else{
                document.getElementById("usernamestatus").style.display = "none";
            }
        }

        function checkmobilephone(){
            var e = document.getElementById("phone").value;
            if(e != ""){
                if(e.length == 11){
                    document.getElementById("mobilephonestatus").innerHTML = '...در حال بررسی';
                    $.ajax({
                        type:'get',
                        url: baseurl + '/auth/checkMobilePhoneExists',
                        data:{'phone':e},
                        success:function(data2){
                            if(Object.keys(data2).length === 0)
                            {
                                document.getElementById("mobilephonestatus").style.display = "inline";
                                document.getElementById("mobilephonestatus").innerHTML = " مجاز است";
                                document.getElementById("mobilephonestatus").style.setProperty('background-color', '#3cb878', 'important');
                            }else{
                                document.getElementById("mobilephonestatus").style.display = "inline";
                                document.getElementById("mobilephonestatus").innerHTML = "این شماره تکراری است";
                                document.getElementById("mobilephonestatus").style.setProperty('background-color', 'red', 'important');
                            }
                        },
                        error:function(){

                        }
                    });
                }else {
                    document.getElementById("mobilephonestatus").style.display = "inline";
                    document.getElementById("mobilephonestatus").innerHTML = "لطفا شماره را کامل وارد کنید";
                    document.getElementById("mobilephonestatus").style.setProperty('background-color', 'red', 'important');
                }
            }else{
                document.getElementById("mobilephonestatus").style.display = "none";
            }
        }

        function checkpasswordconfirmation(){
            var e = document.getElementById("password").value;
            var e2 = document.getElementById("password_confirmation").value;
            if(e2 != "") {
                document.getElementById("passwordconfirmationstatus").innerHTML = '...در حال بررسی';
                if(e === e2){
                    document.getElementById("passwordconfirmationstatus").style.display = "inline";
                    document.getElementById("passwordconfirmationstatus").innerHTML = "<span class=\"checkmark\"><div class=\"checkmark_stem\"></div><div class=\"checkmark_kick\"></div></span>";
                    document.getElementById("passwordconfirmationstatus").style.setProperty('background-color', '#3cb878', 'important');
                }else{
                    document.getElementById("passwordconfirmationstatus").style.display = "inline";
                    document.getElementById("passwordconfirmationstatus").innerHTML = "<span class=\"crosssign\"><div class=\"crosssign_circle\"></div><div class=\"crosssign_stem\"></div><div class=\"crosssign_stem2\"></div></span>";
                    document.getElementById("passwordconfirmationstatus").style.setProperty('background-color', 'red', 'important');
                }
            }else{
                document.getElementById("passwordconfirmationstatus").style.display = "none";
            }
        }

        function checkpasswordlength(){
            var format1 = /^.*[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?-].*$/;
            var format2 = /[0-9]/;
            var e = document.getElementById("password").value;
            if(e != "") {
                document.getElementById("passwordstrengthstatus").style.display = "inline";
                document.getElementById("passwordstrengthstatus").innerHTML = '...در حال بررسی'
                document.getElementById("passwordstrengthstatus").style.setProperty('background-color', 'red', 'important');;
                if(e.length >= 12){
                    if(e.match(format2) && e.match(format1)){
                        document.getElementById("passwordstrengthstatus").style.display = "inline";
                        document.getElementById("passwordstrengthstatus").innerHTML = "قوی";
                        document.getElementById("passwordstrengthstatus").style.setProperty('background-color', '#3cb878', 'important');
                    }else{
                        document.getElementById("passwordstrengthstatus").style.display = "inline";
                        document.getElementById("passwordstrengthstatus").innerHTML = "متوسط";
                        document.getElementById("passwordstrengthstatus").style.setProperty('background-color', '#cccc00', 'important');
                    }
                }else{
                    document.getElementById("passwordstrengthstatus").style.display = "inline";
                    document.getElementById("passwordstrengthstatus").innerHTML = "ضعیف";
                    document.getElementById("passwordstrengthstatus").style.setProperty('background-color', 'orange', 'important');
                }
            }else{
                document.getElementById("passwordstrengthstatus").style.display = "none";
            }
        }

        $(function () {
            $('#register').attr('disabled', true);
            $('#rules_checkmark').change(function () {
                if ($('#firstname').val() != '' && $('#lastname').val() != '' && $('#username').val() != '' && $('#phone').val() != '' && $('#password').val() != '' && $('#password_confirmation').val() != '') {
                    $('#register').attr('disabled', false);
                } else {
                    $('#register').attr('disabled', true);
                }
            });
        });
    </script>
@endsection



