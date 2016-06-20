<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}


	public function index()
	{
		$this->load->view('index1');
	}

	public function registerOpen()
	{
		$this->load->view('registracija', array(
												'e_username' => "",
												'e_password' => "",
												'e_email' => "",
												'e_ime' => "",
												'e_prezime' => ""
										));
	}
	
	//Coda pisao!!
	public function login()
	{
		$data = array
		(
			'username' => $this->input->post('loginUsername'),
			'password' => $this->input->post('loginPass')
		);

		$this->load->database();
		$this->load->model('Player');
		$err = array(
			//'poruka'=>"Uspesno ste ulogovani!"
			'username' => "Uspesno ste ulogovani",
			'password' => ""
		);
	    if (!ctype_alnum($data['username'])){
			$err['e_username']="Korisničkno ime može da sadrži samo slova i brojeve";
			$this->load->view('index1',$err);
		}else {

			$i = $this->Player->check_logIn($data);

			if ($i == 0) {
				$err['username'] = "Nemate nalog";
				$err['password'] = "0";
				$this->load->view('index1', $err);
			} elseif ($i == 1) {
				session_start();
				$_SESSION['username'] = $data['username'];
				$_SESSION['tip'] = 1;
				$_SESSION['igra'] = 0;
				redirect("/Igrac");
			} elseif ($i == 2) {
				session_start();
				$_SESSION['username'] = $data['username'];
				$_SESSION['tip'] = 2;
				redirect("/Moderator");
			} elseif ($i == 3) {
				session_start();
				$_SESSION['username'] = $data['username'];
				$_SESSION['tip'] = 3;
				redirect("/Admin");
			} elseif($i == 4) {
				$err['username'] = "Banovani ste";
				$err['password'] = "0";
				$this->load->view('index1', $err);

			}
		}

	}
//Coda pisao!!

	public function register()
	{
		$data = array(
			'username' => $this->input->post('reg_username'),
			'password' => $this->input->post('reg_password'),
			'email' => $this->input->post('reg_email'),
			'ime' => $this->input->post('reg_firstname'),
			'prezime' => $this->input->post('reg_lastname'),
			'rank' => 0,
			'poeni' => 0,
			'tip' => 1
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

				if($ok){
					if ($this->Player->insert($data)) $this->load->view('index1');
				}
				else{
					$this->load->view('registracija',$err);
				}


	}

	public function openRankList(){

		$this->load->database();
		$this->load->model('Player');

		$data['records']=$this->Player->getRangList();

		$this->load->view('rang_lista',$data);
	}

}
