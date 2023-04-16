<!doctype html>
<html lang="en-US">
<head>
    @include('frontend.layouts.partials.head')
	<style>

	</style>
    @yield('styles')
</head>
<body>
    <!-- HEADER -->
    @include('frontend.layouts.header')

    <!-- MAIN -->
	<div class="customBg">
    @yield('main')
	</div>

    <!-- FOOTER -->
    @include('frontend.layouts.footer')

    <div id="loading">
        <img id="loading-image" src="{{ asset('assets/img/6os.gif') }}" alt="Loading..." />
    </div>
    <!-- JAVA SCRIPT -->
    @include('frontend.layouts.partials.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/htmx.org@1.7.0"></script>
    <script>
       // document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
    @include('sweetalert::alert')
    <script>
        notifcount = 0;
        $(document).ready(function() {
            if(window.location.href === 'https://gooyanet.com/'){
				setInterval(function() {
					$.ajax({
						// change this URL to your path to the laravel function
						url: 'new-notifications-exists',
						method: 'GET',
						dataType: 'json',
						success: function(response) {
							// if notifz count is 0, then set its initial value to notifz count
							if(notifcount == 0){
								notifcount = response.notifcount;
							}
							if(response.notifcount > notifcount){
								notifcount = response.notifcount;
								new_notif_found();
							}
						}
					});
				}, 1000);
			}
        });
        function new_notif_found(){
            $('#unreads').hide();
            $("#elan").show();
            $("#elan").html("+");
        }
    </script>
    @yield('scripts')
</body>
</html>
