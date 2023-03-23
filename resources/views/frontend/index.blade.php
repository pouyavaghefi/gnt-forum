@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.homepage'))

@section('style')
<style>
    .swal2-popup {
        font-size: 150px !important;
    }
</style>
@endsection

@section('main')
    <main>
        <div class="container">
            <div class="nav">
                @include('frontend.layouts.selects')

                <br>

                @include('frontend.layouts.includes.filters')
            </div>

            <div id="new_questions" class="BHelal" dir="rtl" style="color:#0000ff">
            </div>

            @include('frontend.layouts.partials.data')

            @include('frontend.layouts.parsers.pinned')
        </div>

{{--        </div>--}}
{{--        </div>--}}

    </main>

    <div class="ajax-load text-center" style="display:none">
        <br>
        <p><img width="100" height="100" src="{{ asset('assets/img/loader.gif') }}"></p>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).on('click', '.nav__menu a', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');

            // Remove the 'active' class from all filters
            $('.nav__menu ul li').removeClass('active');

            // Add the 'active' class to the clicked filter
            $(this).parent().addClass('active');

            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#post-data').html(data.html);
                    window.history.pushState(null, null, url);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        function loadMoreData(page){
            $.ajax({
                url: '?page=' + page,
                type:'get',
                beforeSend: function ()
                {
                    $(".ajax-load").show();
                }
            })
                .done(function(data){
                    if(data.html == ""){
                        $('.ajax-load').html("");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR,ajaxOptions,thrownError){
                    // console.log(thrownError)
                    alert("سرور پاسخگو نیست. ضمن عرض پوزش، لطفا بعدا دوباره امتحان نمایید...");
                });
        }

        var page = 1;
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                loadMoreData(page);
            }
        });

        updateHomeStatus();
        function updateHomeStatus() {
            window.setTimeout(updateHomeStatus, 10000);
        }

        var quecount = 0;
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    // change this URL to your path to the laravel function
                    url: 'new-question-exists',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // if queuecount is 0, then set its initial value to quecount
                        if(quecount == 0){
                            quecount = response.quecount;
                        }
                        if(response.quecount > quecount){
                            quecount = response.quecount;
                            new_question_found();
                        }
                    }
                });
            }, 60000);
        });
        function new_question_found(){
            $("#new_questions").html("پرسش جدیدی ثبت شده است. برای مشاهده صفحه را ریفرش کنید...");
        }
    </script>
@endsection
