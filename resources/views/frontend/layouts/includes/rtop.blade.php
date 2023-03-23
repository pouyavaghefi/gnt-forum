<div class="header__menu-btn" data-dropdown-btn="menu">
    &nbsp;دسته بندی ها <i class="icon-Menu_Icon"></i>
</div>
<nav class="dropdown dropdown--design-01" data-dropdown-list="menu">
    <div>
        <ul class="dropdown__catalog row" dir="rtl">
            @foreach($catFilters as $catFilter)
                <li class="col-xs-6"><a href="{{  url('/') }}/cats/{{ $catFilter->cat_uri ?? $catFilter->cat_name }}" class="category"><i class="bg-{{ $catFilter->cat_color }}"></i>&nbsp;  {{ $catFilter->cat_name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div>
        <ul class="dropdown__catalog row" dir="rtl">
            <li class="col-xs-6"><a href="#">درخواست ثبت دسته بندی جدید</a></li>
            <li class="col-xs-6"><a href="#">درخواست ثبت تگ (برچسب) جدید</a></li>
        </ul>
    </div>
</nav>
