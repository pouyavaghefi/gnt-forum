@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.signin'))

@section('main')
    <!-- MAIN -->
    <main class="signup__main">
        <div class="container">
            <div class="signup__container">
                <div class="signup__form" dir="rtl" id="nextForm">
                    @include('frontend.layouts.partials.errors')
                    @include('frontend.samples.passwd_form')
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
                    scrollTop: $('#nextForm').offset().top
                }, 1000);
            }, 2000
        );
        // document.getElementById("userinput").addEventListener("keyup", function(e) {
        //     if (/^[a-zA-Z]+$/.test(this.value)) {
        //
        //     }else{
        //         if($("#userinput").val() != "") {
        //             document.getElementById("userinput").value = "";
        //             Swal.fire({
        //                 icon: 'error',
        //                 type: "error",
        //                 confirmButtonColor: "#DD6B55",
        //                 confirmButtonText: "متوجه شدم",
        //                 html: '<b>ورودی این فیلد بایستی حتما به انگلیسی باشد</b>',
        //                 title: '<b>توجه</b>'
        //             });
        //         }
        //     }
        // });
        //
    </script>
@endsection



