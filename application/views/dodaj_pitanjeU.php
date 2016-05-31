<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/navbar_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Megamind kviz | Dodaj novo pitanje</title>
    
    
    
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
    <link href="<?php echo base_url();?>projekatPSI/css/carousel.css" rel="stylesheet">
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>
<body>
<!-- InstanceBeginEditable name="link_editable" -->

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
                <!-- InstanceBeginEditable name="logo_link" --><a class="navbar-brand page-scroll" href="<?php echo base_url();?>/index.php/Moderator/"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a><!-- InstanceEndEditable -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling --><!-- InstanceBeginEditable name="navbar_editable" -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>index.php/Moderator/open_Baza_znanja">Baza znanja</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">O kvizu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Rang lista</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>/index.php/Moderator/">Profil</a>
                    </li>
                    <li>
                        <a class="page-scroll btn btn-mini btn-primary" href="<?php echo base_url();?>/index.php/Moderator/">Log out</a>
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
                    <h2 class="section-heading">Dodaj novo pitanje</h2>
                    <h3 class="section-subheading text-muted">Pitanje sa više ponuđenih i jednim tačnim odgovorom.</h3>
                    <h4 class="section-subheading text-muted"><?php echo $e_uspeh;?></h4>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-12 text-center">
                    <form id="dodajpitanjeVJ-form" method="post" action="<?php echo base_url();?>index.php/Moderator/dodajPitanjeU">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 form-control-label">Tekst pitanja</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputQTxt" name="inputQTxt" placeholder="Ovo je tekst pitanja">
                    </div>
                  </div>

                  
                 
                  <div class="form-group row">
                    <label for="inputAnsw1" class="col-sm-2 form-control-label">Odgovor 1</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputAnsw1" name="inputAnsw1" placeholder="Odgovor na pitanje">
                    </div>
                  </div>


                        <!-- Zanr -->
                   <div class="form-group row">
                            <label for="inputAnsw4" class="col-sm-2 form-control-label">Zanr</label>
                            <div class="col-sm-10">
                                <label class="radio-inline"><input type="radio" name="zanr" value="0" checked>Komedija</label>
                                <label class="radio-inline"><input type="radio" name="zanr" value="1">Triler</label>
                                <label class="radio-inline"><input type="radio" name="zanr" value="2">Drama</label>
                                <label class="radio-inline"><input type="radio" name="zanr" value="3">Horor</label>
                                <label class="radio-inline"><input type="radio" name="zanr" value="4">SF</label>
                            </div>
                   </div>

                    
                    
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-lg btn-primary">Dodaj</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </section>

    
    
<div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-12">
          <h2 class="featurette-heading"><span class="text-muted">Pravila za dodavanje pitanja.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. </p>
          <p class="lead">&nbsp;</p>
          <p class="lead">&nbsp;</p>
        </div>
       
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

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url();?>projekatPSI/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>projekatPSI/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>projekatPSI/js/agency.js"></script>
    
     <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
   

    


</body>
<!-- InstanceEnd --></html>
