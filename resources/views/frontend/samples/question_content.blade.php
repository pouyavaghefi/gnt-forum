<div class="topic">
    <div class="topic__head">
        <div class="topic__avatar">
            <a href="#" class="avatar"><img src="{{ asset('assets/fonts/icons/avatars/'.show_avatar(strtolower($question->user->usr_user_name[0]))) }}" alt="avatar"></a>
        </div>
        <div class="topic__caption">
            <div class="topic__name">
                <a href="#">&nbsp;{{ $question->user->usr_user_name }}</a>
            </div>
            <div class="topic__date BYekan"><i class="icon-Watch_Later"></i>&nbsp;{{ digits_persian(jdate($question->created_at)->format('%d %B، %Y')) }}</div>
        </div>
    </div>
    <div class="topic__content">
        <div class="topic__text BYekan">
            <p dir="rtl">
                @markdown
                    {!! $question->que_body !!}
                @endmarkdown
            </p>
            @if(!$question->queBestAnswerIsNull())
                <div class="topic topic--answer">
                    <div class="topic__head">
                        <div class="topic__caption">
                            <div class="topic__user">
                                <a href="#" class="avatar"><img src="{{ asset('assets/fonts/icons/avatars/'.show_avatar(strtolower(auth()->user()->usr_user_name[0]))) }}" alt="avatar"></a>
                                <a href="#" class="topic__user-name">{{ $question->bestAnswer->user->usr_user_name }}</a>
                            </div>
                        </div>
                        <a class="best__answer" title="بهترین جواب">
                            <span class="checkmark">
                                <div class="checkmark_circle"></div>
                                <div class="checkmark_stem"></div>
                                <div class="checkmark_kick"></div>
                            </span>
                        </a>
                    </div>
                    <div class="topic__content">
                        <div class="topic__text">
                            <p>
                                @markdown
                                     {!! $question->bestAnswer->ans_body !!}
                                @endmarkdown
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            <div>
                <img class="w-100 h-auto" src="{{ \App\Http\HelperClasses\ImageHelper::get_image_url($question) }}" alt="">
            </div>
        </div>
        <div class="topic__footer" dir="ltr">
            @if(!$question->queOwner($question->que_creator_id))
                <div class="topic__footer-likes">
                    <div>

                        <form action="{{ route('vote',['objId'=>$question->id,'objType'=>16,'voteType'=>14,'objUserId'=>$question->que_creator_id]) }}" method="POST" @if($userVotedQue) @if($userVotedQue->vote_type == 14) class="up-form" @endif @endif>
                            @csrf

                            <button @if($userVotedQue) disabled="disabled" @endif><span>{{ $question->upvotes }}</span>&nbsp;<i class="icon-Upvote"></i></button>
                        </form>
                    </div>
                    <div>

                        <form action="{{ route('vote',['objId'=>$question->id,'objType'=>16,'voteType'=>15,'objUserId'=>$question->que_creator_id]) }}" method="POST" @if($userVotedQue) @if($userVotedQue->vote_type == 15) class="down-form" @endif @endif>
                            @csrf

                            <button @if($userVotedQue) disabled="disabled" @endif><span>{{ $question->downvotes }}</span>&nbsp;<i class="icon-Downvote"></i></button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="topic__footer-share">
                <div data-visible="desktop">
                    <a href="#" title="به اشتراک گذاری"><i class="icon-Share_Topic"></i></a>
                    <a href="#" title="نشان گذاری"><i class="icon-Bookmark"></i></a>
                    <a href="#" title="پرچم گذاری"><i class="icon-Flag_Topic"></i></a>
                    <a href="#writeAnswer"  id="reply" title="پاسخ دادن"><i class="icon-Reply_Fill"></i></a>
                </div>
                <div data-visible="mobile">
                    <a href="#" title="پاسخ دادن"><i class="icon-Reply_Fill"></i></a>
                    <a href="#"><i class="icon-More_Options"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
