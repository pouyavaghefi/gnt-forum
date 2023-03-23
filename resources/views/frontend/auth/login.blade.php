@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.signin'))

@section('main')
    <!-- MAIN -->
    <main class="signup__main">
        <div class="container">
            <div class="signup__container">
                <div class="signup__form" dir="rtl" id="logForm">
                    @if(\Session::has('heydude'))
                        @include('frontend.layouts.partials.heydude')
                    @endif

                    @include('frontend.layouts.partials.errors')
                    @include('frontend.samples.login_form')
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
                    scrollTop: $('#logForm').offset().top
                }, 1000);
            }, 2000
        );
    </script>
@endsection



