<?php
echo "<section id='services'>
        <div class='container'>
            <div class='row'>
                <!-- ime korisnika -->
                <div class='col-lg-12 text-center' >
                    <h2 class='section-heading' style='color:#0080ff;'>".$_SESSION['username']."</h2>
                </div>
            </div>
            <div class='row'><!-- osvojeno u ovoj igri-->
                <div class='col-lg-12 text-center'>  
                    <p class='lead'><b>Osvojili ste ".$poeni."</b></p> 
                </div>
            </div>
            <div class='row'><!-- ukupan broj poena -->
                <div class='col-lg-12 text-center'>   
                    <p class='lead'><b>Ukupan broj poena ".$ukupnoPoena."</b></p>    
                </div> 
            </div>
            <div class='row'><!--novi rang-->
                <div class='col-lg-12 text-center'>
                    <h3 class='section-heading'>Rang: ".$rank."</h3>
                </div>
            </div>
        </div>
    </section>
                                          
<!-- container -->
    <div class=\"container marketing\">
        <!-- answer form -->
        <form method='post' action='".base_url()."index.php/Igrac' id='formaKraj'>
            <div class='form-group login-group-checkbox'>
                <div class='form-group row'>
                    <div class='col-sm-12 text-center'>
                        <button type='submit' class='btn btn-lg btn-primary'>Kraj</button>
                    </div>
                </div>                             
                                              
 
            </div>
        </form>
    </div>
";

?>


