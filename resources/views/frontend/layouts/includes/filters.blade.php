
<div class="nav__menu js-dropdown BKoodakBold" dir="rtl">
    <ul style="font-size:15.2px;">
        <li class="active"><a href="{{ env('APP_URL') }}">جدیدترین ها</a></li>
        <li @if(request()->has('recently')) class="active" @endif><a href="{{ env('APP_URL') }}?recently=1">بروزترین ها</a></li>
        <li @if(request()->has('solved')) class="active" @endif><a href="{{ env('APP_URL') }}?solved=1">حل شده ها</a></li>
        <li @if(request()->has('unsolved')) class="active" @endif><a href="{{ env('APP_URL') }}?unsolved=1">حل نشده ها</a></li>
        <li @if(request()->has('notanswered')) class="active" @endif><a href="{{ env('APP_URL') }}?notanswered=1">بی پاسخ ها</a></li>
        <li @if(request()->has('chosen')) class="active" @endif><a href="{{ env('APP_URL') }}?chosen=1">منتخب شده ها</a></li>
        <li @if(request()->has('favourites')) class="active" @endif><a href="{{ env('APP_URL') }}?favourites=1">محبوب ترین ها</a></li>
        <li @if(request()->has('controversial')) class="active" @endif><a href="{{ env('APP_URL') }}?controversial=1">پربحث ترین ها</a></li>
        <li @if(request()->has('mostrated')) class="active" @endif><a href={{ env('APP_URL') }}?mostrated=1">بالاترین امتیاز ها</a></li>
        <li @if(request()->has('mostviewed')) class="active" @endif><a href="{{ env('APP_URL') }}?mostviewed=1">بیشترین بازدید ها</a></li>
        <li @if(request()->has('bounties')) class="active" @endif><a href="{{ env('APP_URL') }}?bounties=1">سوالات اعتباری</a></li>
        <li @if(request()->has('specials')) class="active" @endif><a href="{{ env('APP_URL') }}?specials=1" class="blink_me">سوالات ویژه</a></li>
    </ul>
</div>
