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
                <div class='col-lg-6 text-center'>
                    <h2 class='section-heading'>".$_SESSION['poeni']."</h2>
                </div>
                <!-- preostalo vreme -->
                <div class='col-lg-6 text-center'>
                    <h2 class='section-heading'id='countdown' value=''></h2>
                </div>
            </div><!--tekst ispod br-->
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

    if (strlen($odgovor1)!=0)
        { echo "<!-- first row-->
                <div class='row text-center'>
                    <!-- column 1-->
                    <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_1' id='ch_1' value='1'>
                    </div>
                   <div class='col-lg-4 text-center'>
                        <label>".$odgovor1."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor2)!=0)
        { echo "<!-- column 2-->
                    <div class='col-lg-2 text-right'>
                            <input type='checkbox' class='' name='ch_2' id='ch_2' value='2'>
                    </div>
                    <div class='col-lg-4 text-center'>
                            <label>".$odgovor2."</label>
                    </div>
                         <!-- /column 2-->
                    ";}

    echo "</div><!-- //first row-->";

}

    if (strlen($odgovor3)!=0)
        {  echo "<!-- second row-->
                <div class='row text-center'>
                    <!-- column 1-->
                    <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_3' id='ch_3' value='3'>
                    </div>
                    <div class='col-lg-4 text-center'>
                        <label>". $odgovor3."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor4)!=0)
    { echo "<!-- column 2-->
                <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_4' id='ch_4' value='4'>
                </div>
                <div class='col-lg-4 text-center'>
                        <label>". $odgovor4."</label>
                </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div>";
}

if (strlen($odgovor5)!=0)
{   echo "<!-- 3rd row-->
                <div class='row text-center'>
                    <!-- column 1-->
                <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_5' id='ch_5'  value='5'>
                </div>
                <div class='col-lg-4 text-center'>
                        <label>". $odgovor5."</label>
                </div>
                     <!-- /column 1-->";

    if(strlen($odgovor6)!=0)
        {  echo "<!-- column 2-->
                 <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_6' id='ch_6'  value='6'>
                 </div>
                 <div class='col-lg-4 text-center'>
                        <label>". $odgovor6."</label>
                 </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div>";
}

    if (strlen($odgovor7)!=0)
        { echo "<!-- 4th row-->
                <div class='row text-center'>
                    <!-- column 1-->
                <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_7' id='ch_7' value='7'>
                </div>
                <div class='col-lg-4 text-center'>
                        <label>". $odgovor7."</label>
                </div>
                     <!-- /column 1-->";

    if(strlen($odgovor8)!=0)
        {echo "<!-- column 2-->
               <div class='col-lg-2 text-right'>
                        <input type='checkbox' class='' name='ch_8' id='ch_8'  value='8'>
               </div>
               <div class='col-lg-4 text-center'>
                        <label>". $odgovor8."</label>
               </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div> ";
}

echo" 
            <div class='row text-center'>          
             <div class='col-lg-12 text-center'>
                <p>&nbsp;</p>
                <input type='button' onclick='prekiniTajmerOdg()' class='btn btn-lg btn-primary' value='Odgovori'  id='btnStop'>
             </div>
           </div>
        </div>
        </form>
    </div>
";


?>




