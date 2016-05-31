<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/navbar_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Megamind kviz | Baza pitanja</title>
    
    
    
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
    <link href="carousel.css" rel="stylesheet">
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
                <!-- InstanceBeginEditable name="logo_link" --><a class="navbar-brand page-scroll" href="#page-top"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a><!-- InstanceEndEditable -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling --><!-- InstanceBeginEditable name="navbar_editable" -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Baza pitanja</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">O kvizu</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="r#">Rang lista</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Profil</a>
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
        
			<!-- row0-->
           
        	<div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Celokupna baza znanja</h2>
                    <h3 class="section-subheading text-muted">PRISTISKOM NA DUGME OTVARA SE STRANICA SA SVIM PITANJIMA KOJA POSTOJE U BAZI.</h3>
                  	<p><a class="btn btn-xl"  role="button" href="<?php echo base_url();?>index.php/Moderator/open_Baza_znanja">Otvori &raquo;</a></p>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
            
           <hr class="featurette-divider" />
    
			
        	<!-- row1-->
             <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Vaša pitanja</h2>
                    <h3 class="section-subheading text-muted">PRISTISKOM NA JEDNO OD PITANJA OTVARAJU SE DETALJI I PRUŽA SE MOGUĆNOST IZMENE.</h3>
                    
                    
                    <!-- Q list-->


                    <div class="list-group">

                        <?php
                            if($VV['recordsVV']!=0) {
                                foreach ($VV['recordsVV'] as $p) {
                                    echo "<a type=\"button\" class=\"list-group-item text-left\" href=\"http://localhost/ci/index.php/\" >" . $p->pitanje . "</a>";
                                }
                            }
                        ?>
                        <?php if($VJ['recordsVJ']!=0) {
                            foreach ($VJ['recordsVJ'] as $p) {
                                echo "<a type=\"button\" class=\"list-group-item text-left\"  href=\"http://localhost/ci/index.php/\">" . $p->pitanje . "</a>";
                            }
                        }?>
                        <?php if($S['recordsS']!=0) {
                            foreach ($S['recordsS'] as $p) {
                                echo "<a type=\"button\" class=\"list-group-item text-left\" href=\"http://localhost/ci/index.php/\">" . $p->pitanje . "</a>";
                            }
                        }?>
                        <?php if($U['recordsU']!=0) {
                            foreach ($U['recordsU'] as $p) {
                                echo "<a type=\"button\" class=\"list-group-item text-left\" href=\"http://localhost/ci/index.php/\">" . $p->pitanje . "</a>";
                            }
                        }?>
                    </div>
                    
                    <!--//Q list -->
                </div>
            </div>
    
            <!-- //row1-->
            
            <hr class="featurette-divider" />
            
        	<!-- row 2-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dodaj novo pitanje</h2>
                    <h3 class="section-subheading text-muted">IZBOROM TIPA PITANJA KORISNIK SE PREUSMERAVA NA STRANICU SA ODGOVARAJUĆOM FORMOM ZA UNOS.</h3>
                </div>
            </div>
            <!-- //row2-->
            
            <!-- row3-->
            <div class="row text-center">
                <div class="col-lg-12 text-center">
                	<div class="list-group">
                        <a class="list-group-item" href="<?php echo base_url();?>index.php/Moderator/open_dodajPitanjeS">Pitanje sa slikom</a>
                        <a class="list-group-item" href="<?php echo base_url();?>index.php/Moderator/open_dodajPitanjeVJ">Pitanje sa više ponuđenih i jednim tačnim odgovorom</a>
                        <a class="list-group-item" href="<?php echo base_url();?>index.php/Moderator/open_dodajPitanjeVV">Pitanje sa više ponuđenih i više tačnih odgovora</a>
                        <a class="list-group-item" href="<?php echo base_url();?>index.php/Moderator/open_dodajPitanjeU">Pitanje bez ponuđenog odgvora</a>
                      
                    </div>
                 </div>
            </div>
            <!-- //row3-->
            
            
        </div>
    </section>

    
    
<div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-12">
          <h2 class="featurette-heading"><span class="text-muted">Trenutna statistika.</span></h2>
                                                                                                            <!-- echo "<td><button type=\"submit\" class=\"btn btn-sm btn-primary\" action=\"base_url();index.php/Admin/izmeni/\" method=\"POST\">Izmeni</button></td>";-->
        <p class="lead"> Prosečna ocena Vaših pitanja:<?php for($i=1;$i<=$Zavg;$i++){ echo "<img src=\"http://localhost/ci/projekatPSI/img/star_icon.png\" width=\"32\" height=\"32\" alt=\"\" />" ;}?></p>

        <p>&nbsp;</p>
          
            
      	<p class="lead">Ocene Vaših pitanja</p>
		<p>Broj pitanja ocenjenih sa 1, 2, 3, 4, ili 5 zvezdica.</p>

          		<table class="table table-sm lead">
                  <thead>
                    <tr>
                      <th><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="1" /></th>
                      <th><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="2" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /></th>
                      <th><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="3" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /></th>
                      <th><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="4" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /></th>
                      <th><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="5" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /><img src="<?php echo base_url();?>projekatPSI/img/star_icon.png" width="32" height="32" alt="" /></th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <th scope="row"><?php echo $Z1;?></th>
                      <th><?php echo $Z2;?></th>
                      <th><?php echo $Z3;?></th>
                      <th><?php echo $Z4;?></th>
                      <th><?php echo $Z5;?></th>
                    </tr>
                    
                  </tbody>
                </table>
        <p>&nbsp;</p>   
        <p class="lead">Broj Vaših pitanja po kategorijama</p>
        
        <table class="table lead">
          <thead>
            <tr>
              <th><b>Kategorija</b></th>
              <th>Komedija</th>
              <th>Triler</th>
              <th>Drama</th>
              <th>Horor</th>
              <th>SF</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><b>Broj</b></th>
              <td><?php echo $Kom?></td>
              <td><?php echo $Tri?></td>
              <td><?php echo $Dra?></td>
              <td><?php echo $Hor?></td>
              <td><?php echo $SF?></td>
            </tr>
          </tbody>
        </table>
                
        <p>&nbsp;</p>   
       <!-- <p class="lead">Najpopularnije teme pitanja</p> -->
		        
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
    <script src="<?php echo base_url();?>/projekatPSI/js/agency.js"></script>
    
     <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>/bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
   

    


</body>
<!-- InstanceEnd --></html>
