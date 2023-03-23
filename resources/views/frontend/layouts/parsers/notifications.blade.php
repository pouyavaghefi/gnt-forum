<div class="header__notification">
    <div class="header__notification-btn" data-dropdown-btn="notification">

        <i class="icon-Notification"></i>
        @if(count(auth()->user()->unreadNotifications) != 0)
            <span id="unreads">{{ digits_persian(count(auth()->user()->unreadNotifications)) }}</span>
        @endif
        <span style="display:none" id="elan"></span>
    </div>
    @if(count(auth()->user()->unreadNotifications) >= 1)
        <div class="dropdown dropdown--design-01" data-dropdown-list="notification" dir="rtl">
            <div class="BBadr">
                @foreach(auth()->user()->unreadNotifications as $unreads)
                    @php
                        $questionif = \App\Models\Question::find($unreads->data['que']);
                    @endphp

                    @if($unreads->data['type'] == 18)
                        <!-- New Answer -->

                        <a href="{{ route('question.show', ['question'=>$questionif->que_slug]) }}">
                            <i class="icon-Pencil"></i>&nbsp;
                            <strong>{{ $unreads->data['user'] }}: &nbsp;</strong>
                            <p><span>{{ character_limiter($unreads->data["body"]) }}</span></p>
                        </a>
                    @elseif($unreads->data['type'] == 19)
                        <!-- Best Answer -->

                        <a href="{{ route('question.show', ['question'=>$questionif->que_slug]) }}">
                            <i class="icon-Badge"></i>&nbsp;
                            <strong>آفرین!</strong>&nbsp;
                            <p><span>جواب شما بهترین جواب شد</span></p>
                        </a>
                    @elseif($unreads->data['type'] == 20)
                        <!-- Up Voted -->

                        <a href="{{ route('question.show', ['question'=>$questionif->que_slug]) }}">
                            <i class="icon-Badge"></i>&nbsp;
                            <strong>درود بر شما!</strong>&nbsp;
                            <p><span>جواب شما یک امتیاز مثبت گرفت</span></p>
                        </a>
                    @elseif($unreads->data['type'] == 21)
                            <!-- User Liked -->

                            <a href="{{ route('question.show', ['question'=>$questionif->que_slug]) }}">
                                <i class="icon-Favorite_Topic"></i>&nbsp;
                                <strong>اَحسنت!</strong>&nbsp;
                                <p><span>جواب شما پسندیده شد</span></p>
                            </a>
                    @elseif($unreads->data['type'] == 22)
                            <!-- Earned Badge -->

                            <a href="">
                                <i class="icon-Badge"></i>
                                <strong>باریکلا!</strong>&nbsp;
                                <p><span>یک لقب جدید نصیب شما شد</span></p>
                            </a>
                    @else
                    @endif
                @endforeach

                <span class="BHoma"><a href="{{ route('markNotificationsAsRead') }}">خوانده شد</a></span>
            </div>
        </div>
    @else
        <div class="dropdown dropdown--design-01" data-dropdown-list="notification">
            <div>
                <span class="BRoya"><a href=""><strong>اعلانی جهت خواندن موجود نیست</strong></a></span>
            </div>
        </div>
    @endif
</div>

@section('scripts')
    <script>
        notifcount = 0;
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    // change this URL to your path to the laravel function
                    url: 'new-notifications-exists',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if(notifcount == 0){
                            notifcount = response.notifcount;
                        }
                        if(response.notifcount > notifcount){
                            notifcount = response.notifcount;
                            new_notifications_found();
                        }
                    }
                });
            }, 2000);
        });
        function new_question_found(){
            $("#unreads").hide();
            $("#elan").show();
            $("#elan").html("+.");
        }
    </script>
@endsection
