<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('pageTitle')</title>

<!-- Favicon -->
<link rel="icon" href="{{ asset('favicon.png') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CRaleway:400,900" rel="stylesheet">

<!--Fontawesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!--Fullpage-->
<link rel="stylesheet" href="https://unpkg.com/fullpage.js/dist/fullpage.min.css">


<link rel="stylesheet" href="https://unpkg.com/vue-nav-tabs/themes/vue-tabs.css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">