<!DOCTYPE html>
<html lang="{{ locale() }}" {{ is_rtl() ? 'dir=rtl' : '' }}>
<head>
    <base href="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title> @yield('title') - {{setting('site_name','eBook Admin')}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    @foreach ($assets->allCss() as $css)
            <link media="all" type="text/css" rel="stylesheet" href="{{ v($css) }}">
    @endforeach

	@include('admin::include.general')
</head>
<body data-background-color="{{ setting('theme_background_color','bg1')  }}" >

            
	<div class="wrapper">
        <!-- Main Header -->
            @include('admin::include.header',['fullwidth'=>false])
		<!-- End Main Header -->
		
        <!-- Sidebar -->
             @include('admin::include.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    <div class="page-header">
                        @yield('page-header')
                    </div>
                    <div class="row">
                        @include('admin::include.notification')
                    </div>
                    
                     @yield('content')
                    
                </div>
			</div>
             
			<footer class="footer">
				<div class="container-fluid">
                    @include('admin::include.footer')	
				</div>
			</footer>
		</div>
		
	</div>
	
    @foreach($assets->allJs() as $js)
        <script src="{{ v($js) }}"></script>
    @endforeach

    @if(is_rtl())
        <script>
        $(window).on("load",function(){
            $('*').filter(function () { return ($(this).css('left') == '-1000px' && $(this).css('top') == '-1000px') }).css('right', '-1000px').css('left', '');
        });
        </script>
    @endif
    
    @stack('scripts')
    
</body>
</html>

