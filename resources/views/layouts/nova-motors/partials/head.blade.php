<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}"/>

@seo

@vite(['resources/css/app.css'])

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

@yield('head','')
