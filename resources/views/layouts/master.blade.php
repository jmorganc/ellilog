<!DOCTYPE html>
<html>
    <head>
        <title>Ellilog - @yield('title')</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
        <link rel="stylesheet" href="{{URL::asset('ellilog.css')}}">
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#">About</a></li>
                        <li role="presentation"><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">Ellilog</h3>
            </div>

            <!-- <div class="jumbotron">
                <h1>Jumbotron heading</h1>
                <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
            </div> -->

            @yield('content')
            <footer class="footer">
                <!-- <p>&copy; Company 2014</p> -->
                <p>Email any problems to: <a href="mailto:jmorgancampbell@gmail.com?suject=Ellilog Feedback">jmorgancampbell@gmail.com</a></p>
            </footer>

        </div> <!-- /container -->
    <script src="{{URL::asset('ellilog.js')}}"></script>
    </body>
</html>
