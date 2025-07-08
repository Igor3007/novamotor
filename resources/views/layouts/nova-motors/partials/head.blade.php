<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    @font-face {
        font-family: GolosText;
        font-display: swap;
        src: url(/assets/fonts/GolosText-Regular.woff2) format("woff2");
        font-weight: 400;
        font-style: normal
    }

    @font-face {
        font-family: GolosText;
        font-display: swap;
        src: url(/assets/fonts/GolosText-Medium.woff2) format("woff2");
        font-weight: 500;
        font-style: normal
    }

    @font-face {
        font-family: GolosText;
        font-display: swap;
        src: url(/assets/fonts/GolosText-SemiBold.woff2) format("woff2");
        font-weight: 600;
        font-style: normal
    }
</style>

@seo

@vite(['resources/css/app.css'])

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

@yield('head','')