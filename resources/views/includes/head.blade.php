<head>
    <title>CitySeek - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/w3.css">
    @if (isset($_COOKIE['cityseek_color']))
        <?php $value = Request::cookie('cityseek_color'); ?>
        @if ($value == "black")
            <link rel="stylesheet" href="/assets/css/w3-theme-black.css">
        @elseif ($value == "blue-grey")
            <link rel="stylesheet" href="/assets/css/w3-theme-blue-grey.css">
        @elseif ($value == "green")
            <link rel="stylesheet" href="/assets/css/w3-theme-green.css">
        @elseif ($value == "cyan")
            <link rel="stylesheet" href="/assets/css/w3-theme-cyan.css">
        @elseif ($value == "blue")
            <link rel="stylesheet" href="/assets/css/w3-theme-blue.css">
        @elseif ($value == "pink")
            <link rel="stylesheet" href="/assets/css/w3-theme-pink.css">
        @elseif ($value == "indigo")
            <link rel="stylesheet" href="/assets/css/w3-theme-indigo.css">
        @elseif ($value == "red")
            <link rel="stylesheet" href="/assets/css/w3-theme-red.css">
        @elseif ($value == "deep-purple")
            <link rel="stylesheet" href="/assets/css/w3-theme-deep-purple.css">
        @endif
    @else
        <link rel="stylesheet" href="/assets/css/w3-theme-deep-purple.css">
    @endif
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px;
            height: 0;
            overflow: hidden;
        }
        .video-container iframe,
        .video-container object,
        .video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/lt_LT/sdk.js#xfbml=1&version=v2.8&appId=568778303281287";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>