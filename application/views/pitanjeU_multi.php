<?php
echo "<section>
        <div class='container'>
            
            <div class='row'>
                <!-- broj poena-->
                <div class='col-lg-3 text-center'>
                    <h2 class='section-heading'>".$_SESSION['poeni']."</h2>
                     <p class='lead'>".$_SESSION['username']."</p>
                </div>
                <!-- preostalo vreme -->
                <div class='col-lg-3 text-center'>
                    <h2 class='section-heading'id='countdown' value=''></h2>
                    <p class='lead'>Vreme</p>
                </div><!--protivnik poeni -->
                <div class='col-lg-3 text-center'>
                    <h2 class='section-heading'id='countdown' value=''>".$protivnik_poeni."</h2>
                     <p class='lead'>".$protivnik_username."</p>
                </div>
            </div><!--tekst ispod br-->
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <!-- tekst pitanja -->
                <p class='lead'><b>".$_SESSION['rdP']." ".$pitanje."</b></p>   
                </div>
            </div>
        </div>
    </section>
                                          
<!-- container -->
    <div class='container marketing'>
        <!-- answer form -->
        <form method='post' action='' id='formaPitanje'>
        <div class='form-group login-group-checkbox'>
                                 
";
echo "<!-- first row-->
       <div class='row text-center'>
            <!-- column 1-->
                 <div class='col-lg-2 text-center'>
                        <label>Odgovor</label>
                 </div>
                 <div class='col-lg-10 text-right'>
                      <input type='text' class='form-control' name='unesenOdgovor' value='' placeholder='Unesite odgovor' >
                 </div>
                 
";
?>