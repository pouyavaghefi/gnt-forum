<div id="post-data">
    @foreach($ques as $que)
        <div class="posts__item @if($loop->index % 2 == 0) bg-f2f4f6 @endif BYekan">
            <div class="posts__section-left">
                <div class="posts__topic">
                    <div class="posts__content">
                        <a href="{{ route('question.show', ['question'=>$que->que_slug]) }}">
                            <h3>{{ $que->que_title }}</h3>
                        </a>
                        <div class="posts__tags tags">
                            @foreach($que->tags as $tag)
                                <a href="{{ route('tag.single',['tag' => $tag->tag_uri ?? $tag->tag_name]) }}" class="bg-{{ $tag->tag_color }}">{{ $tag->tag_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="posts__category"><a href="{{ route('cat.single',['cat' => $que->categories[0]->cat_uri ?? trim($que->categories[0]->cat_name)]) }}" class="category"><i class="bg-{{ $que->categories[0]->cat_color }}"></i>&nbsp; {{ $que->categories[0]->cat_name }}</a></div>
            </div>
            <div class="posts__section-right">
                <div class="posts__users">
                    <div>
                        <a href="/users/{{ $que->user->usr_user_name }}" class="avatar"><img src="{{ asset('assets/fonts/icons/avatars/'.show_avatar(strtolower($que->user->usr_user_name[0]))) }}" alt="avatar"></a>
                    </div>
                </div>
                <div class="posts__replies">{{ $que->answers->count() }}</div>
                <div class="posts__views">{{ $que->que_view_count }}</div>
                <div class="posts__activity">{{ digits_persian(jdate($que->created_at)->ago()) }}</div>
            </div>
        </div>
    @endforeach
</div>

