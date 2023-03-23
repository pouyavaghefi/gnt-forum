@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".$question->que_title)

@section('main')
    <!-- MAIN -->
    <main>
        <div class="container">
            @if(($question->prevQue($question->id)) OR ($question->nextQue($question->id)))
                <div class="nav">
                    <div class="nav__thread BElham">
                        @if($question->prevQue($question->id))<a href="{{ route('question.show', ['question'=>$question->prevQue($question->id)]) }}" class="nav__thread-btn nav__thread-btn--prev"><i class="icon-Arrow_Left"></i>پرسش قبلی</a>@endif
                        @if($question->nextQue($question->id))<a href="{{ route('question.show', ['question'=>$question->nextQue($question->id)]) }}" class="nav__thread-btn nav__thread-btn--next">پرسش بعدی<i class="icon-Arrow_Right"></i></a>@endif
                    </div>
                </div>
            @endif
            <div class="topics" dir="rtl">
                @include('frontend.samples.question_info')
                <div class="topics__body">
                    <div class="topics__content">
                        @include('frontend.samples.question_content')
                        @include('frontend.samples.question_summary')
                        @include('frontend.samples.answers_content')
                        @include('frontend.samples.write_answer')
                        @include('frontend.samples.ads')
                    </div>
                </div>
                @if(!empty($ques))
                    <div class="topics__title BMehrBold">
                        <h1>
                        سوالات مرتبط
                        </h1>
                    </div>
                @endif
            </div>
            @if(!empty($ques))
                @include('frontend.layouts.partials.data')
            @endif
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
            if (!loggedIn) {
                redirectUser = setInterval(function () {
                    Swal.fire({
                        icon: 'info',
                        type: "info",
                        html: '<b>برای مشاهده این صفحه بایستی ابتدا وارد سایت شوید</b>',
                        title: '<b>!کاربر مهمان</b>',
                        confirmButtonColor: "#0069d9",
                        confirmButtonText: "ورود به حساب کاربری",
                        showCancelButton: true,
                        cancelButtonText: 'بازگشت به صفحه قبل',
                        cancelButtonColor: "#23aaeb",
                        allowOutsideClick: false
                    }).then(function () {
                        window.location.href = {!! json_encode(route('auth.login')) !!}
                    }, function (dismiss) {
                        if (dismiss == 'cancel') {
                            window.location.href = {!! json_encode(route('get.back')) !!}
                        }
                    });
                    clearInterval(redirectUser);
                }, 10000);
            }
        });

        $("#login_redirect").click(function (e) {
            window.location.reload();
        });

        content = document.querySelector("#description");
        wanswer = document.querySelector("#writeAnswer");

        document.querySelector("#bold").addEventListener("click",function(){
            content.value += "****";
            const end = content.value.length;
            content.setSelectionRange(end, end-2);
            content.focus();
        });

        document.querySelector("#italic").addEventListener("click",function(){
            content.value += "**";
            const end = content.value.length;
            content.setSelectionRange(end, end-1);
            content.focus();
        });

        document.querySelector("#link").addEventListener("click",function(){
            content.value += "[link](https://google.com)";
            const end = content.value.length;
            content.setSelectionRange(end, end-25);
            content.focus();
        });

        document.querySelector("#code").addEventListener("click",function(){
            content.value += "``";
            const end = content.value.length;
            content.setSelectionRange(end, end-1);
            content.focus();
        });

        EnlighterJS.init('pre', 'code', {
            language : 'javascript',
            theme: 'godzilla',
            indent : 2
        });
    </script>
@endsection
