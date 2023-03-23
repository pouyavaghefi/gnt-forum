@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.signin'))

@section('main')
    <!-- MAIN -->
    <main class="signup__main">
        <div class="container">
            <div class="signup__container">
                <div class="signup__form BNarm" dir="rtl" id="tokForm">
                    @include('frontend.layouts.partials.errors')
                    @if(session('codeSent'))
                        <div class="alert alert-warning countdown" id="counter" role="alert">

                        </div>
                    @endif
                    @include('frontend.samples.token_form_log')
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
                    scrollTop: $('#tokForm').offset().top
                }, 1000);
            }, 2000
        );

        var diffedTimeScnds = {!! json_encode($diffedTimeScnds ?? '')  !!};
        var diffedTimeMints = {!! json_encode($diffedTimeMints ?? '')  !!};

        timer = setInterval(function()
            {
                diffedTimeScnds-- ; // yek saniye zoodtar neshun bede behtare
                document.getElementById('counter').innerHTML = diffedTimeScnds + " ثانیه مانده تا امکان ارسال مجدد کد";
                if((diffedTimeMints > 10) || (diffedTimeScnds <= 0))
                {
                    document.getElementById('counter').innerHTML = '<a style="cusor:pointer;color:red" onclick="expireCode()">ارسال مجدد</a>';
                    clearInterval(timer)
                }
            }
            ,1000)

        function expireCode(){
            window.location.href = {!! json_encode(route('auth.login.next.token', 'e')) !!}
        }
    </script>
@endsection



