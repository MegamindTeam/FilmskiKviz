<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/navbar_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Megamind kviz | Registracija</title>
    
    <!-- InstanceEndEditable -->
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
 <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>projekatPSI/carousel.css" rel="stylesheet">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>
<body>
<!-- InstanceBeginEditable name="link_editable" -->

<link rel="stylesheet" href="<?php echo base_url();?>projekatPSI/css/login_form.css" type="text/css"/>

<!-- InstanceEndEditable -->
<!-- NAVBAR
================================================== -->
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
                <!-- InstanceBeginEditable name="logo_link" --><a class="navbar-brand page-scroll" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a><!-- InstanceEndEditable -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling --><!-- InstanceBeginEditable name="navbar_editable" -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Registruj se</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">O kvizu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="rang_lista.html">Rang lista</a>
                    </li>
                </ul>
            </div>
            <!-- InstanceEndEditable -->
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!-- Header -->
	<!--
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Dobrodošli!</div>
                <div class="intro-heading">Proverite svoje filmsko znanje</div>
                
            </div>
        </div>
    </header>
	-->

 <!-- InstanceBeginEditable name="editable_containter" -->

    <!-- Services Section -->
    <section id="services">
        <div class="container">
			<div class="row">
                <div class="col-lg-12 text-center">
					<h3 class="featurette-heading">Već imaš nalog?<span class="text-muted"> Prijavi se <a href="<?php echo base_url();?>#login-form">ovde</a>.</span></h3>
                </div>
            </div>
                        
			<div class="row">
				<form id="register-form" method="post" action="<?php echo base_url();?>index.php/Welcome/register">
					<div class="col-md-8 reg-panel pull-left">
						<div class="login-hd">
							REGISTRACIJA
						</div>
						<div class="login-form-main-message"></div>
						<div class="login-bg">
							<div class="row">					
								<label for="reg_username" class="login-label">Korisničko ime</label>	
								<input id="reg_username" name="reg_username" class="login-elem" type="text" placeholder=" Korisničko ime">
								
							</div>
                            <div class="row reg_err_label">
                                 <?php echo $e_username?>
                            </div>
							<div class="row">
								<label for="reg_password" class="login-label">Lozinka</label>			
								<input id="reg_password" name="reg_password" class="login-elem" type="password" placeholder=" Lozinka">
							</div>
							<div class="row">
								<label for="reg_password_confirm" class="login-label">Ponovljena lozinka</label>			
								<input id="reg_password_confirm" name="reg_password_confirm" class="login-elem" type="password" placeholder=" Ponovljena lozinka">
							</div>
                            <div class="row reg_err_label">
                                <?php echo $e_password?>
                            </div>
							<div class="row">
								<label for="reg_email" class="login-label">e-mail</label>			
								<input id="reg_email" name="reg_email" class="login-elem" type="text" placeholder=" e-mail">
							</div>
                            <div class="row reg_err_label">
                                <?php echo $e_email?>
                            </div>
							<div class="row">
								<label for="reg_firstname" class="login-label">Ime</label>			
								<input id="reg_firstname" name="reg_firstname" class="login-elem" type="text" placeholder=" Ime">
							</div>
                            <div class="row reg_err_label">
                                <?php echo $e_ime?>
                            </div>
							<div class="row">
								<label for="reg_lastname" class="login-label">Prezime</label>			
								<input id="reg_lastname" name="reg_lastname" class="login-elem" type="text" placeholder=" Prezime">
							</div>
                            <div class="row reg_err_label">
                                <?php echo $e_prezime?>
                            </div><br>
						</div>
						
						<button type="submit" class="login-button"><i class="fa fa-chevron-right fa-4x login-btn-img"></i></button>
						
					</div>									
				</form>


			</div>
			
        </div>
    </section>

    
    
<div class="container marketing">
	<hr class="featurette-divider">

      <div class="row featurette">
        
								
						
				
			
		</div>
			
		


      
      <!-- /END THE FEATURETTES -->
<!-- InstanceEndEditable -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Megamind tim &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
     <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>projekatPSI/js/classie.js"></script>
    <script src="<?php echo base_url();?>projekatPSI/js/cbpAnimatedHeader.js"></script>

   <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>projekatPSI/js/agency.js"></script>
	
   
     
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
   
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/dist/js/bootstrap.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>

	
   <!-- <script src="<?php echo base_url();?>projekatPSI/js/loginAndRegister.js"></script>-->
  


</body>
<!-- InstanceEnd --></html>
