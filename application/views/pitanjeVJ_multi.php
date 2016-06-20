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

if (strlen($odgovor1)!=0)
{ echo "<!-- first row-->
                <div class=\"row text-center\">
                    <!-- column 1-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\" value='1'checked >
                    </div>
                   <div class=\"col-lg-4 text-center\">
                        <label>".$odgovor1."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor2)!=0)
    { echo "<!-- column 2-->
                        <div class=\"col-lg-1 text-right\">
                            <input type=\"radio\" class=\"\" name=\"radio_answ\" value='2'>
                        </div>
                        <div class=\"col-lg-4 text-center\">
                            <label>".$odgovor2."</label>
                        </div>
                         <!-- /column 2-->
                    ";}

    echo "</div><!-- //first row-->";

}

if (strlen($odgovor3)!=0)
{  echo "<!-- second row-->
                <div class=\"row text-center\">
                    <!-- column 1-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\"  value='3'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor3."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor4)!=0)
    { echo "<!-- column 2-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\" value='4'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor4."</label>
                    </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div>";
}

if (strlen($odgovor5)!=0)
{   echo "<!-- 3rd row-->
                <div class=\"row text-center\">
                    <!-- column 1-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\"  value='5'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor5."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor6)!=0)
    {  echo "<!-- column 2-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\"  value='6'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor6."</label>
                    </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div>";
}

if (strlen($odgovor7)!=0)
{   echo "<!-- 4th row-->
                <div class=\"row text-center\">
                    <!-- column 1-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\"  value='7'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor7."</label>
                    </div>
                     <!-- /column 1-->";

    if(strlen($odgovor8)!=0)
    {echo "<!-- column 2-->
                    <div class=\"col-lg-1 text-right\">
                        <input type=\"radio\" class=\"\" name=\"radio_answ\"  value='8'>
                    </div>
                    <div class=\"col-lg-4 text-center\">
                        <label>". $odgovor8."</label>
                    </div>
                     <!-- /column 2-->
                    
                    ";}

    echo "</div> ";
}

echo" 
        </div>
        </form>
    </div>
";


?>
            



