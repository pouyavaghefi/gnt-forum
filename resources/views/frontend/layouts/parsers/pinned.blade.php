@if(!empty($pinned))
<div class="posts__item bg-fef2e0">
    <div class="posts__section-left">
        <div class="posts__topic">
            <div class="posts__content">
                <a href="#">
                    <h3><i><img src="{{ asset('assets/fonts/icons/main/Pinned.svg') }}" alt="Pinned"></i> &nbsp; </h3>
                </a>
                <p>{{ $pinned->pin_title }}</p>
            </div>
        </div>
    </div>
</div>
@endif
