<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Megamind kviz | Glavna stranica</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>projekatPSI/css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>projekatPSI/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>projekatPSI/css/carousel.css" rel="stylesheet">

    <!-- Login form css-->
    <link href="<?php echo base_url();?>projekatPSI/css/login_form.css" rel="stylesheet" type="text/css">
    


</head>
<!-- NAVBAR
================================================== -->
<body>
<nav class="navbar navbar-default navbar-fixed-top indexpage-nav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand page-scroll" href="#page-top"></a>-->
            <a class="navbar-brand page-scroll" href="#page-top"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">O kvizu</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/Igrac/otvoriIzborIgre">Igraj</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/Igrac/otvoriRangListu">Rang lista</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo base_url();?>index.php/Igrac/otvoriProfil">Profil</a>
                </li>
                <li>
                    <a class="page-scroll btn btn-mini btn-primary" href="<?php echo base_url();?>index.php/Igrac/logOut">Log out</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo base_url();?>projekatPSI/img/grey.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
					<img src="<?php echo base_url();?>projekatPSI/img/game.png">
                    <h1>Zabavi se i osvoji bioskopske karte!</h1>
                    <p>Proverite znanje, zabavite se, a usput se spremite i sakupite poene za igru Filmski dvoboj! Svako tačno odgovoreno pitanje nosi 1p, netačno 1p, a ako preskočite stepenicu dobijate 0p.</p>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Igrac/otvoriIzborIgre" role="button">Igraj</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="<?php echo base_url();?>projekatPSI/img/blue.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
					<img src="<?php echo base_url();?>projekatPSI/img/favorite.png">
                    <h1>Oceni pitanja.</h1>
                    <p>Ocenjuj pitanja u našoj bazi znanja i povećaj svoju šansu da pobediš!</p>
                    
                    <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Igrac/otvoriIzborIgre" role="button">Igraj</a></p>

                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="<?php echo base_url();?>projekatPSI/img/green.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
					<img src="<?php echo base_url();?>projekatPSI/img/target.png">
                    <h1>Stepenice ili Filmski dvoboj?</h1>
                    <p>Da biste učestvovali u Filmskom dvoboju morate sakupiti makar 5p u igri Stepenice! Da biste učestvovali, morate uložiti deo osvojenih poena. U slučaju pobede, poeni Vam se dupliraju. U suprotnom, gubite uložene poene.</p>

                    <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Igrac/otvoriIzborIgre" role="button">Igraj</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo base_url();?>projekatPSI/img/castle.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Stepenice</h2>
            <p>Proverite znanje, zabavite se, a usput se spremite i sakupite poene za igru Filmski dvoboj! Svako tačno odgovoreno pitanje nosi 1p, netačno -1p, a ako preskočite dobijate 0p.</p>
            <p><a class="btn btn-default" href="<?php echo base_url();?>index.php/Igrac/otvori_stepenice" role="button">Otvori &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo base_url();?>projekatPSI/img/fencing.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Filmski dvoboj</h2>
            <p>Da biste učestvovali morate sakupiti makar 10p u igri Stepenice! Da biste učestvovali, morate uložiti deo osvojenih poena. U slučaju pobede, poeni Vam se dupliraju. U suprotnom, gubite uložene poene.</p>
            <p><a class="btn btn-default" href="<?php echo base_url();?>index.php/Igrac/otvoriDvoboj" role="button">Otvori &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="<?php echo base_url();?>projekatPSI/img/listr.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Rang lista</h2>
            <p>Vidi rang listu najboljih igraca. Vidi svoje šanse da osvojiš nagrade!</p><p>&nbsp;</p>
            <p><a class="btn btn-default" href="<?php echo base_url();?>index.php/Igrac/otvoriRangListu" role="button">Otvori &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <div class='row'>
        <div class='col-lg-12 text-right'>
            <div class='my-rating'></div>
        </div>
    </div>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">




<!-- /END THE FEATURETTES -->


<!-- FOOTER -->
<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; 2016 Megamind tim &middot; </p>
</footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>projekatPSI/js/classie.js"></script>
<script src="<?php echo base_url();?>projekatPSI/js/cbpAnimatedHeader.js"></script>


<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>projekatPSI/js/agency.js"></script>
<!--
	<script src="<?php echo base_url();?>projekatPSI/js/loginAndRegister.js"></script>
	-->




</body>
</html>
