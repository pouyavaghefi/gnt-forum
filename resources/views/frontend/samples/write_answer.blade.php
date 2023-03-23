<div id="writeAnswer">
    <form method="POST" action="{{ route('answer.submit', $question->id) }}">
        @csrf
        <div class="container">
            <div class="create">
                <div class="create__section create__textarea">
                    <label class="create__label BMehrBold" for="description" @error('description') style="color:red" @enderror>جواب خود را بنویسید</label>
                    <div class="create__textarea-head" dir="ltr">
                        <span><a class="btn BJadidBold" target="_blank" id="guidelines" title="راهنما">راهنما</a></span>
                        <span id="bold"><i class="icon-Bold"></i></span>
                        <span id="italic"><i class="icon-Italic"></i></span>
                        <span id="link"><i class="icon-Share_Topic"></i></span>
                        <span id="code"><i class="icon-Performatted"></i></span>
                        {{--                            <div class="create__textarea-btn">--}}
                        {{--                                &nbsp;--}}
                        {{--                                <a href="#" class="btn BJadidBold">پیش نمایش</a>--}}
                        {{--                            </div>--}}
                    </div>
                    <textarea class="form-control BKoodakBold" id="description" name="description">{{ old('description') }}</textarea>
                </div>
                <div class="create__footer">
                    <button class="button create__btn-create btn btn--type-02 BJadidBold" onclick="this.classList.toggle('button--loading')"><span class="button__text">ثبت جواب</span></button>
                    <button class="create__btn-cansel btn BJadidBold" type="reset" id="reset">دوباره شروع کن</button>
                </div>
            </div>
        </div>
    </form>
</div>
