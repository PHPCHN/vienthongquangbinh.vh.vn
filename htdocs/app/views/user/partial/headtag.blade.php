<link rel="icon" href="{{asset('asset/img/icon.png')}}">
<title>@yield('title')</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<meta name="keywords" content="@yield('keywords')">
<link rel="canonical" href="{{asset(Request::path())}}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="all" type="text/css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" media="all" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" media="all" type="text/css">
<script src="http://cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js"></script>
<link rel="stylesheet" href="{{asset('asset/css/style.css')}}" media="all" type="text/css">
<script src="{{asset('asset/js/script.js')}}"></script>
<meta itemprop="name" property="og:title" content="@yield('title')" name="twitter:title"/>
<meta itemprop="url" property="og:url" content="{{asset(Request::path())}}"/>
<meta itemprop="description" property="og:description" name="twitter:description" content="@yield('description')"/>
<meta itemprop="image" property="og:image" content="@yield('og-image')"/>
<meta property="og:type" content="website"/>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@dhn" />
<meta name="description" content="@yield('description')" />
@yield('css')
