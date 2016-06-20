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
    <title>Megamind kviz | Stepenice</title>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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
<body onload="zovi()">
<!-- InstanceBeginEditable name="link_editable" -->

<!-- InstanceEndEditable -->
<!-- NAVBAR
================================================== -->
<!-- wrapper -->

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
            <!-- InstanceBeginEditable name="logo_link" --><a class="navbar-brand page-scroll" href="<?php echo base_url();?>index.php/Igrac"><img src="<?php echo base_url();?>projekatPSI/img/logo.ico" class="pull-left" />Megamind</a><!-- InstanceEndEditable -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling --><!-- InstanceBeginEditable name="navbar_editable" -->
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
        <!-- InstanceEndEditable -->
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<!-- InstanceBeginEditable name="editable_containter" -->

<div class="container marketing">
    <!-- InstanceEndEditable -->
    <div id="deoZaPitanje">

    </div>


    
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Plugin JavaScript -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>projekatPSI/js/classie.js"></script>
<script src="<?php echo base_url();?>projekatPSI/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo base_url();?>projekatPSI/js/jqBootstrapValidation.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>projekatPSI/js/agency.js"></script>


<script>

    var timerValue = 14;
    var vr;
    var i=0;
    var timerRet;

    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });

   function prekiniTajmerOdg(){

       clearInterval(vr);
       clearInterval(timerRet);
       i++;
       if(i == 7) callFinishPage();
       else{
       pokupiIDohvatiPitanje();
       vr = setInterval(w_time,15000);
       countdownT();}
   }

//timer func -----
    function writeTimeLeft(){

        document.getElementById('countdown').innerHTML = timerValue;
        timerValue--;
        if (timerValue == 0) clearInterval(timerRet);
    }

    function countdownT(){
        timerValue = 14;
        timerRet = setInterval(writeTimeLeft,1000);
    }

//timer func -----

    function w_time(){
        i++;
        if(i == 7)
        {
            callFinishPage();
        }
        else {
            //timer
            countdownT();
            //timer

            pokupiIDohvatiPitanje();
        }
    }

    function zovi(){

       
        //timer
        countdownT();
        //timer
        pokupiIDohvatiPitanje();

        vr = setInterval(w_time,15000);
    }

    function pokupiIDohvatiPitanje(){
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/Igrac/sledecePitanje",
            cache: false,
            dataType: 'html',
            data: $('#formaPitanje').serialize(),
            success: function (pitanje) {
                $("#deoZaPitanje").html(pitanje);
               // countdownT();
               // vr = setTimeout(w_time,15000);
            }

        });
    }
    
    function callFinishPage(){
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/Igrac/zavrsenaIgra",
            cache: false,
            dataType: 'html',
            data: $('#formaPitanje').serialize(),
            success: function (pitanje) {
                $("#deoZaPitanje").html(pitanje);
            }

        });
    }


</script>


<!-- Placed at the end of the document so the pages load faster -->

<script>window.jQuery || document.write('<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url();?>bootstrap-3.3.6/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>






</body>
<!-- InstanceEnd --></html>
