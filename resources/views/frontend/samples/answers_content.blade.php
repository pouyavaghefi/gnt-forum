    @foreach($answers as $answer)
    <div class="topic">
        <div class="topic__head">
            <div class="topic__avatar">
                <a href="#" class="avatar"><img src="{{ asset('assets/fonts/icons/avatars/'.show_avatar(strtolower(auth()->user()->usr_user_name[0]))) }}" alt="avatar"></a>
            </div>
            <div class="topic__caption">
                <div class="topic__name">
                    <a href="#">&nbsp;{{ $answer->user->usr_user_name }}</a>
                </div>
                <div class="topic__date BYekan"><i class="icon-Watch_Later"></i>&nbsp; {{ digits_persian(jdate($question->created_at)->format('%d %B، %Y')) }}</div>
            </div>
        </div>
        <div class="topic__content">
            <div class="topic__text BYekan">
                <p dir="rtl">
                    @markdown
                        {!! $answer->ans_body !!}
                    @endmarkdown
                </p>
            </div>
            <div class="topic__footer" dir="ltr">
                <div class="topic__footer-likes">
                    @if(!$answer->ansOwner($answer->ans_creator_id))
                        <div>
                            <form action="{{ route('vote',['objId'=>$answer->id,'objType'=>17,'voteType'=>14,'objUserId'=>$answer->ans_creator_id]) }}" method="POST" @if(in_array($answer->id,$userVotedAns)) @if($answer->checkAnsVote($answer->id)->vote_type == 14) class="up-form" @endif @endif>
                                @csrf

                                <button @if(in_array($answer->id,$userVotedAns)) disabled="disabled" @endif><span>{{ $answer->upvotes }}</span>&nbsp;<i class="icon-Upvote"></i></button>
                            </form>
                        </div>
                        <div>

                            <form action="{{ route('vote',['objId'=>$answer->id,'objType'=>17,'voteType'=>15,'objUserId'=>$answer->ans_creator_id]) }}" method="POST" @if(in_array($answer->id,$userVotedAns)) @if($answer->checkAnsVote($answer->id)->vote_type == 15) class="down-form" @endif @endif>
                                @csrf

                                <button @if(in_array($answer->id,$userVotedAns)) disabled="disabled" @endif><span>{{ $answer->downvotes }}</span>&nbsp;<i class="icon-Downvote"></i></button>
                            </form>
                        </div>
                    @endif

                    @if($question->queOwner($question->que_creator_id) AND $question->queBestAnswerIsNull())
                        <div>
                            <form method="POST" action="{{ route('answer.markAsBest',['queCreatorId'=>$question->que_creator_id,'ansId'=>$answer->id,'queId'=>$question->id,'ansCreatorId'=>$answer->user->id]) }}">
                                @csrf
                                <button role="submit">
                                    <span class="checkmark">
                                         <div class="checkmark_circle"></div>
                                        <div class="checkmark_stem"></div>
                                         <div class="checkmark_kick"></div>
                                    </span>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
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
@endforeach
