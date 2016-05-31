<?php

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index(){
       $msg = "";
        session_start();
        $this->openAdminPage($msg);

    }

    public function openAdminPage($msg)
    {
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        $this->load->database();
        $this->load->model('User');
        $query = $this->db->get("korisnici");
        $data['records'] = $query->result();
        if($query->num_rows()==0)$broj="disabled";
        else $broj="";
        $z1=$this->User->fetch_stars(1);
        $z2=$this->User->fetch_stars(2);
        $z3=$this->User->fetch_stars(3);
        $z4=$this->User->fetch_stars(4);
        $z5=$this->User->fetch_stars(5);
        $k0=$this->User->fetch_kategorija(0);
        $k1=$this->User->fetch_kategorija(1);
        $k2=$this->User->fetch_kategorija(2);
        $k3=$this->User->fetch_kategorija(3);
        $k4=$this->User->fetch_kategorija(4);

        $dataD=array(
            'data'=>$data,
            'broj'=>$broj,
            'Z1'=>$z1,
            'Z2'=>$z2,
            'Z3'=>$z3,
            'Z4'=>$z4,
            'Z5'=>$z5,
            'Zavg'=>(($z1+$z2+$z3+$z4+$z5))==0?0:floor(($z1*1+$z2*2+$z3*3+$z4*4+$z5*5)/($z1+$z2+$z3+$z4+$z5)),
            'Kom'=>$k0,
            'Tri'=>$k1,
            'Dra'=>$k2,
            'Hor'=>$k3,
            'SF'=>$k4,
            'msg'=>$msg
        );
        $this->load->view('admin',$dataD);

    }

    //Coda menjao!
    public function otvoriDodaj(){
        session_start();
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        $this->load->view('dodajUAdmin', array(
            'e_username' => "",
            'e_password' => "",
            'e_email' => "",
            'e_ime' => "",
            'e_prezime' => ""
        ));
    }
    //Coda menjao!

    public function dodaj(){
        session_start();
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        $data = array(
            'username' => $this->input->post('reg_username'),
            'password' => $this->input->post('reg_password'),
            'email' => $this->input->post('reg_email'),
            'ime' => $this->input->post('reg_firstname'),
            'prezime' => $this->input->post('reg_lastname'),
            'rank' => 0,
            'poeni' => 0,
            'tip' => 2
        );
        $this->load->database();
        $this->load->model('User');
        $password2 = $this->input->post('reg_password_confirm');
        $ok=true;
        $err=array(
            'e_username' => "",
            'e_password' => "",
            'e_email' => "",
            'e_ime' => "",
            'e_prezime' => ""
        );

        //USERNAME

        if(empty($data['username'])){
            $err['e_username']="Korisničko ime nije dozvoljene dužine[1-20]";
            $ok=false;
        }
        elseif (!ctype_alnum($data['username'])){
            $err['e_username']="Korisničkno ime može da sadrži samo slova i brojeve";
            $ok=false;
        }
        elseif(strlen($data['username'])>20){
            $err['e_username']="Korisničko ime nije dozvoljene dužine [1-20]";
            $ok=false;
        }
        elseif ($this->Player->check_unique_user($data['username'])!=0){
            $err['e_username']="Zauzeto korisničko ime";
            $ok=false;
        }

        //EMAIL

        if(empty($data['email'])){
            $err['e_email']="E-mail je obavezan";
            $ok=false;
        }
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $err['e_email']="E-mail nije u validnom formatu";
            $ok=false;
        }
        elseif($this->Player->check_unique_email($data['email'])!=0){
            $err['e_email']="Zauzet e-mail";
            $ok=false;
        }

        //PASSWORD

        if((strlen($data['password'])>16)or(strlen($data['password'])<8)){
            $err['e_password']="Lozinka nije dozvoljene dužine [8-16]";
            $ok=false;
        }
        elseif (!ctype_alnum($data['password'])){
            $err['e_password']="Lozinka može da sadrži samo slova i brojeve";
            $ok=false;
        }
        elseif(strcmp($data['password'], $password2)!=0){
            $err['e_password']="Ponovljena loznika se ne podudara";
            $ok=false;
        }

        //IME
        if((strlen($data['ime'])>20)or(strlen($data['ime'])<1)){
            $err['e_ime']="Ime nije dozvoljene dužine [1-20]";
            $ok=false;
        }
        elseif (!ctype_alpha($data['ime'])){
            $err['e_ime']="Ime može da sadrži samo slova";
            $ok=false;
        }


        //PREZIME

        if (!ctype_alpha($data['prezime'])){
            $err['e_prezime']="Prezime može da sadrži samo slova";
            $ok=false;
        }
        elseif((strlen($data['prezime'])>20)or(strlen($data['prezime'])<1)){
            $err['e_prezime']="Prezime nije dozvoljene dužine [1-20]";
            $ok=false;
        }

        $msg = "Uspešno dodat kreator baze znanja!";

        if($ok){
            if ($this->User->insert($data))
            {
                $this->openAdminPage($msg);
            }
        }
        else{
            //Coda menjao!
            $this->load->view('dodajUAdmin',$err);
            //Coda menjao!
        }


        

    }

    //Coda menjao!
    public function obrisi(){
        //dohvati korisnika
        session_start();
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        $u = $this->input->post('selectedUser');

        //
        $this->load->database();
        $this->load->model('User');


        $this->User->delete($u);
        $msg = "";

/*
        $query = $this->db->get("korisnici");
        $data['records'] = $query->result();


        if($query->num_rows()==0)$broj="disabled";
        else $broj="";

        $dataD=array(
            'data'=>$data,
            'broj'=>$broj
        );
        $this->load->view('admin',$dataD);
*/
        $this->openAdminPage($msg);

    }
    
    //Coda menjao!



    //Jovana
    public function izmeni(){
        session_start();
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        //dohvati korisnika
        $u = $this->input->post('selectedUser');
        //

        $this->load->database();
        $this->load->model('User');

        $d['records']=$this->User->get($u);



        $msg = " ";


         if ($this->User->checkType($u,4)) {
             //aktivacija
             $d[0]['tip'] = 1;
             $msg = "Uspesna aktivacija!<br><br>";
             $this->User->edit($u,$d[0]);

         }
         else if ($this->User->checkType($u,1)) {
             //ban
             $d[0]['tip'] = 4;
             $msg = "Korisnik banovan!<br><br>";
             $this->User->edit($u,$d[0]);

         }else {
             $msg = "Greska! Nije moguće banovati/aktivirati nalog kreatora baze.<br><br>";
         }


        /*
        $query = $this->db->get("korisnici");
        $data['records'] = $query->result();

        if($query->num_rows()==0)$broj="disabled";
        else $broj="";

        $dataD=array(
            'data'=>$data,
            'broj'=>$broj,
            'msg'=>$msg
        );
        $this->load->view('admin',$dataD);

        */

        $this->openAdminPage($msg);


    }
    //Jovana

    
    
    //Coda menjao! PROFIL!!!! ProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfil


    public function otvoriProfil(){
        $user='coda';

        $this->load->database();
        $this->load->model('User');
        
        $data['records']=$this->User->get($user);
        
        $this->load->view('profil',$data);
    }
    
    public function izmeniProfil(){
        $user='coda';
        $this->load->database();
        $this->load->model('User');

        $data = array(
            'username' => $this->input->post('inputName'),
            'passwordOld' => $this->input->post('inputPasswordOld'),
            'email' => $this->input->post('inputEmail3'),
            'password'=>$this->input->post('inputPassword'),
            'passwordR'=>$this->input->post('inputPasswordAgain')
        );

        $ok=true;
        $type=0;
        $err=array(
            'e_username' => "",
            'e_password' => "",
            'e_email' => "",
            'e_ime' => "",
            'e_prezime' => ""
        );

        //USERNAME

        if(strlen($data['username'])>0) {
            if (empty($data['username'])) {
                $err['e_username'] = "Korisničko ime nije dozvoljene dužine[1-20]";
                $ok = false;
            } elseif (!ctype_alnum($data['username'])) {
                $err['e_username'] = "Korisničkno ime može da sadrži samo slova i brojeve";
                $ok = false;
            } elseif (strlen($data['username']) > 20) {
                $err['e_username'] = "Korisničko ime nije dozvoljene dužine [1-20]";
                $ok = false;
            } elseif ($this->Player->check_unique_user($data['username']) != 0) {
                $err['e_username'] = "Zauzeto korisničko ime";
                $ok = false;
            }
             else $type+=1;
        }

        //EMAIL

        if(strlen($data['email'])>0) {
            if (empty($data['email'])) {
                $err['e_email'] = "E-mail je obavezan";
                $ok = false;
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $err['e_email'] = "E-mail nije u validnom formatu";
                $ok = false;
            } elseif ($this->Player->check_unique_email($data['email']) != 0) {
                $err['e_email'] = "Zauzet e-mail";
                $ok = false;
            }
             else $type+=3;
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
            else $type+=5;
        }

        $data2=$this->User->get($user);

        $data2['username']=$data['email'];

        $data['records']=$this->User->get($data2);

        

        $this->load->view('index1');
    }




    //Coda menjao! PROFIL!!!!ProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfilProfil

    public function dodajKreatora(){
        session_start();
        if($_SESSION['tip']!=3){
            session_destroy();
            redirect("");
        }
        $data = array(
            'username' => $this->input->post('reg_username'),
            'password' => $this->input->post('reg_password'),
            'email' => $this->input->post('reg_email'),
            'ime' => $this->input->post('reg_firstname'),
            'prezime' => $this->input->post('reg_lastname'),
            'rank' => 0,
            'poeni' => 0,
            'tip' => 2
        );
        $this->load->database();
        $this->load->model('Player');
        $password2 = $this->input->post('reg_password_confirm');
        $ok=true;
        $err=array(
            'e_username' => "",
            'e_password' => "",
            'e_email' => "",
            'e_ime' => "",
            'e_prezime' => ""
        );

        //USERNAME

        if(empty($data['username'])){
            $err['e_username']="Korisničko ime nije dozvoljene dužine[1-20]";
            $ok=false;
        }
        elseif (!ctype_alnum($data['username'])){
            $err['e_username']="Korisničkno ime može da sadrži samo slova i brojeve";
            $ok=false;
        }
        elseif(strlen($data['username'])>20){
            $err['e_username']="Korisničko ime nije dozvoljene dužine [1-20]";
            $ok=false;
        }
        elseif ($this->Player->check_unique_user($data['username'])!=0){
            $err['e_username']="Zauzeto korisničko ime";
            $ok=false;
        }

        //EMAIL

        if(empty($data['email'])){
            $err['e_email']="E-mail je obavezan";
            $ok=false;
        }
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $err['e_email']="E-mail nije u validnom formatu";
            $ok=false;
        }
        elseif($this->Player->check_unique_email($data['email'])!=0){
            $err['e_email']="Zauzet e-mail";
            $ok=false;
        }

        //PASSWORD

        if((strlen($data['password'])>16)or(strlen($data['password'])<8)){
            $err['e_password']="Lozinka nije dozvoljene dužine [8-16]";
            $ok=false;
        }
        elseif (!ctype_alnum($data['password'])){
            $err['e_password']="Lozinka može da sadrži samo slova i brojeve";
            $ok=false;
        }
        elseif(strcmp($data['password'], $password2)!=0){
            $err['e_password']="Ponovljena loznika se ne podudara";
            $ok=false;
        }

        //IME
        if((strlen($data['ime'])>20)or(strlen($data['ime'])<1)){
            $err['e_ime']="Ime nije dozvoljene dužine [1-20]";
            $ok=false;
        }
        elseif (!ctype_alpha($data['ime'])){
            $err['e_ime']="Ime može da sadrži samo slova";
            $ok=false;
        }


        //PREZIME

        if (!ctype_alpha($data['prezime'])){
            $err['e_prezime']="Prezime može da sadrži samo slova";
            $ok=false;
        }
        elseif((strlen($data['prezime'])>20)or(strlen($data['prezime'])<1)){
            $err['e_prezime']="Prezime nije dozvoljene dužine [1-20]";
            $ok=false;
        }
        $msg = "";

        if($ok){
            if ($this->Player->insert($data)) $this->openAdminPage($msg);
        }
        else{
            $this->load->view('dodajUAdmin',$err);
        }


    }

    
}