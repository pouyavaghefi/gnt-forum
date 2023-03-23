@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.asknewque'))

@section('main')
    <main dir="rtl" id="askForm">
        @include('frontend.samples.submit-new-question')
    </main>
@endsection

@section('style')
    <style>
        hr{
            overflow: visible; /* For IE */
            height: 30px;
            border-style: solid;
            border-color: black;
            border-width: 1px 0 0 0;
            border-radius: 20px;
        }

    </style>
@endsection

@section('scripts')
    <script>
        content = document.querySelector("#description");

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

        const [tags, tagshow]=["tags","tagshow"].map(id=>document.getElementById(id));
        tags.addEventListener("input",_=>
        tagshow.textContent=tags.value.trim().split(/ +/).map(w=>"#"+w).join(" "))

        setTimeout(
            function()
            {
                $("html, body").animate({
                    scrollTop: $('#askForm').offset().top
                }, 1000);
            }, 2000
        );

        $(document).on('click', '#guidelines', function(e) {
            Swal.fire({
                type: "warning",
                width: '1000px',
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "متوجه شدم",
                html:'',
                title:'<b>راهنمای ثبت پرسش جدید در گویانت</b>'
            });
        });

        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                if(i>3){
                    Swal.fire({
                        type: "warning",
                        width: '1000px',
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "باشه",
                        html:'<b>بیشتر از سه عکس نمیتوان اضافه کرد</b>',
                        title:'<b>توجه</b>'
                    });
                    $('#add').hide();
                }else{
                    $('#dynamic_field').append('<div class="row"><div class="col-md-12"><div class="form-group col"><label for="file" class="control-label BMehrBold">عکس'+i+'</label><br><div class="input-group"><span class="input-group-btn"><label class="btn btn-primary btn-file" for="multiple_input_group"><div class="input required"><input id="multiple_input_group" type="file" name="filep[]"></div>Browse</label></span><span class="file-input-label"></span></div></div></div></div>');
                }
            });
        });

        $(document).on('click', '#reset', function(e) {
            location.reload();
        });

        $('#category').select2();
        $('#tags').select2();
    </script>
@endsection
