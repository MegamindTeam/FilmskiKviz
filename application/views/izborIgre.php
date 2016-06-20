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

    <title>Megamind kviz | Izbor igre</title>

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
<nav class="navbar navbar-default navbar-fixed-top allpage-nav">
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
            <a class="navbar-brand page-scroll" href="<?php echo base_url();?>index.php/Igrac/"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#">O kvizu</a>
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


<!-- featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<section id="services">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Izaberi igru</h2>
            <h3 class="section-subheading text-muted">Igraj svoju omiljenu igru!</h3>
        </div>
    </div>
    <div class="container">
    <div class="row"><!-- /.col-lg-4 -->
        <div class="col-lg-6">
            <img class="img-circle col-lg-offset-3 col-md-offset-2" src="<?php echo base_url();?>projekatPSI/img/castle.png" alt="Generic placeholder image" width="140" height="140">
            <h2 class="col-lg-offset-3 col-md-offset-2">Stepenice</h2>
            <p>Proverite znanje, zabavite se, a usput se spremite i sakupite poene za igru Filmski dvoboj! Svako tačno odgovoreno pitanje nosi 1p, netačno -1p, a ako preskočite stepenicu dobijate 0p.</p>
            <p><a href="<?php echo base_url();?>index.php/Igrac/otvori_stepenice" class="page-scroll btn btn-xl col-lg-offset-3 col-md-offset-2">Igraj</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-6">
            <img class="img-circle col-lg-offset-3 col-md-offset-2" src="<?php echo base_url();?>projekatPSI/img/fencing.png" alt="Generic placeholder image" width="140" height="140">
            <h2 class="col-lg-offset-2 col-md-offset-1">Filmski dvoboj</h2>
            <p>Da biste učestvovali morate sakupiti makar 5p u igri Stepenice! Da biste učestvovali, morate uložiti deo osvojenih poena. U slučaju pobede, poeni Vam se dupliraju. U suprotnom, gubite uložene poene.</p>
            <p><a href="<?php echo base_url();?>index.php/Igrac/otvoriDvoboj" class="page-scroll btn btn-xl col-lg-offset-3 col-md-offset-2">Igraj</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider" />
</div>
</section>





    <!-- /END THE FEATURETTES -->
    <!-- InstanceEndEditable -->

    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Megamind tim &middot; </p>
    </footer>



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
