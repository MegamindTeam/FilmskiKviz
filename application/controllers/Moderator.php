<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->database();
    }
    public function index()
    {
        session_start();
        $username=$_SESSION['username'];
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $this->load->model('Baza_znanja_M');

        $temp=$this->Baza_znanja_M->fetch_questions_VV($username);
        if($temp->num_rows()==0)$VV['recordsVV']=0;
        else $VV['recordsVV']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_VJ($username);
        if($temp->num_rows()==0)$VJ['recordsVJ']=0;
        else $VJ['recordsVJ']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_U($username);
        if($temp->num_rows()==0)$U['recordsU']=0;
        else $U['recordsU']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_S($username);
        if($temp->num_rows()==0)$S['recordsS']=0;
        else $S['recordsS']=$temp->result();
        $z1=$this->Baza_znanja_M->fetch_stars($username,1);
        $z2=$this->Baza_znanja_M->fetch_stars($username,2);
        $z3=$this->Baza_znanja_M->fetch_stars($username,3);
        $z4=$this->Baza_znanja_M->fetch_stars($username,4);
        $z5=$this->Baza_znanja_M->fetch_stars($username,5);
        $k0=$this->Baza_znanja_M->fetch_kategorija($username,0);
        $k1=$this->Baza_znanja_M->fetch_kategorija($username,1);
        $k2=$this->Baza_znanja_M->fetch_kategorija($username,2);
        $k3=$this->Baza_znanja_M->fetch_kategorija($username,3);
        $k4=$this->Baza_znanja_M->fetch_kategorija($username,4);
        
        $data=array(
            'VV'=>$VV,
            'VJ'=>$VJ,
            'U'=>$U,
            'S'=>$S,
            'Z1'=>$z1,
            'Z2'=>$z2,
            'Z3'=>$z3,
            'Z4'=>$z4,
            'Z5'=>$z5,
            'Zavg'=>($z1+$z2+$z3+$z4+$z5)==0?0:floor(($z1+$z2*2+$z3*3+$z4*4+$z5*5)/($z1+$z2+$z3+$z4+$z5)),
            'Kom'=>$k0,
            'Tri'=>$k1,
            'Dra'=>$k2,
            'Hor'=>$k3,
            'SF'=>$k4
        );

        $this->load->view('kreator_unos.php',$data);
    }
    
    public function open_dodajPitanjeVJ(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $data=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>""
        );
        $this->load->view('dodaj_pitanjeVJ',$data);
    }
    public function dodajPitanjeVJ(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $username=$_SESSION['username'];
        $dataE=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>""
        );
        $data= array(
            'pitanje'=>"",
            'autor'=>$username,
            'odgovor1'=>"",
            'odgovor2'=>"",
            'odgovor3'=>"",
            'odgovor4'=>"",
            'odgovor5'=>"",
            'odgovor6'=>"",
            'odgovor7'=>"",
            'odgovor8'=>"",
            'tacanodg'=>"",
            'postavljeno'=>0,
            'odgovoreno'=>0,
            'ocena'=>3,
            'kategorija'=> $this->input->post("zanr")
        );
        //VALIDATION


        $ok=true;
        $tempP=$this->input->post("inputQTxt");
        if(strlen($tempP)==0){$ok=false;$dataE['e_pitanje']="Polje pitanje je obavezno<br><br>";}
        else{$data['pitanje']=$tempP;}


        $br=$this->input->post("aswNum");

        $tempP=$this->input->post("inputAnsw1");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg1']="Polje odgovor1 je obavezno<br><br>";}
        else{$data['odgovor1']=$tempP;}

        $tempP=$this->input->post("inputAnsw2");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg2']="Polje odgovor2 je obavezno<br><br>";}
        else{$data['odgovor2']=$tempP;}

        $tempP=$this->input->post("inputAnsw3");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg3']="Polje odgovor3 je obavezno<br><br>";}
        else{$data['odgovor3']=$tempP;}

        $tempP=$this->input->post("inputAnsw4");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg4']="Polje odgovor4 je obavezno<br><br>";}
        else{$data['odgovor4']=$tempP;}

        if($br>=5){
            $tempP=$this->input->post("inputAnsw5");
            if(strlen($tempP)==0){$ok=false;$dataE['e_odg5']="Polje odgovor5 je obavezno<br><br>";}
            else{$data['odgovor5']=$tempP;}

            if($br>=6){
                $tempP=$this->input->post("inputAnsw6");
                if(strlen($tempP)==0){$ok=false;$dataE['e_odg6']="Polje odgovor6 je obavezno<br><br>";}
                else{$data['odgovor6']=$tempP;}

             if($br>=7){
                $tempP=$this->input->post("inputAnsw7");
                if(strlen($tempP)==0){$ok=false;$dataE['e_odg7']="Polje odgovor7 je obavezno<br><br>";}
                else{$data['odgovor7']=$tempP;}

                 if($br==8){
                     $tempP=$this->input->post("inputAnsw8");
                     if(strlen($tempP)==0){$ok=false;$dataE['e_odg8']="Polje odgovor8 je obavezno<br><br>";}
                     else{$data['odgovor8']=$tempP;}
                 }
             }
            }
        }

        $temP=(int)$this->input->post("tacni");

        if($temP>$br){$ok=false;$dataE['e_tacan']="Tacan odgovor mora biti jedan od unetih polja<br>";}
        else{$data['tacanodg']=$temP;}

       /* $data= array(
           'pitanje'=>$this->input->post("inputQTxt"),
            'autor'=>$username,
            'odgovor1'=>$this->input->post("inputAnsw1"),
            'odgovor2'=>$this->input->post("inputAnsw2"),
            'odgovor3'=>$this->input->post("inputAnsw3"),
            'odgovor4'=>$this->input->post("inputAnsw4"),
            'odgovor5'=>$o5,
            'odgovor6'=>$o6,
            'odgovor7'=>$o7,
            'odgovor8'=>$o8,
            'kategorija'=>$this->input->post("Zanr"),
            'tacanodg'=>(int)$this->input->post("tacni"),
            'postavljeno'=>0,
            'odgovoreno'=>0,
            'ocena'=>3,
            'kategorija'=> $this->input->post("zanr")
        );
       */
        if ($ok) {
            $this->load->model('Baza_znanja_M');
            $this->Baza_znanja_M->insert_question_VJ($data);
            $dataE['e_uspeh']="<div class=\"row text - center\" style='color:green;'>
                      <div class=\"col - lg - 12 text - center\"><b>USPESNO STE DODALI PITANJE</b> </div>
                  </div><br><br>";
        }
        else{$dataE['e_uspeh']="<div class=\"row text - center\" style='color:red;'>
                      <div class=\"col - lg - 12 text - center\"><b>LOSE POPUNJENA FORMA</b> </div>
                  </div><br><br>";}
        $this->load->view('dodaj_pitanjeVJ',$dataE);




    }
    public function open_dodajPitanjeVV(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $data=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>"",
            'e_tacnop'=>""
        );
        $this->load->view("dodaj_pitanjeVV",$data);
    }

    public function dodajPitanjeVV(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $username=$_SESSION['username'];
        $dataE=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>"",
            'e_tacnop'=>""
        );
        $data= array(
            'pitanje'=>"",
            'autor'=>$username,
            'odgovor1'=>"",
            'odgovor2'=>"",
            'odgovor3'=>"",
            'odgovor4'=>"",
            'odgovor5'=>"",
            'odgovor6'=>"",
            'odgovor7'=>"",
            'odgovor8'=>"",
            'tacan1'=>"",
            'tacan2'=>"",
            'tacan3'=>"",
            'tacan4'=>"",
            'postavljeno'=>0,
            'odgovoreno'=>0,
            'ocena'=>3,
            'kategorija'=> $this->input->post("zanr")
        );
        //VALIDATION


        $ok=true;
        $tempP=$this->input->post("inputQTxt");
        if(strlen($tempP)==0){$ok=false;$dataE['e_pitanje']="Polje pitanje je obavezno<br><br>";}
        else{$data['pitanje']=$tempP;}


        $br=$this->input->post("aswNum");

        $tempP=$this->input->post("inputAnsw1");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg1']="Polje odgovor1 je obavezno<br><br>";}
        else{$data['odgovor1']=$tempP;}

        $tempP=$this->input->post("inputAnsw2");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg2']="Polje odgovor2 je obavezno<br><br>";}
        else{$data['odgovor2']=$tempP;}

        $tempP=$this->input->post("inputAnsw3");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg3']="Polje odgovor3 je obavezno<br><br>";}
        else{$data['odgovor3']=$tempP;}

        $tempP=$this->input->post("inputAnsw4");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg4']="Polje odgovor4 je obavezno<br><br>";}
        else{$data['odgovor4']=$tempP;}

        if($br>=5){
            $tempP=$this->input->post("inputAnsw5");
            if(strlen($tempP)==0){$ok=false;$dataE['e_odg5']="Polje odgovor5 je obavezno<br><br>";}
            else{$data['odgovor5']=$tempP;}

            if($br>=6){
                $tempP=$this->input->post("inputAnsw6");
                if(strlen($tempP)==0){$ok=false;$dataE['e_odg6']="Polje odgovor6 je obavezno<br><br>";}
                else{$data['odgovor6']=$tempP;}

                if($br>=7){
                    $tempP=$this->input->post("inputAnsw7");
                    if(strlen($tempP)==0){$ok=false;$dataE['e_odg7']="Polje odgovor7 je obavezno<br><br>";}
                    else{$data['odgovor7']=$tempP;}

                    if($br==8){
                        $tempP=$this->input->post("inputAnsw8");
                        if(strlen($tempP)==0){$ok=false;$dataE['e_odg8']="Polje odgovor8 je obavezno<br><br>";}
                        else{$data['odgovor8']=$tempP;}
                    }
                }
            }
        }
        $i=0;
        if (isset($_POST['tacni1'])) {
            $i++;
            $data['tacan1']=1;
        }
        if (isset($_POST['tacni2'])) {
            $i++;
            if($i==1){$data['tacan1']=2;}
            else{$data['tacan2']=2;}
        }
        if (isset($_POST['tacni3'])) {
            $i++;
            if($i==1){$data['tacan1']=3;}
            elseif($i==2){$data['tacan2']=3;}
            elseif($i==3){$data['tacan3']=3;}
        }
        if (isset($_POST['tacni4'])) {
            $i++;
            if($i==1){$data['tacan1']=4;}
            elseif($i==2){$data['tacan2']=4;}
            elseif($i==3){$data['tacan3']=4;}
            else{$data['tacan4']=4;}

        }
        if (isset($_POST['tacni5'])) {
            if($br<5){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju5<br><br>";$ok=false;}
            else{
                $i++;
            if($i==1){$data['tacan1']=5;}
            elseif($i==2){$data['tacan2']=5;}
            elseif($i==3){$data['tacan3']=5;}
            elseif($i==4){$data['tacan4']=5;}
            else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni6'])) {
            if($br<6){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju6<br><br>";$ok=false;}
            else{
                $i++;
            if($i==1){$data['tacan1']=6;}
            elseif($i==2){$data['tacan2']=6;}
            elseif($i==3){$data['tacan3']=6;}
            elseif($i==4){$data['tacan4']=6;}
            else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni7'])) {
            if($br<7){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju7<br><br>";$ok=false;}
            else{
                $i++;
            if($i==1){$data['tacan1']=7;}
            elseif($i==2){$data['tacan2']=7;}
            elseif($i==3){$data['tacan3']=7;}
            elseif($i==4){$data['tacan4']=7;}
            else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni8'])) {
            if($br<8){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju8<br><br>";$ok=false;}
            else{
                $i++;
            if($i==1){$data['tacan1']=8;}
            elseif($i==2){$data['tacan2']=8;}
            elseif($i==3){$data['tacan3']=8;}
            elseif($i==4){$data['tacan4']=8;}
            else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if($i==0){$ok=false;$dataE['e_tacan']="Mora bar jedan odgovor biti tacan<br><br>";}

        /* $data= array(
            'pitanje'=>$this->input->post("inputQTxt"),
             'autor'=>$username,
             'odgovor1'=>$this->input->post("inputAnsw1"),
             'odgovor2'=>$this->input->post("inputAnsw2"),
             'odgovor3'=>$this->input->post("inputAnsw3"),
             'odgovor4'=>$this->input->post("inputAnsw4"),
             'odgovor5'=>$o5,
             'odgovor6'=>$o6,
             'odgovor7'=>$o7,
             'odgovor8'=>$o8,
             'kategorija'=>$this->input->post("Zanr"),
             'tacanodg'=>(int)$this->input->post("tacni"),
             'postavljeno'=>0,
             'odgovoreno'=>0,
             'ocena'=>3,
             'kategorija'=> $this->input->post("zanr")
         );
        */
        if ($ok) {
            $this->load->model('Baza_znanja_M');
            $this->Baza_znanja_M->insert_question_VV($data);
            $dataE['e_uspeh']="<div class=\"row text - center\" style='color:green;'>
                      <div class=\"col - lg - 12 text - center\"><b>USPESNO STE DODALI PITANJE</b> </div>
                  </div><br><br>";
        }
        else{$dataE['e_uspeh']="<div class=\"row text - center\" style='color:red;'>
                      <div class=\"col - lg - 12 text - center\"><b>LOSE POPUNJENA FORMA</b> </div>
                  </div><br><br>";}
        $this->load->view('dodaj_pitanjeVV',$dataE);



    }
    public function open_Baza_znanja(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $this->load->model('Baza_znanja_M');
        
        $temp=$this->Baza_znanja_M->fetch_questions_pitanje_VV();
        if($temp->num_rows()==0)$VV['recordsVV']=0;
        else $VV['recordsVV']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_pitanje_VJ();
        if($temp->num_rows()==0)$VJ['recordsVJ']=0;
        else $VJ['recordsVJ']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_pitanje_U();
        if($temp->num_rows()==0)$U['recordsU']=0;
        else $U['recordsU']=$temp->result();

        $temp=$this->Baza_znanja_M->fetch_questions_pitanje_S();
        if($temp->num_rows()==0)$S['recordsS']=0;
        else $S['recordsS']=$temp->result();
        $data=array(
            'VV'=>$VV,
            'VJ'=>$VJ,
            'U'=>$U,
            'S'=>$S
        );
        $this->load->view('baza_pitanja',$data);
    }
    public function open_dodajPitanjeU(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $data=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
        );
        $this->load->view("dodaj_pitanjeU",$data);
    }
    public function dodajpitanjeU(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $username=$_SESSION['username'];
        $dataE=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>""
        );
        $data= array(
            'pitanje'=>"",
            'autor'=>$username,
            'odgovor'=>"",
            'postavljeno'=>0,
            'odgovoreno'=>0,
            'ocena'=>3,
            'kategorija'=> $this->input->post("zanr")
        );
        $ok=true;
        $tempP=$this->input->post("inputQTxt");
        if(strlen($tempP)==0){$ok=false;$dataE['e_pitanje']="Polje pitanje je obavezno";}
        else{$data['pitanje']=$tempP;}

        $tempP=$this->input->post("inputAnsw1");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg1']="Polje odgovor1 je obavezno";}
        else{$data['odgovor']=$tempP;}

        if ($ok) {
            $this->load->model('Baza_znanja_M');
            $this->Baza_znanja_M->insert_question_U($data);
            $dataE['e_uspeh']="USPESNO STE DODALI PITANJE";
        }
        else{$dataE['e_uspeh']="LOSE POPUNJENA FORMA";}
        $this->load->view('dodaj_pitanjeU',$dataE);



    }
    public function open_dodajPitanjeS(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $data=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>"",
            'e_tacnop'=>"",
            'e_slika'=>""
        );
        $this->load->view("dodaj_pitanjeS",$data);
    }
    public function dodajPitanjeS(){
        session_start();
        if($_SESSION['tip']!=2){
            session_destroy();
            redirect("");
        }
        $username=$_SESSION['username'];
        $dataE=array(
            'e_uspeh'=>"",
            'e_pitanje'=>"",
            'e_odg1'=>"",
            'e_odg2'=>"",
            'e_odg3'=>"",
            'e_odg4'=>"",
            'e_odg5'=>"",
            'e_odg6'=>"",
            'e_odg7'=>"",
            'e_odg8'=>"",
            'e_tacan'=>"",
            'e_tacnop'=>"",
            'e_slika'=>""
        );
        $data= array(
            'pitanje'=>"",
            'autor'=>$username,
            'odgovor1'=>"",
            'odgovor2'=>"",
            'odgovor3'=>"",
            'odgovor4'=>"",
            'odgovor5'=>"",
            'odgovor6'=>"",
            'odgovor7'=>"",
            'odgovor8'=>"",
            'tacan1'=>"",
            'tacan2'=>"",
            'tacan3'=>"",
            'tacan4'=>"",
            'postavljeno'=>0,
            'odgovoreno'=>0,
            'ocena'=>3,
            'kategorija'=> $this->input->post("zanr")
        );
        //VALIDATION


        $ok=true;
        $tempP=$this->input->post("inputQTxt");
        if(strlen($tempP)==0){$ok=false;$dataE['e_pitanje']="Polje pitanje je obavezno<br><br>";}
        else{$data['pitanje']=$tempP;}


        $br=$this->input->post("aswNum");

        $tempP=$this->input->post("inputAnsw1");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg1']="Polje odgovor1 je obavezno<br><br>";}
        else{$data['odgovor1']=$tempP;}

        $tempP=$this->input->post("inputAnsw2");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg2']="Polje odgovor2 je obavezno<br><br>";}
        else{$data['odgovor2']=$tempP;}

        $tempP=$this->input->post("inputAnsw3");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg3']="Polje odgovor3 je obavezno<br><br>";}
        else{$data['odgovor3']=$tempP;}

        $tempP=$this->input->post("inputAnsw4");
        if(strlen($tempP)==0){$ok=false;$dataE['e_odg4']="Polje odgovor4 je obavezno<br><br>";}
        else{$data['odgovor4']=$tempP;}

        if($br>=5){
            $tempP=$this->input->post("inputAnsw5");
            if(strlen($tempP)==0){$ok=false;$dataE['e_odg5']="Polje odgovor5 je obavezno<br><br>";}
            else{$data['odgovor5']=$tempP;}

            if($br>=6){
                $tempP=$this->input->post("inputAnsw6");
                if(strlen($tempP)==0){$ok=false;$dataE['e_odg6']="Polje odgovor6 je obavezno<br><br>";}
                else{$data['odgovor6']=$tempP;}

                if($br>=7){
                    $tempP=$this->input->post("inputAnsw7");
                    if(strlen($tempP)==0){$ok=false;$dataE['e_odg7']="Polje odgovor7 je obavezno<br><br>";}
                    else{$data['odgovor7']=$tempP;}

                    if($br==8){
                        $tempP=$this->input->post("inputAnsw8");
                        if(strlen($tempP)==0){$ok=false;$dataE['e_odg8']="Polje odgovor8 je obavezno<br><br>";}
                        else{$data['odgovor8']=$tempP;}
                    }
                }
            }
        }
        $i=0;
        if (isset($_POST['tacni1'])) {
            $i++;
            $data['tacan1']=1;
        }
        if (isset($_POST['tacni2'])) {
            $i++;
            if($i==1){$data['tacan1']=2;}
            else{$data['tacan2']=2;}
        }
        if (isset($_POST['tacni3'])) {
            $i++;
            if($i==1){$data['tacan1']=3;}
            elseif($i==2){$data['tacan2']=3;}
            elseif($i==3){$data['tacan3']=3;}
        }
        if (isset($_POST['tacni4'])) {
            $i++;
            if($i==1){$data['tacan1']=4;}
            elseif($i==2){$data['tacan2']=4;}
            elseif($i==3){$data['tacan3']=4;}
            else{$data['tacan4']=4;}

        }
        if (isset($_POST['tacni5'])) {
            if($br<5){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju5<br><br>";$ok=false;}
            else{
                $i++;
                if($i==1){$data['tacan1']=5;}
                elseif($i==2){$data['tacan2']=5;}
                elseif($i==3){$data['tacan3']=5;}
                elseif($i==4){$data['tacan4']=5;}
                else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni6'])) {
            if($br<6){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju6<br><br>";$ok=false;}
            else{
                $i++;
                if($i==1){$data['tacan1']=6;}
                elseif($i==2){$data['tacan2']=6;}
                elseif($i==3){$data['tacan3']=6;}
                elseif($i==4){$data['tacan4']=6;}
                else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni7'])) {
            if($br<7){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju7<br><br>";$ok=false;}
            else{
                $i++;
                if($i==1){$data['tacan1']=7;}
                elseif($i==2){$data['tacan2']=7;}
                elseif($i==3){$data['tacan3']=7;}
                elseif($i==4){$data['tacan4']=7;}
                else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        if (isset($_POST['tacni8'])) {
            if($br<8){$dataE['e_tacnop']="Oznacen tacan odgovor ne pripada pitanju8<br><br>";$ok=false;}
            else{
                $i++;
                if($i==1){$data['tacan1']=8;}
                elseif($i==2){$data['tacan2']=8;}
                elseif($i==3){$data['tacan3']=8;}
                elseif($i==4){$data['tacan4']=8;}
                else{$ok=false;$dataE['e_tacan']="Maksimalno tacnih je 4<br><br>";}
            }
        }
        $this->load->model('Baza_znanja_M');
        $idpitanja=$this->Baza_znanja_M->fetch_questions_idS();
        if($i==0){$ok=false;$dataE['e_tacan']="Mora bar jedan odgovor biti tacan<br><br>";}
        if($ok) {
            $config['upload_path'] = '/wamp/www/ci/uploads';
            $config['file_name']=$idpitanja;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('slika')) {
                $dataE['e_slika'] = $this->upload->display_errors();
                $ok = false;
            }
        }
        if ($ok) {
            $data['slika'] = "uploads/".$idpitanja.".jpg";
            $this->Baza_znanja_M->insert_question_S($data);
            $dataE['e_uspeh']="<div class=\"row text - center\" style='color:green;'>
                      <div class=\"col - lg - 12 text - center\"><b>USPESNO STE DODALI PITANJE</b> </div>
                  </div><br><br>";
        }
        else{$dataE['e_uspeh']="<div class=\"row text - center\" style='color:red;'>
                      <div class=\"col - lg - 12 text - center\"><b>LOSE POPUNJENA FORMA</b> </div>
                  </div><br><br>";}
        $this->load->view('dodaj_pitanjeS',$dataE);


    }

    public function otvoriRangListu(){
        $this->load->database();
        $this->load->model('Baza_Znanja_M');

        $data['records']=$this->Baza_Znanja_M->getRangList();


        $this->load->view('rang_lista_M',$data);

    }

    public function logOut(){
        session_start();

        session_destroy();
        redirect("");
    }
}

