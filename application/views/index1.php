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
                        <a class="page-scroll" href="<?php echo base_url();?>index.php/Welcome/registerOpen/">Registruj se</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">O kvizu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="rang_lista.html">Rang lista</a>
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
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Zabavi se i osvoji bioskopske karte!</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Welcome/registerOpen/" role="button">Registruj se</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Oceni pitanja.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Welcome/registerOpen/" role="button">Vidi</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Stepenice ili Filmski dvoboj?</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>index.php/Welcome/registerOpen/" role="button">Igraj</a></p>
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
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Stepenice</h2>
          <p>Link vodi na stranicu igre Stepenice, ukoliko je korisnik prijavljen. Ukoliko korisnik nije prijavljen, link vodi na stranicu za registraciju.</p>
          <p><a class="btn btn-default" href="<?php echo base_url();?>#login-form" role="button">Pročitaj više &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Filmski dvoboj</h2>
          <p>Link vodi na stranicu igre Filmski dvoboj, ukoliko je korisnik prijavljen. Ukoliko korisnik nije prijavljen, link vodi na stranicu za registraciju.</p>
          <p><a class="btn btn-default" href="<?php echo base_url();?>#login-form" role="button">Pročitaj više &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Osmisli pitanja</h2>
          <p>Link vodi na stranicu za dodavanje pitanja, ukoliko je korisnik prijavljen. Ukoliko korisnik nije prijavljen, link vodi na stranicu za registraciju i prijavljivanje.</p>
          <p><a class="btn btn-default" href="<?php echo base_url();?>#login-form" role="button">Pročitaj više &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-4 center">
          <h2 class="featurette-heading">Prijavi se!<span class="text-muted"> Ako još nemaš nalog, otvori ga <a href="<?php echo base_url();?>index.php/Welcome/registerOpen/">ovde</a>.</span></h2>
        </div>

		<form id="login-form" method="POST" action="<?php echo base_url();?>index.php/Welcome/login/">

			<div class="col-md-6 login-panel pull-left">
				<div class="login-hd">
					PRIJAVA
				</div>
				<div class="login-form-main-message"></div>
				<div class="login-bg">
					<div class="row">					
						<label for="loginUsername" class="login-label">Korisničko ime</label>	
						<input id="loginUsername" name="loginUsername" class="login-elem" type="text" placeholder=" Korisničko ime">
						
					</div>
					<div class="row">
						<label for="loginPass" class="login-label">Lozinka</label>			
						<input id="loginPass" name="loginPass" class="login-elem" type="password" placeholder=" Lozinka">
					</div>	
				</div>
				
				<button type="submit" class="login-button"><i class="fa fa-chevron-right fa-4x"></i></button>
				
			</div>

		</form>
								
						
				
			
		</div>




			
		
      </div>

      <hr class="featurette-divider">

     
      
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Megamind tim &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
