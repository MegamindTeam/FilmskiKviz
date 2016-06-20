<?php
echo "<section id='services'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <h1>Pobednik je ".$pobednik."</h1>
                     
                </div>
            </div>
            <div class='row'>
                <!-- broj poena-->
                <div class='col-lg-6 text-center'>
                    <h2 class='section-heading'>".$_SESSION['poeni']."</h2>
                    <p class='lead' >Poeni</p>
                    <p class='lead' style='color:#0080ff;'>".$_SESSION['username']."</p>
                </div>
                <!--protivnik poeni -->
                <div class='col-lg-6 text-center'>
                    <h2 class='section-heading' value=''>".$protivnik_poeni."</h2>
                     <p class='lead'>Poeni</p>
                     <p class='lead' style='color:#0080ff;'>".$protivnik_username."</p>
                </div>
            </div>
           
           
            <div class='row'>
                <!-- rang -->
                <div class='col-lg-12 text-center'>
                    <h2 class='section-heading'>".$rank."</h2>
                    <p class='lead'>Vaš trenutni rang</p>
                </div>                
            </div>
        
        </div>
    </section>

";
?>