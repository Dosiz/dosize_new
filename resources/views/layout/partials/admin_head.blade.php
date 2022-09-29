<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q0VQ8NJD2C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q0VQ8NJD2C');
</script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_admin/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/font-awesome.min.css')}}">
        @if(Route::is(['add-blog','blog-details','blog','edit-blog']))
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/all.min.css')}}">
        @endif
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/feathericon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/morris/morris.css')}}">
         <!-- Select2 CSS -->
         <link rel="stylesheet" href="{{asset('assets_admin/plugins/select2/css/select2.min.css')}}">
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
        <!-- multiple image css -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/Jquery-ui-min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/css/image-uploader.css')}}">
         <link rel="stylesheet" href="../../../assets/dashboard/css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/mobile-style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            .article_main_wrapper, .message_main_wrapper {
                width: 100% !important;
            }
        </style>



        @stack('styles')
        @toastr_css
