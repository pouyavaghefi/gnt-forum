<form method="POST" action="{{ route('question.new.submit') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="create">
            <div id="dynamic_field">
                <div class="create__head">
                    <div class="create__title BBardiya"><img src="{{ asset('assets/fonts/icons/main/New_Topic.svg') }}" alt="ثبت پرسش جدید"> &nbsp; ثبت پرسش جدید </div>
                </div>

                @if(Session::has('slugExists'))
                    <div class="alert alert-danger BNarm" role="alert">
                        پرسشی با این نام وجود دارد:
                        &nbsp;
                        <a style='color:blue' href="{{ route('question.show',['question'=>\Illuminate\Support\Facades\Session::get('slugExists')]) }}" target="_blank">مشاهده</a>
                    </div>
                    <hr>
                @endif

                <div class="create__section">
                    <label class="create__label BMehrBold" for="title" @error('title') style="color:red" @enderror>عنوان پرسش</label>
                    <input type="text" class="form-control BKoodakBold is-invalid" name="title" id="title" placeholder="عنوان پرسش خود را اینجا وارد کنید" value="{{ old('title') }}">
                </div>

                @error('title')
                    <div class="alert alert-danger BNarm" role="alert">{{ $message }}</div>
                    <hr>
                @enderror

                <div class="row">
                    <div class="col-md-12">
                        <div class="create__section">
                            <label class="create__label BMehrBold" for="category" @error('category') style="color:red" @enderror>دسته بندی پرسش</label>
                            <label class="custom-select BKoodakBold">
                                <select id="category" class="selectpicker" name="category[]">
                                    @if($categories)
                                        <option value="0" disabled="disabled">--- دسته بندی پرسش خود را انتخاب کنید ---</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $cat->cat_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                @include('frontend.layouts.includes.markdown-editor')

                @error('description')
                    <div class="alert alert-danger BNarm" role="alert">{{ $message }}</div>
                    <hr>
                @enderror

                <div class="row">
                    <div class="col-md-12">
                        <div class="create__section">
                            <label class="create__label BMehrBold" for="tags" @error('tags') style="color:red" @enderror>برچسب های پرسش</label>
                            <label class="custom-select BKoodakBold">
                                <select id="tags" class="selectpicker" name="tags[]" multiple>
                                    @if($tags)
                                        <option value="0" disabled="disabled">--- برچسب های پرسش خود را انتخاب کنید ---</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $tag->tag_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                @error('tags')
                    <div class="alert alert-danger BNarm" role="alert">{{ $message }}</div>
                    <hr>
                @enderror

                <div class="create__advanced">
                    <div class="row">
                        <div class="col-lg-4 col-xl-4">
                            <div class="create__section">
                                <label class="create__label BMehrBold" @error('type') style="color:red !important" @enderror @if(Session::has('typeNotExist')) style="color:red !important" @endif>نوع پرسش</label>
                                <div class="create__radio">
                                    <label class="create__box BKoodakBold">
                                        <label class="custom-radio">
                                            <input type="radio" value="public" checked="checked" name="type">
                                            <i></i>
                                        </label>
                                        <span>&nbsp;عمومی</span>
                                    </label>
                                    <label class="create__box BKoodakBold">
                                        <label class="custom-radio">
                                            <input type="radio" value="private" name="type">
                                            <i></i>
                                        </label>
                                        <span>&nbsp;خصوصی</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col">
                            <label for="file" class="control-label BMehrBold">عکس</label>
                            <br>
                            <div class="input-group">
                                <span class="input-group-btn">
                                     <label class="btn btn-primary btn-file" for="multiple_input_group">
                                         <div class="input required">
                                             <input id="multiple_input_group" type="file" name="filep[]">
                                         </div> Browse
                                     </label>
                                </span>
                                <span class="file-input-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a id="add" class="BEsfehanBold button create__btn-create btn btn-info" style="color:black"><i class="icon-Upload_Files"></i>&nbsp;&nbsp;اضافه کردن عکس جدید</a>
                    </div>
                </div>
            </div>

            @if(Session::has('typeNotExist'))
                <div class="alert alert-danger BNarm" role="alert">
                    <p>
                        نوع پرسش نمی تواند بدون مقدار باشد
                    </p>
                </div>
                <hr>
            @endif

            <div class="create__footer">
                <button class="button create__btn-create btn btn--type-02 BJadidBold" onclick="this.classList.toggle('button--loading')"><span class="button__text">ثبت پرسش و ادامه</span></button>
                <button class="create__btn-cansel btn BJadidBold" type="reset" id="reset">دوباره شروع کن</button>
            </div>
        </div>
    </div>
</form>
