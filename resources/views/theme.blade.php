<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="MobileOptimized" content="320"/> 
    <meta name="description" content="Bringing news to the other 4 billion people underserved with slow internet.">
    <meta name="keywords" content="News,Mobile,Internet.org,Country,World,Slow Internet,Facebook">
    <title>Newsbyte.org</title>

    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon/fav-ico-32x32.png')}}" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!--.Bootstrap-->
    <!--.Main-->


    <style type="text/css">

    .match-date {
    }

    .scoreboard {
        color: #bdc3c7;
        margin-left: 0px;
        margin-right: 0px;
        overflow:hidden;
        white-space:nowrap;
        text-overflow:ellipsis;
    }
        
    .team {
        vertical-align: super;
        font-size: 1.8rem;
        display: inline-block;
    }
        
    .score {
        font-size: 3rem;
        width: 70px;
        display: inline-block;
        margin-left: 10px;
    }

    .home-team {
        background-color: #e67e22;
    }

    .away-team {
        background-color: #3498db;
    }

    .winner {
        color: #ecf0f1;
        font-weight: bold;
    }


    </style>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-68566766-1', 'auto');
        ga('send', 'pageview');
    </script>

    @yield('headtag_additionalCodes')
</head>
<body>
    @include('universal.nav')
    @yield('content')
        
    <footer>
        <div class="container">
            &copy; Newsbyte.org <br/>
            <a href="/about">About Us</a> | <a href="/contact">Contact us</a><br/>
            Proudly developed by <a href="http://www.devhub.ph/" target="_blank"><span class="devhub">{<span class="dev">dev</span>hub}</span></a><br/>
            <a href="http://rss.newsbyte.org/"><img src="{{asset('images/rssfeed-logo.png')}}" width="50px" alt="rss"></a>
        </div>
    </footer>
</body>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}" media="all">
</html>
