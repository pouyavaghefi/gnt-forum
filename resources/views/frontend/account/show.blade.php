@extends('frontend.layouts.master')

@section('title',env('APP_DOMAIN')." | ".config('titles.homepage'))

@section('styles')
    <style>

    </style>
@endsection

@section('main')
    <main>
        <br>
        <div class="container" dir="rtl">
			<form action="{{ route('changeAccInfo') }}" method="POST">
				@csrf
				<div class="create">
					<div class="create__head">
						<div class="create__title BBardiya">تنظیمات حساب کاربری</div>
					</div>
					@if(Session::has('success'))
						<div class="alert alert-success BNarm" role="alert">
							{{ Session::get('success') }}
						</div>
					@endif
					<div class="create__section BMehrBold">
						<label class="create__label" for="current_password" @error('current_password') style="color:red" @enderror>رمز عبور فعلی </label>
						<input type="password" class="form-control" name="current_password" id="current_password" placeholder="">
					</div>
					@error('current_password')
						<div class="create__section BNarm">
							<div class="alert alert-danger" role="alert">
								{{ $message }}
							</div>
						</div>
					@enderror
					<div class="create__section BMehrBold">
						<label class="create__label" for="password" @error('password') style="color:red" @enderror>رمز عبور جدید</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="">
					</div>
					<div class="create__section BMehrBold">
						<label class="create__label" for="password_confirmation" @error('password_confirmation') style="color:red" @enderror>تایید رمز عبور جدید</label>
						<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
					</div>
					@error('password_confirmation')
						<div class="create__section BNarm">
							<div class="alert alert-danger" role="alert">
								{{ $message }}
							</div>
						</div>
					@enderror
					<div class="create__footer">
						<button type="submit" class="create__btn-create btn btn--type-02 BJadidBold">ثبت</button>
						<a href="#" class="create__btn-cansel btn BJadidBold">بازگشت</a>
					</div>
				</div>
			</form>
        </div>
    </main>

    <div class="ajax-load text-center" style="display:none">
        <br>
        <p><img width="100" height="100" src="{{ asset('assets/img/loader.gif') }}"></p>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
