<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>You Must Be Signed In</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-Mv+u/DxbwG2tRrTJSaKMAv38+9tW8rCV1cM/3Yq+PbGwymQ2NtT+/TtjNpF9+VZzrQtGkdcD1npMyd+fp0by7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="/assets/fonts.css">
		<style>
		body {
		  background-color: #f5f5f5;
		  font-family: 'Roboto', sans-serif;
		}

		.container {
		  margin-top: 100px;
		  text-align: center;
		  animation: fade-in 1s ease-out;
		}

		h1 {
		  font-size: 3rem;
		  font-weight: bold;
		  margin-bottom: 30px;
		  color: #212529;
		  animation: slide-in-left 1s ease-out;
		}

		p {
		  font-size: 1.5rem;
		  margin-bottom: 30px;
		  color: #6c757d;
		  animation: slide-in-right 1s ease-out;
		}

		.btn-secondary {
		  background-color: #6c757d;
		  border-color: #6c757d;
		  color: #fff;
		}

		.btn-primary {
		  background-color: #007bff;
		  border-color: #007bff;
		  animation: pulse 1s infinite;
		}

		.btn-primary:hover {
		  background-color: #0069d9;
		  border-color: #0062cc;
		}

		.btn-success {
		  background-color: #28a745;
		  border-color: #28a745;
		  animation: pulse 1s infinite;
		}

		.btn-success:hover {
		  background-color: #218838;
		  border-color: #1e7e34;
		}

		.BJadidBold {
		  font-family: 'BJadidBold', sans-serif;
		}

		.BNasimBold {
		  font-family: 'BNasimBold', sans-serif;
		}

		@keyframes fade-in {
		  from {
			opacity: 0;
		  }

		  to {
			opacity: 1;
		  }
		}

		@keyframes slide-in-left {
		  from {
			transform: translateX(-100%);
		  }

		  to {
			transform: translateX(0);
		  }
		}

		@keyframes slide-in-right {
		  from {
			transform: translateX(100%);
		  }

		  to {
			transform: translateX(0);
		  }
		}

		@keyframes pulse {
		  0% {
			box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
		  }

		  70% {
			box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
		  }

		  100% {
			box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
		  }
		}
		</style>
	</head>
	<body>
		<div class="container">
			<h1 class="BTraffic">لطفا برای دیدن این سوال ابتدا وارد حساب کاربری خود شوید</h1>
			<p class="BTraffic">با عضویت در گویانت علاوه بر امکان پرسیدن پرسش و مشاهده پرسش دیگران به امکانات روزافزون ما دسترسی خواهید داشت</p>
			<a href="{{ route('auth.login') }}" class="btn btn-primary BJadidBold" style="color:white">&nbsp;ورود به گویانت&nbsp;</a>
			<a href="{{ route('home.index') }}" class="btn btn-secondary BJadidBold" style="color:white">&nbsp;بازگشت به صفحه اصلی&nbsp;</a>
			<a href="{{ route('auth.register') }}" class="btn btn-success BJadidBold" style="color:white">&nbsp;ثبت نام در گویانت&nbsp;</a>
			
		</div>

		<!-- Bootstrap JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-+n3h9YpJL+Wj+TTHBJrDmT6+llU6l7J6RpzCm1Hok0zId9MJd+ZtnfJgof22PQoC0rs31+onVi3PKFyoEPuvqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</body>
</html>
