<?php


class AdminTest extends TestCase
{
    private $controler;

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('User');
        $this->obj= $this->CI->User;
        $this->controler=$this->request('POST', ['Welcome', 'login'], ['loginUsername'=>'admin', 'loginPass'=>'admin1234']);
    }
    public function test_dodajKreatora()
    {
        $output=$this->request('POST', ['Admin', 'dodajKreatora'],[
            'reg_username'=>'probniKorisnik',
            'reg_password'=>'password',
            'reg_email'=>'proba@gmail.com',
            'reg_firstname'=>'proba',
            'reg_lastname'=>'proba']);
        $br=$this->db->where('username','probniKorisnik')->count_all_results('korisnici');
        $this->assertEquals(1,$br);
    }


}
