<div class="topics__heading">
    <h2 class="topics__heading-title">{{ $question->que_title }} </h2>
    <div class="topics__heading-info">
        @foreach($question->categories as $category)
            <a href="{{ route('cat.single',['cat' => $category->cat_uri ?? $category->cat_name]) }}" class="category"><i class="bg-{{ $category->cat_color }}"></i><strong>&nbsp{{ $category->cat_name }}</strong></a>
        @endforeach
        &nbsp;
        <div class="tags">
            @foreach($question->tags as $tag)
                <a href="{{ route('tag.single',['tag' => $tag->tag_uri ?? trim($tag->tag_name)]) }}" class="bg-{{ $tag->tag_color }}">{{ $tag->tag_name }}</a>
            @endforeach
        </div>
    </div>
</div>
