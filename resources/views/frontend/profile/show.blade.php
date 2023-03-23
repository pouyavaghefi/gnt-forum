@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.homepage'))

@section('styles')
    <style>

    </style>
@endsection

@section('main')
    <main>
        <br>
        <div class="container">
            <div class="row profile">
                <div class="col-md-9">
                    <div class="profile-content">
                        Some user related content goes here...
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" class="img-responsive" alt="">
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name BMorvarid" style="font-size:30px">
                                {{ auth()->user()->fullName() }}
                            </div>
                            <div class="profile-usertitle-job">
{{--                                {{ auth()->user()->member->mbr_job }}--}}
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm BJadidBold">دنبال کردن</button>
                            <button type="button" class="btn btn-primary btn-sm BJadidBold">ارسال پیام</button>
                            <button type="button" class="btn btn-danger btn-sm BJadidBold">گزارش کاربر</button>
                        </div>
                        <br>
                        <!-- END SIDEBAR BUTTONS -->

                        <div class="portlet light bordered">
                            <!-- STAT -->
                            <div class="row list-separated profile-stat">
                                <div class="col-md-12 col-sm-4 col-xs-6">
                                    <div class="uppercase profile-stat-text BMorvarid" style="font-size:20px;"> اعتبار </div>
                                    <div class="uppercase profile-stat-title"> 51 </div>
                                </div>
                            </div>
                            <!-- END STAT -->
                            <div>
                                @if(!empty(auth()->user()->member->mbr_bio))
                                    <h4 class="profile-desc-title" dir="rtl"> درباره {{ auth()->user()->fullName() }}</h4>
{{--                                <span class="profile-desc-text">{{ auth()->user()->member->mbr_bio }}</span>--}}
                                @endif
                                @if(!empty(auth()->user()->member->mbr_website))
                                    <div class="margin-top-20 profile-desc-link">
                                        <i class="fa fa-globe"></i>
    {{--                                    <a href="https://www.apollowebstudio.com">{{ auth()->user()->member->mbr_website }}</a>--}}
                                    </div>
                                @endif
                                @if(!empty(auth()->user()->member->mbr_twitter))
                                    <div class="margin-top-20 profile-desc-link">
                                        <i class="fa fa-twitter"></i>
    {{--                                    <a href="https://www.twitter.com/jasondavisfl/">{{ auth()->user()->member->mbr_twitter }}</a>--}}
                                    </div>
                                @endif
                                @if(!empty(auth()->user()->member->mbr_facebook))
                                    <div class="margin-top-20 profile-desc-link">
                                        <i class="fa fa-facebook"></i>
    {{--                                    <a href="https://www.facebook.com/">{{ auth()->user()->member->mbr_facebook }}</a>--}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="ajax-load text-center" style="display:none">
        <br>
        <p><img width="100" height="100" src="{{ asset('assets/img/loader.gif') }}"></p>
    </div>
@endsection

@section('scripts')
    <script>
        $(".nav ul li").click(function() {
            $(this)
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        const tabBtn = document.querySelectorAll(".nav ul li");
        const tab = document.querySelectorAll(".tab");

        function tabs(panelIndex) {
            tab.forEach(function(node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block";
        }
        tabs(0);

        let bio = document.querySelector(".bio");
        const bioMore = document.querySelector("#see-more-bio");
        const bioLength = bio.innerText.length;

        function bioText() {
            bio.oldText = bio.innerText;

            bio.innerText = bio.innerText.substring(0, 100) + "...";
            bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
        }
        //        console.log(bio.innerText)

        bioText();

        function addLength() {
            bio.innerText = bio.oldText;
            bio.innerHTML +=
                "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
            document.getElementById("see-less-bio").addEventListener("click", () => {
                document.getElementById("see-less-bio").style.display = "none";
            });
        }
        if (document.querySelector(".alert-message").innerText > 9) {
            document.querySelector(".alert-message").style.fontSize = ".7rem";
        }
    </script>
@endsection
