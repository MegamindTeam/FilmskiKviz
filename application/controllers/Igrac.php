<?php

class Igrac extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('javascript');
    }
    //osnovne F-je
    public function index()
    {
        session_start();
        $username=$_SESSION['username'];
        if($_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $_SESSION['igra']=0;
        $this->openIndexPage();
    }
    public function openIndexPage()
    {
        $this->load->view('indexIgrac');
    }
    public function logOut(){
        session_start();

        session_destroy();
        redirect("");
    }
    public function otvoriDvoboj(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $_SESSION['igraD']=1;
        $this->load->database();
        $this->load->model('Igrac_M');
        if($this->Igrac_M->vrati_poene_igraca($_SESSION['username'])<10)redirect("/Igrac");
        $this->load->view('dvoboj');
    }
    public function uloziPoene(){
        $this->load->view('uloziPoene');
    }
    public function zapocniDvoboj(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }elseif ($_SESSION['igraD']!=1){
            redirect("/Igrac");
        }
        $igram=true;
        $this->load->database();
        $this->load->model('Igrac_M');
        $ulozeniPoeni=$this->input->post('poeni');
        //$ulozeniPoeni=5;
        $stvarniPoeni=$this->Igrac_M->vrati_poene_igraca($_SESSION['username']);
        $ulozeniPoeni=$ulozeniPoeni<$stvarniPoeni?$ulozeniPoeni:$stvarniPoeni;
        $this->Igrac_M->skiniPoene($ulozeniPoeni);
        
        $idD=$this->Igrac_M->vrati_id_slobodne_igre();

        while (!empty($idD)){
            if($this->Igrac_M->upari_igraca($idD,$_SESSION['username'],$ulozeniPoeni)!=0)break;
            $idD=$this->Igrac_M->vrati_id_slobodne_igre();
            sleep(1);
        }
        
        if(empty($idD)){

            //username1
            $data=array(
                'username1'=>$_SESSION['username'],
                'idp1'=>"",
                'idp2'=>"",
                'idp3'=>"",
                'idp4'=>"",
                'idp5'=>"",
                'idp6'=>"",
                'idp7'=>"",
                'idp8'=>"",
                'idp9'=>"",
                'idp10'=>"",
                'idp11'=>"",
                'idp12'=>"",
                'tip1'=>"",
                'tip2'=>"",
                'tip3'=>"",
                'tip4'=>"",
                'tip5'=>"",
                'tip6'=>"",
                'tip7'=>"",
                'tip8'=>"",
                'tip9'=>"",
                'tip10'=>"",
                'tip11'=>"",
                'tip12'=>"",
                'ulozeni1'=>$ulozeniPoeni,
                'trenutni1'=>0,
                'trenutni2'=>0
            );              

            for($i=1;$i<13;$i++){
                $strI="idp".(string)$i;
                $strT="tip".(string)$i;
                $tip_P = rand(0,3);
                if ($tip_P == 0) {
                    $pitanje = $this->Igrac_M->dohvatiPitanjeVJ();
                    $idP=$pitanje['idpitanjaVJ'];
                }elseif($tip_P==1){
                    $pitanje = $this->Igrac_M->dohvatiPitanjeU();
                    $idP=$pitanje['idpitanjeU'];
                }elseif($tip_P==2){
                    $pitanje = $this->Igrac_M->dohvatiPitanjeS();
                    $idP=$pitanje['idpitanjeS'];
                }elseif($tip_P==3){
                    $pitanje = $this->Igrac_M->dohvatiPitanjeVV();
                    $idP=$pitanje['idpitanjaVV'];
                }

                $ok=true;
                while($ok) {

                    switch ($i) {
                        case 12:if(($idP==$data['idp12'])and($tip_P==$data['tip12'])){break;}
                        case 11:if(($idP==$data['idp11'])and($tip_P==$data['tip11'])){break;}
                        case 10:if(($idP==$data['idp10'])and($tip_P==$data['tip10'])){break;}
                        case 9:if(($idP==$data['idp9'])and($tip_P==$data['tip9'])){break;}
                        case 8:if(($idP==$data['idp8'])and($tip_P==$data['tip8'])){break;}
                        case 7:if(($idP==$data['idp7'])and($tip_P==$data['tip7'])){break;}
                        case 6:if(($idP==$data['idp6'])and($tip_P==$data['tip6'])){break;}
                        case 5:if(($idP==$data['idp5'])and($tip_P==$data['tip5'])){break;}
                        case 4:if(($idP==$data['idp4'])and($tip_P==$data['tip4'])){break;}
                        case 3:if(($idP==$data['idp3'])and($tip_P==$data['tip3'])){break;}
                        case 2:if(($idP==$data['idp2'])and($tip_P==$data['tip2'])){break;}
                        case 1:if(($idP==$data['idp1'])and($tip_P==$data['tip1'])){break;}else{$ok=false;}
                        //default:{$ok=false;}
                    }
                    if($ok){
                        $tip_P = rand(0,3);
                        if($tip_P==0){$pitanje = $this->Igrac_M->dohvatiPitanjeVJ();$idP=$pitanje['idpitanjaVJ'];}
                        elseif($tip_P==1){$pitanje = $this->Igrac_M->dohvatiPitanjeU();$idP=$pitanje['idpitanjeU'];}
                        elseif($tip_P==2){$pitanje = $this->Igrac_M->dohvatiPitanjeS();$idP=$pitanje['idpitanjeS'];}
                        elseif($tip_P==3){$pitanje = $this->Igrac_M->dohvatiPitanjeVV();$idP=$pitanje['idpitanjaVV'];}

                    }
                }
                $data[$strI]=$idP;
                $data[$strT]=$tip_P;
            }
            $idDvoboja=$this->Igrac_M->insert_dvoboj($data);
            $i=0;
            for($i=0;$i<5;$i++){
                sleep(1);
                if(!empty($this->Igrac_M->proveri($idDvoboja))){break;}
            }
            if($i==5){
                $res=$this->Igrac_M->izbrisiSaProverom($idDvoboja);
                if($res['obrisana']==1){
                    $this->Igrac_M->dodajPoene($_SESSION['username'],$ulozeniPoeni);
                    $this->load->view('nemaProtivnika',array('prazno'=>true));
                    $igram=false;
                }
            }else {
                $_SESSION['idD'] = $idDvoboja;
                $igracProtivnik = 2;
                $_SESSION['igrac'] = 1;
            }
        }
        else{
            //username2
            $_SESSION['igrac']=2;
            $igracProtivnik=1;
            $_SESSION['idD']=$idD;
        }
            if($igram) {
                //Oba korisnika
                $_SESSION['poeni'] = 0;
                $_SESSION['rdP'] = 1;
                $dataPitanje = $this->Igrac_M->dohvatiPitanje($_SESSION['idD'], "tip1", "idp1");
                $tip = $this->Igrac_M->dohvati_tip($_SESSION['idD'], "tip1");
                if ($igracProtivnik == 1) $protivnik = $this->Igrac_M->dohvati_protivnika_i_poene1($_SESSION['idD']);
                else $protivnik = $this->Igrac_M->dohvati_protivnika_i_poene2($_SESSION['idD']);
                $userProtivnik = "username" . $igracProtivnik;
                $poeniProtivnik = "trenutni" . $igracProtivnik;
                if ($tip == 0) {

                    $dataP = array(
                        'odgovor1' => $dataPitanje['odgovor1'],
                        'odgovor2' => $dataPitanje['odgovor2'],
                        'odgovor3' => $dataPitanje['odgovor3'],
                        'odgovor4' => $dataPitanje['odgovor4'],
                        'odgovor5' => $dataPitanje['odgovor5'],
                        'odgovor6' => $dataPitanje['odgovor6'],
                        'odgovor7' => $dataPitanje['odgovor7'],
                        'odgovor8' => $dataPitanje['odgovor8'],
                        'pitanje' => $dataPitanje['pitanje'],
                        'protivnik_poeni' => $protivnik[$poeniProtivnik],
                        'protivnik_username' => $protivnik[$userProtivnik],
                        'prazno'=>false

                    );
                    $this->load->view('pitanjeVJ_multi', $dataP);
                } elseif ($tip == 1) {

                    $dataP = array(
                        'pitanje' => $dataPitanje['pitanje'],
                        'protivnik_poeni' => $protivnik[$poeniProtivnik],
                        'protivnik_username' => $protivnik[$userProtivnik]
                    );
                    $this->load->view('pitanjeU_multi', $dataP);
                } elseif ($tip == 2) {

                    $dataP = array(
                        'odgovor1' => $dataPitanje['odgovor1'],
                        'odgovor2' => $dataPitanje['odgovor2'],
                        'odgovor3' => $dataPitanje['odgovor3'],
                        'odgovor4' => $dataPitanje['odgovor4'],
                        'odgovor5' => $dataPitanje['odgovor5'],
                        'odgovor6' => $dataPitanje['odgovor6'],
                        'odgovor7' => $dataPitanje['odgovor7'],
                        'odgovor8' => $dataPitanje['odgovor8'],
                        'pitanje' => $dataPitanje['pitanje'],
                        'slika' => $dataPitanje['slika'],
                        'protivnik_poeni' => $protivnik[$poeniProtivnik],
                        'protivnik_username' => $protivnik[$userProtivnik],
                        'prazno'=>false
                    );
                    $this->load->view('pitanjeS_multi', $dataP);

                } elseif ($tip == 3) {

                    $dataP = array(
                        'odgovor1' => $dataPitanje['odgovor1'],
                        'odgovor2' => $dataPitanje['odgovor2'],
                        'odgovor3' => $dataPitanje['odgovor3'],
                        'odgovor4' => $dataPitanje['odgovor4'],
                        'odgovor5' => $dataPitanje['odgovor5'],
                        'odgovor6' => $dataPitanje['odgovor6'],
                        'odgovor7' => $dataPitanje['odgovor7'],
                        'odgovor8' => $dataPitanje['odgovor8'],
                        'pitanje' => $dataPitanje['pitanje'],
                        'protivnik_poeni' => $protivnik[$poeniProtivnik],
                        'protivnik_username' => $protivnik[$userProtivnik],
                        'prazno'=>false
                    );
                    $this->load->view('pitanjeVV_muti', $dataP);
                }
            }
        
    }
    public function sledecePitanje_dvoboj(){
        
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        elseif ($_SESSION['igraD']!=1){
            redirect("/Igrac");
        }

        
        $this->load->database();
        $this->load->model('Igrac_M');
        $tip_idp=$this->Igrac_M->dohvati_tip_id_pitanja($_SESSION['rdP']);
        $strTip="tip".$_SESSION['rdP'];
        $strID="idp".$_SESSION['rdP'];

        if($tip_idp[$strTip]==0){
            $odg=$_POST['radio_answ'];
            $po=$this->Igrac_M->da_li_je_tacan_odgVJ($tip_idp[$strID],$odg);
        }
        elseif($tip_idp[$strTip]==1){
            $odg=$_POST['unesenOdgovor'];
            $po=$this->Igrac_M->da_li_je_tacan_odgU($tip_idp[$strID],$odg);

        }
        elseif ($tip_idp[$strTip]==2){
            $brO=$this->Igrac_M->vrati_broj_odgS($tip_idp[$strID]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgS($tip_idp[$strID],$odg1,$odg2,$odg3,$odg4);
            }
        }
        elseif ($tip_idp[$strTip]==3){
            $brO=$this->Igrac_M->vrati_broj_odgVV($tip_idp[$strID]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgVV($tip_idp[$strID],$odg1,$odg2,$odg3,$odg4);
            }
        }

        $_SESSION['poeni']+=$po;
        $this->Igrac_M->postaviPoene($_SESSION['poeni'],$_SESSION['idD'],$_SESSION['igrac']);
        $_SESSION['rdP']++;
        $strTip="tip".$_SESSION['rdP'];
        $strID="idp".$_SESSION['rdP'];
        $dataPitanje=$this->Igrac_M->dohvatiPitanje($_SESSION['idD'],$strTip,$strID);
        $tip=$this->Igrac_M->dohvati_tip($_SESSION['idD'],$strTip);
        if($_SESSION['igrac']==1){
            $protivnik=$this->Igrac_M->dohvati_protivnika_i_poene2($_SESSION['idD']);
            $userProtivnik="username2";
            $poeniProtivnik="trenutni2";
        }
        else{
            $protivnik=$this->Igrac_M->dohvati_protivnika_i_poene1($_SESSION['idD']);
            $userProtivnik="username1";
            $poeniProtivnik="trenutni1";
        }

        if ($tip == 0) {

            $dataP = array(
                'odgovor1' => $dataPitanje['odgovor1'],
                'odgovor2' => $dataPitanje['odgovor2'],
                'odgovor3' => $dataPitanje['odgovor3'],
                'odgovor4' => $dataPitanje['odgovor4'],
                'odgovor5' => $dataPitanje['odgovor5'],
                'odgovor6' => $dataPitanje['odgovor6'],
                'odgovor7' => $dataPitanje['odgovor7'],
                'odgovor8' => $dataPitanje['odgovor8'],
                'pitanje' => $dataPitanje['pitanje'],
                'protivnik_poeni'=>$protivnik[$poeniProtivnik],
                'protivnik_username'=>$protivnik[$userProtivnik]

            );
            $this->load->view('pitanjeVJ_multi', $dataP);
        }
        elseif($tip==1){

            $dataP = array(
                'pitanje' => $dataPitanje['pitanje'],
                'protivnik_poeni'=>$protivnik[$poeniProtivnik],
                'protivnik_username'=>$protivnik[$userProtivnik]
            );
            $this->load->view('pitanjeU_multi', $dataP);
        }
        elseif($tip==2){

            $dataP = array(
                'odgovor1' => $dataPitanje['odgovor1'],
                'odgovor2' => $dataPitanje['odgovor2'],
                'odgovor3' => $dataPitanje['odgovor3'],
                'odgovor4' => $dataPitanje['odgovor4'],
                'odgovor5' => $dataPitanje['odgovor5'],
                'odgovor6' => $dataPitanje['odgovor6'],
                'odgovor7' => $dataPitanje['odgovor7'],
                'odgovor8' => $dataPitanje['odgovor8'],
                'pitanje' => $dataPitanje['pitanje'],
                'slika'   => $dataPitanje['slika'],
                'protivnik_poeni'=>$protivnik[$poeniProtivnik],
                'protivnik_username'=>$protivnik[$userProtivnik]
            );
            $this->load->view('pitanjeS_multi', $dataP);

        }
        elseif($tip==3){

            $dataP = array(
                'odgovor1' => $dataPitanje['odgovor1'],
                'odgovor2' => $dataPitanje['odgovor2'],
                'odgovor3' => $dataPitanje['odgovor3'],
                'odgovor4' => $dataPitanje['odgovor4'],
                'odgovor5' => $dataPitanje['odgovor5'],
                'odgovor6' => $dataPitanje['odgovor6'],
                'odgovor7' => $dataPitanje['odgovor7'],
                'odgovor8' => $dataPitanje['odgovor8'],
                'pitanje' => $dataPitanje['pitanje'],
                'protivnik_poeni'=>$protivnik[$poeniProtivnik],
                'protivnik_username'=>$protivnik[$userProtivnik]
            );
            $this->load->view('pitanjeVV_muti', $dataP);
        }

    }
    
    public function zavrsenaIgra_dvoboj(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        elseif ($_SESSION['igraD']!=1){
            redirect("/Igrac");
        }
        $this->load->database();
        $this->load->model('Igrac_M');
        $tip_idp=$this->Igrac_M->dohvati_tip_id_pitanja($_SESSION['rdP']);
        $strTip="tip".$_SESSION['rdP'];
        $strID="idp".$_SESSION['rdP'];
        if($tip_idp[$strTip]==0){
            $odg=$_POST['radio_answ'];
            $po=$this->Igrac_M->da_li_je_tacan_odgVJ($tip_idp[$strID],$odg);
        }
        elseif($tip_idp[$strTip]==1){
            $odg=$_POST['unesenOdgovor'];
            $po=$this->Igrac_M->da_li_je_tacan_odgU($tip_idp[$strID],$odg);

        }
        elseif ($tip_idp[$strTip]==2){
            $brO=$this->Igrac_M->vrati_broj_odgS($tip_idp[$strID]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgS($tip_idp[$strID],$odg1,$odg2,$odg3,$odg4);
            }
        }
        elseif ($tip_idp[$strTip]==3){
            $brO=$this->Igrac_M->vrati_broj_odgVV($tip_idp[$strID]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgVV($tip_idp[$strID],$odg1,$odg2,$odg3,$odg4);
            }
        }

        $_SESSION['poeni']+=$po;
        $this->Igrac_M->postaviPoene($_SESSION['poeni'],$_SESSION['idD'],$_SESSION['igrac']);
         $this->Igrac_M->stigao($_SESSION['igrac'],$_SESSION['idD']);
        for($i=0;$i<10;$i++){
            if($_SESSION['igrac']==1){
                $provera=$this->Igrac_M->proveraKraj(2,$_SESSION['idD']);
                if($provera==1)break;
            }else{
                $provera=$this->Igrac_M->proveraKraj(1,$_SESSION['idD']);
                if($provera==1)break;
            }
            sleep(1);
        }
        if($i==10){
            $data=$this->Igrac_M->dodajPoenePobedniku($_SESSION['idD'],$_SESSION['igrac'],$_SESSION['username']);
            //$this->Igrac_M->izbrisiDvoboj($_SESSION['idD']);
        }else{
            $data=$this->Igrac_M->obradiIgracaDvoboj($_SESSION['idD'],$_SESSION['igrac'],$_SESSION['username']);
        }
        
        $this->load->view('multiFinishPage',$data);

        
    }
    
    public function otvoriProfil(){
        session_start();
        if($_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $user=$_SESSION['username'];

        $this->load->database();
        $this->load->model('Igrac_M');
        $this->Igrac_M->updateRank($_SESSION['username']);
        $data['records']=$this->Igrac_M->get($user);

        $err=array(
            'e_password' => "",
            'e_email' => "",
            "e_nalog"=>""
        );

        $block=array(
            'data'=>$data,
            'err'=>$err
        );
        $this->load->view('profil',$block);
    }
    public function izmeniProfil(){
        session_start();
        if($_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $user=$_SESSION['username'];
        $this->load->database();
        $this->load->model('Igrac_M');

        $data = array(
            'passwordOld' => $this->input->post('inputPasswordOld'),
            'email' => $this->input->post('inputEmail3'),
            'password'=>$this->input->post('inputPassword'),
            'passwordR'=>$this->input->post('inputPasswordAgain')
        );

        $ok=true;
        $type=0;
        $err=array(
            'e_password' => "",
            'e_email' => "",
            'e_nalog'=>""
        );



        //EMAIL

        if(strlen($data['email'])>0) {
            if (empty($data['email'])) {
                $err['e_email'] = "E-mail je obavezan";
                $ok = false;
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $err['e_email'] = "E-mail nije u validnom formatu";
                $ok = false;
            } elseif ($this->Igrac_M->check_unique_email($data['email']) != 0) {
                $err['e_email'] = "Zauzet e-mail";
                $ok = false;
            }
            else $type+=1;
        }

        //PASSWORD

        if(strlen($data['password'])>0) {
            if ((strlen($data['password']) > 16) or (strlen($data['password']) < 8)) {
                $err['e_password'] = "Lozinka nije dozvoljene dužine [8-16]";
                $ok = false;
            } elseif (!ctype_alnum($data['password'])) {
                $err['e_password'] = "Lozinka može da sadrži samo slova i brojeve";
                $ok = false;
            } elseif (strcmp($data['password'], $data['passwordR']) != 0) {
                $err['e_password'] = "Ponovljena loznika se ne podudara";
                $ok = false;
            }
            else $type+=2;
        }




        $data2['records']=$this->Igrac_M->get($user);



        if($ok){
            if($type==0){
                $err['e_nalog'] = "Niste popunili nalog!";
                $block=array(
                    'data'=>$data2,
                    'err'=>$err
                );
            }
            elseif($type==1){

                $data2[0]['email']=$data['email'];


                $this->Igrac_M->edit($user,$data2[0]);

                $err['e_nalog'] = "Uspesno ste izmenili nalog!";

                $data2['records']=$this->Igrac_M->get($user);

                $block=array(
                    'data'=>$data2,
                    'err'=>$err
                );



            }
            elseif($type==2){

                $data2[0]['password']=$data['password'];

                $this->Igrac_M->edit($user,$data2[0]);

                $err['e_nalog'] = "Uspesno ste izmenili nalog!";

                $data2['records']=$this->Igrac_M->get($user);

                $block=array(
                    'data'=>$data2,
                    'err'=>$err
                );

            }
            elseif($type==3){


                $data2[0]['email']=$data['email'];

                $data2[0]['password']=$data['password'];

                $this->Igrac_M->edit($user,$data2[0]);

                $err['e_nalog'] = "Uspesno ste izmenili nalog!";

                $data2['records']=$this->Igrac_M->get($user);

                $block=array(
                    'data'=>$data2,
                    'err'=>$err
                );
            }
        }
        else{
            $err['e_nalog'] = "Neuspesno ste popunili nalog!";
            $block=array(
                'data'=>$data2,
                'err'=>$err
            );

        }

        $this->load->view('profil',$block);

    }
    public function otvoriRangListu(){
    $this->load->database();
    $this->load->model('Igrac_M');

    $data['records']=$this->Igrac_M->getRangList();


    $this->load->view('rang_lista_igrac',$data);

}

    //SinglePlay
    

    function otvori_stepenice(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $_SESSION['igra']=1;
        $_SESSION['rdP']=0;
        $_SESSION['poeni']=0;
        $this->load->view('stepenice');

    }


    function sledecePitanje(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        elseif ($_SESSION['igra']!=1){
            redirect("/Igrac");
        }
        $this->load->database();
        $this->load->model('Igrac_M');
        if($_SESSION['rdP']==0) {
            $_SESSION['rdP'] = 1;
            $_SESSION['poeni'] = 0;
            $tip_P = rand(0,3);
            
            $str = "tipP".(string)$_SESSION['rdP'];
            $_SESSION[$str] = $tip_P;
            if ($tip_P == 0) {

                $pitanje = $this->Igrac_M->dohvatiPitanjeVJ();
                $_SESSION['idp1'] = $pitanje['idpitanjaVJ'];

                $data = array(
                    'odgovor1' => $pitanje['odgovor1'],
                    'odgovor2' => $pitanje['odgovor2'],
                    'odgovor3' => $pitanje['odgovor3'],
                    'odgovor4' => $pitanje['odgovor4'],
                    'odgovor5' => $pitanje['odgovor5'],
                    'odgovor6' => $pitanje['odgovor6'],
                    'odgovor7' => $pitanje['odgovor7'],
                    'odgovor8' => $pitanje['odgovor8'],
                    'pitanje' => $pitanje['pitanje']
                );
                $this->load->view('pitanjeVJ', $data);
            }
            elseif($tip_P==1){

                $pitanje = $this->Igrac_M->dohvatiPitanjeU();
                $_SESSION['idp1'] = $pitanje['idpitanjeU'];

                $data = array(
                    'pitanje' => $pitanje['pitanje']
                );
                $this->load->view('pitanjeU', $data);
            }
            elseif($tip_P==2){
                $pitanje = $this->Igrac_M->dohvatiPitanjeS();
                $_SESSION['idp1'] = $pitanje['idpitanjeS'];
                $data = array(
                    'odgovor1' => $pitanje['odgovor1'],
                    'odgovor2' => $pitanje['odgovor2'],
                    'odgovor3' => $pitanje['odgovor3'],
                    'odgovor4' => $pitanje['odgovor4'],
                    'odgovor5' => $pitanje['odgovor5'],
                    'odgovor6' => $pitanje['odgovor6'],
                    'odgovor7' => $pitanje['odgovor7'],
                    'odgovor8' => $pitanje['odgovor8'],
                    'pitanje' => $pitanje['pitanje'],
                    'slika'   => $pitanje['slika']
                );
                $this->load->view('pitanjeS', $data);

            }
            elseif($tip_P==3){
                $pitanje = $this->Igrac_M->dohvatiPitanjeVV();
                $_SESSION['idp1'] = $pitanje['idpitanjaVV'];
                $data = array(
                    'odgovor1' => $pitanje['odgovor1'],
                    'odgovor2' => $pitanje['odgovor2'],
                    'odgovor3' => $pitanje['odgovor3'],
                    'odgovor4' => $pitanje['odgovor4'],
                    'odgovor5' => $pitanje['odgovor5'],
                    'odgovor6' => $pitanje['odgovor6'],
                    'odgovor7' => $pitanje['odgovor7'],
                    'odgovor8' => $pitanje['odgovor8'],
                    'pitanje' => $pitanje['pitanje']
                );
                $this->load->view('pitanjeVV', $data);

            }

        }
        else {
           
            $str="idp".(string)$_SESSION['rdP'];
            $strT="tipP".(string)$_SESSION['rdP'];
            $ocena=$_POST['rateQ'];
            if($ocena!='')$this->Igrac_M->oceniPitanje($_SESSION[$strT],$_SESSION[$str],$ocena);
            if($_SESSION[$strT]==0){
                $odg=$_POST['radio_answ'];
                $po=$this->Igrac_M->da_li_je_tacan_odgVJ($_SESSION[$str],$odg)==0?-1:1;
            }
            elseif($_SESSION[$strT]==1){
                $odg=$_POST['unesenOdgovor'];
                $po=$this->Igrac_M->da_li_je_tacan_odgU($_SESSION[$str],$odg)==0?-1:1;
            }
            elseif($_SESSION[$strT]==2){
                $brO=$this->Igrac_M->vrati_broj_odgS($_SESSION[$str]);
                $j=0;
                $odg1="";$odg2="";$odg3="";$odg4="";
                for($i=1;$i<=$brO;$i++){
                    $sch="ch_".(string)$i;
                    if (isset($_POST[$sch])) {
                        $j++;
                        if($j==1){$odg1= $i;}
                        elseif($j==2){$odg2=$i;}
                        elseif($j==3){$odg3=$i;}
                        elseif($j==4){$odg4=$i;}
                        else{ break;}
                    }
                }
                if($j>4){$po=0;}
                else{
                    $po=$this->Igrac_M->da_li_je_tacan_odgS($_SESSION[$str],$odg1,$odg2,$odg3,$odg4);
                }
            }
            elseif($_SESSION[$strT]==3){
                $brO=$this->Igrac_M->vrati_broj_odgVV($_SESSION[$str]);
                $j=0;
                $odg1="";$odg2="";$odg3="";$odg4="";
                for($i=1;$i<=$brO;$i++){
                    $sch="ch_".(string)$i;
                    if (isset($_POST[$sch])) {
                        $j++;
                        if($j==1){$odg1= $i;}
                        elseif($j==2){$odg2=$i;}
                        elseif($j==3){$odg3=$i;}
                        elseif($j==4){$odg4=$i;}
                        else{ break;}
                    }
                }
                if($j>4){$po=0;}
                else{
                    $po=$this->Igrac_M->da_li_je_tacan_odgVV($_SESSION[$str],$odg1,$odg2,$odg3,$odg4);
                }
            }
            $tip_P = rand(0,3);
            if ($tip_P == 0) {
                $pitanje = $this->Igrac_M->dohvatiPitanjeVJ();
                $idP=$pitanje['idpitanjaVJ'];
            }elseif($tip_P==1){
                $pitanje = $this->Igrac_M->dohvatiPitanjeU();
                $idP=$pitanje['idpitanjeU'];
            }elseif($tip_P==2){
                $pitanje = $this->Igrac_M->dohvatiPitanjeS();
                $idP=$pitanje['idpitanjeS'];
            }elseif($tip_P==3){
                $pitanje = $this->Igrac_M->dohvatiPitanjeVV();
                $idP=$pitanje['idpitanjaVV'];
            }

            $ok=true;
            while($ok) {

                switch ($_SESSION['rdP']) {

                    case 6:if(($idP==$_SESSION['idp6'])and($tip_P==$_SESSION['tipP6'])){break;}
                    case 5:if(($idP==$_SESSION['idp5'])and($tip_P==$_SESSION['tipP5'])){break;}
                    case 4:if(($idP==$_SESSION['idp4'])and($tip_P==$_SESSION['tipP4'])){break;}
                    case 3:if(($idP==$_SESSION['idp3'])and($tip_P==$_SESSION['tipP3'])){break;}
                    case 2:if(($idP==$_SESSION['idp2'])and($tip_P==$_SESSION['tipP2'])){break;}
                    case 1:if(($idP==$_SESSION['idp1'])and($tip_P==$_SESSION['tipP1'])){break;}else{$ok=false;}
                    default:{$ok=false;}
                }
                if($ok){
                    $tip_P = rand(0,3);
                    if($tip_P==0){$pitanje = $this->Igrac_M->dohvatiPitanjeVJ();$idP=$pitanje['idpitanjaVJ'];}
                    elseif($tip_P==1){$pitanje = $this->Igrac_M->dohvatiPitanjeU();$idP=$pitanje['idpitanjeU'];}
                    elseif($tip_P==2){$pitanje = $this->Igrac_M->dohvatiPitanjeS();$idP=$pitanje['idpitanjeS'];}
                    elseif($tip_P==3){$pitanje = $this->Igrac_M->dohvatiPitanjeVV();$idP=$pitanje['idpitanjaVV'];}
                
                }
            }
            if(!(($_SESSION['poeni']==0)and($po<0))) {
                $_SESSION['poeni'] += $po;
            }

            $_SESSION['rdP']++;
            $str="idp".(string)$_SESSION['rdP'];
            $strT="tipP".(string)$_SESSION['rdP'];
            if($tip_P==0){
                $_SESSION[$str]=$pitanje['idpitanjaVJ'];
                $_SESSION[$strT]=0;
                $data=array(
                    'odgovor1'=>$pitanje['odgovor1'],
                    'odgovor2'=>$pitanje['odgovor2'],
                    'odgovor3'=>$pitanje['odgovor3'],
                    'odgovor4'=>$pitanje['odgovor4'],
                    'odgovor5'=>$pitanje['odgovor5'],
                    'odgovor6'=>$pitanje['odgovor6'],
                    'odgovor7'=>$pitanje['odgovor7'],
                    'odgovor8'=>$pitanje['odgovor8'],
                    'pitanje'=>$pitanje['pitanje']
                );
                $this->load->view('pitanjeVJ', $data);
            }
            elseif($tip_P==1){
                $_SESSION[$strT]=1;
                $_SESSION[$str]=$pitanje['idpitanjeU'];
                $data=array('pitanje'=>$pitanje['pitanje']);
                $this->load->view('pitanjeU', $data);
            }
            elseif($tip_P==2){
                $_SESSION[$str]=$pitanje['idpitanjeS'];
                $_SESSION[$strT]=2;
                $data=array(
                    'odgovor1'=>$pitanje['odgovor1'],
                    'odgovor2'=>$pitanje['odgovor2'],
                    'odgovor3'=>$pitanje['odgovor3'],
                    'odgovor4'=>$pitanje['odgovor4'],
                    'odgovor5'=>$pitanje['odgovor5'],
                    'odgovor6'=>$pitanje['odgovor6'],
                    'odgovor7'=>$pitanje['odgovor7'],
                    'odgovor8'=>$pitanje['odgovor8'],
                    'pitanje'=>$pitanje['pitanje'],
                    'slika' =>$pitanje['slika']
                );
                $this->load->view('pitanjeS', $data);
            }
            elseif($tip_P==3){
                $_SESSION[$str]=$pitanje['idpitanjaVV'];
                $_SESSION[$strT]=3;
                $data=array(
                    'odgovor1'=>$pitanje['odgovor1'],
                    'odgovor2'=>$pitanje['odgovor2'],
                    'odgovor3'=>$pitanje['odgovor3'],
                    'odgovor4'=>$pitanje['odgovor4'],
                    'odgovor5'=>$pitanje['odgovor5'],
                    'odgovor6'=>$pitanje['odgovor6'],
                    'odgovor7'=>$pitanje['odgovor7'],
                    'odgovor8'=>$pitanje['odgovor8'],
                    'pitanje'=>$pitanje['pitanje']
                );
                $this->load->view('pitanjeVV', $data);
            }





        }


    }
    
    function zavrsenaIgra(){
        session_start();
        if( $_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $this->load->database();
        $this->load->model('Igrac_M');
        $str="idp".(string)$_SESSION['rdP'];
        $strT="tipP".(string)$_SESSION['rdP'];
        $ocena=$_POST['rateQ'];
        if($ocena!='')$this->Igrac_M->oceniPitanje($_SESSION[$strT],$_SESSION[$str],$ocena);
        if($_SESSION[$strT]==0){
            $odg=$_POST['radio_answ'];
            $po=$this->Igrac_M->da_li_je_tacan_odgVJ($_SESSION[$str],$odg)==0?-1:1;
        }
        elseif($_SESSION[$strT]==1){
            $odg=$_POST['unesenOdgovor'];
            $po=$this->Igrac_M->da_li_je_tacan_odgU($_SESSION[$str],$odg)==0?-1:1;
        }
        elseif($_SESSION[$strT]==2){
            $brO=$this->Igrac_M->vrati_broj_odgS($_SESSION[$str]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgS($_SESSION[$str],$odg1,$odg2,$odg3,$odg4);
            }
        }
        elseif($_SESSION[$strT]==3){
            $brO=$this->Igrac_M->vrati_broj_odgVV($_SESSION[$str]);
            $j=0;
            $odg1="";$odg2="";$odg3="";$odg4="";
            for($i=1;$i<=$brO;$i++){
                $sch="ch_".(string)$i;
                if (isset($_POST[$sch])) {
                    $j++;
                    if($j==1){$odg1= $i;}
                    elseif($j==2){$odg2=$i;}
                    elseif($j==3){$odg3=$i;}
                    elseif($j==4){$odg4=$i;}
                    else{ break;}
                }
            }
            if($j>4){$po=0;}
            else{
                $po=$this->Igrac_M->da_li_je_tacan_odgVV($_SESSION[$str],$odg1,$odg2,$odg3,$odg4);
            }
        }

        if(!(($_SESSION['poeni']==0)and($po<0))) {
            $_SESSION['poeni'] += $po;
        }
        $data=$this->Igrac_M->obradi_igraca();

        unset($_SESSION['idp1']);
        unset($_SESSION['idp2']);
        unset($_SESSION['idp3']);
        unset($_SESSION['idp4']);
        unset($_SESSION['idp5']);
        unset($_SESSION['idp6']);
        unset($_SESSION['idp7']);
        unset($_SESSION['rdP']);
        unset($_SESSION['poeni']);
        unset($_SESSION['tipP1']);
        unset($_SESSION['tipP2']);
        unset($_SESSION['tipP3']);
        unset($_SESSION['tipP4']);
        unset($_SESSION['tipP5']);
        unset($_SESSION['tipP6']);
        unset($_SESSION['tipP7']);
        $_SESSION['igra']=0;

        $this->load->view('singleFinishPage',$data);
    }

    
    function otvoriIzborIgre(){
        session_start();
        $username=$_SESSION['username'];
        if($_SESSION['tip']!=1){
            session_destroy();
            redirect("");
        }
        $_SESSION['igra']=0;
        $this->load->view('izborIgre');
    }
    
    

}