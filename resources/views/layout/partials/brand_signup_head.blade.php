<meta charset="utf-8">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q0VQ8NJD2C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q0VQ8NJD2C');
</script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{asset('assets_admin/img/favicon.png')}}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS --> 
		<link rel="stylesheet" href="{{asset('assets_admin/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/all.min.css')}}">
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/plugins/daterangepicker/daterangepicker.css')}}">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap-datetimepicker.min.css')}}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/select2/css/select2.min.css')}}">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets_admin/css/owl.theme.default.min.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/styles.css')}}">
		<link rel="stylesheet" href="{{asset('assets_admin/css/slick.css')}}">

        <link rel="stylesheet" href="{{asset('assets_admin/css/slick-theme.css')}}">
		@stack('styles')

        <style type="text/css">
        	@if(isset($brand_profile))
        	
        	.header {
        		background:{{$brand_profile->color['header_color'] ?? '#2B004F'}}  ;
        	}
        	.footer {
        		background:{{$brand_profile->color['footer_color'] ?? '#2B004F'}}  ;
        	}

        	.loadMore, .commonBtn
        	{
        		background: {{$brand_profile->color['button_color'] ?? 'linear-gradient(292deg, #EE7047 0%, #F40990 100%)'}}  ;
        	}
        	body {
        		color: {{$brand_profile->color['text_color'] ?? '#26292c'}}  ;
        	}
        	 h1, h2, h3, h4, h5, h6 , a{
        	 	color: {{$brand_profile->color['title_color'] ?? '#26292c'}}  ;
        	}
        	.header .navbar-nav>li a {
        		font-family: {{$brand_profile->font['header_font'] ?? 'PloniMedium'}}  ;
        	}

        	.footer-title , .footer .footer-widget p , .inputDiv label , .copyright-text .mb-0 {
        		font-family: {{$brand_profile->font['footer_font'] ?? 'PloniMedium'}}  ;
        	}

        	h1, h2, h3, h4, h5, h6 , a{
        		font-family: {{$brand_profile->font['title_font'] ?? 'PloniDBold'}}  ;
        	}

        	button {
        		font-family: {{$brand_profile->font['button_font'] ?? 'PloniDBold'}}  ;
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail {
        		border: 1px solid {{$brand_profile->color['header_color'] ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv h5{
        		color:{{$brand_profile->color['header_color'] ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail:hover{
			background-color:{{$brand_profile->color['header_color'] ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail:hover h5{
        		color: #fff;
        	}
        	@endif

        	.error{
	        	color:red;
	    	}
        	
        </style>