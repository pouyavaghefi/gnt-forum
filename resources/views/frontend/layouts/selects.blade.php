<div class="nav__categories js-dropdown">
    <div class="nav__select">
        <div class="btn-select BMehrBold" data-dropdown-btn="tags">برچسب ها</div>
        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
            <div class="tags">
                @foreach($tagFilters as $tagFilter)
                    <a href="{{ route('tag.single',['tag' => $tagFilter->tag_uri ?? $tagFilter->tag_name]) }}" class="bg-{{ $tagFilter->tag_color }}">{{ $tagFilter->tag_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="nav__categories js-dropdown" dir="rtl">
    <div class="nav__select">
        <div class="btn-select BMehrBold" data-dropdown-btn="tags">
            بازه زمانی
            &nbsp;
            <span> (هفته جاری) </span>
        </div>
        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
            <ul class="dropdown__catalog row BHoma">
                <li class="col-xs-6"><a href="#" class="category red-active">هفته جاری</a></li>
                <li class="col-xs-6"><a href="#" class="category">هفته پیش</a></li>
                <li class="col-xs-6"><a href="#" class="category">ماه پیش</a></li>
                <li class="col-xs-6"><a href="#" class="category">سال پیش</a></li>
            </ul>
        </div>
    </div>
</div>
