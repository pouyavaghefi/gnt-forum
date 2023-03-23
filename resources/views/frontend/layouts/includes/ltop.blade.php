<h1>
    <a href="https://{{ env('APP_DOMAIN') }}/">
        <img src="{{ asset('assets/fonts/icons/main/Logo_Forum.svg') }}" alt="logo">
    </a>
</h1>
<div class="header__logo-btn BTitrTGEBold site-logo" data-dropdown-btn="logo">
    <span style="color:red !important;">
    نت
    </span>
    <span style="color:#000 !important">
    گویا
    </span>
    <i class="icon-Arrow_Below"></i>
</div>
<nav class="dropdown dropdown--design-01" data-dropdown-list="logo">
    <ul class="dropdown__catalog BHoma" dir="rtl">
        <li><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
        <li><a href="single-topic.html">کسب درآمد</a></li>
        <li><a href="single-topic.html">مقالات و دانستنی ها</a></li>
        <li><a href="single-topic.html">کاربران سایت</a></li>
        <!-- <li><a href="simple-signup.html">آکادمی گویانت</a></li>
        <li><a href="simple-signup.html">بانک مشاغل</a></li>
        <li><a href="simple-signup.html">پروژه های فریلنسری</a></li> -->
    </ul>
</nav>
