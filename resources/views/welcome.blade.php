<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="{{url('public')}}/inc/images/favicon.png">
      <title>Welcome to FlatShop</title>
      <link href="{{asset('inc/css/bootstrap.css')}}" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="{{asset('inc/css/font-awesome.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('inc/css/flexslider.css')}}" type="text/css" media="screen"/>
      <link href="{{asset('inc/css/sequence-looptheme.css')}}" rel="stylesheet" media="all"/>
      <link href="{{asset('inc/css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <body id="home">
      <div class="wrapper">
         @include('layout.header')
         <div class="clearfix"></div>
         
         
         @yield('content')
         <div class="clearfix"></div>
         @include('layout.footer')
      </div>
      <!-- {{asset('')}} -->
      <!-- Bootstrap core JavaScript==================================================-->
	  <script type="text/javascript" src="{{asset('inc/js/jquery-1.10.2.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('inc/js/jquery.easing.1.3.js')}}"></script>
	  <script type="text/javascript" src="{{asset('inc/js/bootstrap.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('inc/js/jquery.sequence-min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('inc/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
	  <script defer src="{{asset('inc/js/jquery.flexslider.js')}}"></script>
	  <script type="text/javascript" src="{{asset('inc/js/script.min.js')}}" ></script>
   </body>
</html>