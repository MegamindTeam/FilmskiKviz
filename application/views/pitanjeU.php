<?php
echo "<section id='services'>
        <div class='container'>
             <div class='row'>
                 <div class='col-lg-8 text-right'>
                    <h4>Oceni pitanje:</h4> 
                </div>
                <div class='col-lg-4 text-left'>
                <h4>
                   <select name='rateQ' form='formaPitanje'>
                        <option value=''></option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                    </h4>
                </div>
            </div>
            <hr class='featurette-divider'>
            <div class='row'>
                <!-- broj poena-->
                <div class='col-lg-6 text-center' >
                    <h2 class='section-heading'>".$_SESSION['poeni']."</h2>
                </div>
                <!-- preostalo vreme -->
                <div class='col-lg-6 text-center'>
                    <h2 class='section-heading' id='countdown' value=''></h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-6 text-center'>
                    <p class='lead'>Poeni</p>
                </div>
                <div class='col-lg-6 text-center'>
                    <p class='lead'>Vreme</p>
                </div>
            </div>
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
                          <input type='text' class='form-control' name='unesenOdgovor' value='' placeholder='Unesite odgovor'>
                     </div>
           </div>
       <div class='row text-center'>          
             <div class='col-lg-12 text-center'>
             <p>&nbsp;</p>
                <input type='button' onclick='prekiniTajmerOdg()' class='btn btn-lg btn-primary' value='Odgovori'  onsubmit='return false' id='btnStop' >
             </div>
           </div>
       </div>
       </form>
                 
";
?>