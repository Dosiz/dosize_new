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

.float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        left: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
        }
        .my-float {
        font-weight: 300 !important;
        font-family: "fontawesome" !important;
        margin-top: 16px;
    }

    #float_text {
        direction: rtl;
        color: #000;
        position: relative;
        left: 140px;
        top: -46px;
        padding: 10px;
        background: #fff;
        font-size: 15px;
        text-decoration: none !important;
        width: 130px;
        border: 1px solid #000;
        border-radius: 10px;
        text-align: center;
    }
        	@if(isset($brand_profile))

        	.header {
        		background:{{json_decode($brand_profile->color)->header_color ?? '#2B004F'}}  ;
        	}
        	.footer {
        		background:{{json_decode($brand_profile->color)->footer_color ?? '#2B004F'}}  ;
        	}

        	.loadMore, .commonBtn
        	{
        		background: {{json_decode($brand_profile->color)->button_color ?? 'linear-gradient(292deg, #EE7047 0%, #F40990 100%)'}}  ;
        	}
        	body, body p, body span, body input, body textarea {
        		color: {{json_decode($brand_profile->color)->text_color ?? '#26292c'}}  ;
        		font-family: {{json_decode($brand_profile->font)->text_font ?? 'PloniMedium'}} !important ;
        	}
        	 h1, h2, h3, h4, h5, h6 {
        	 	color: {{json_decode($brand_profile->color)->title_color ?? '#26292c'}}  ;
                font-family: {{json_decode($brand_profile->font)->title_font ?? 'PloniDBold'}} !important ;
        	}
        	.header .navbar-nav>li a {
        		font-family: {{json_decode($brand_profile->font)->header_font ?? 'PloniMedium'}}  ;
        	}

        	.footer, .footer-title , .footer .footer-widget p , .inputDiv label , .copyright-text .mb-0 {
        		font-family: {{json_decode($brand_profile->font)->footer_font ?? 'PloniMedium'}}  ;
        	}
        	button {
        		font-family: {{json_decode($brand_profile->font)->button_font ?? 'PloniDBold'}} !important ;
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail {
        		border: 1px solid {{json_decode($brand_profile->color)->header_color ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv h5{
        		color:{{json_decode($brand_profile->color)->header_color ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail:hover{
			background-color:{{json_decode($brand_profile->color)->header_color ?? '#2B004F'}}
        	}
        	#contactSection .commonContactDiv .infoDiv .infoDetail:hover h5{
        		color: #fff;
        	}
        	@endif

        	.error{
	        	color:red;
	    	}

        </style>
