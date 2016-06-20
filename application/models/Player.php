<?php


class Player extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {

        if ($this->db->insert("korisnici", $data)) {
            return true;
        }
    }

    public function check_unique_user($username)
    {
        return $this->db
            ->where('username', $username)
            ->count_all_results('korisnici');
    }

    public function check_unique_email($email)
    {
        return $this->db
            ->where('email', $email)
            ->count_all_results('korisnici');
    }


    public function check_logIn($data)
    {
        $query=$this->db->select('tip')
            ->from('korisnici')
            ->where('username', $data['username'])
            ->where('password', $data['password'])
            ->get();
        
        if($query->num_rows()>0)return $query->row()->tip;
        
        return 0;
    
    }



    public function getRangList(){
        $query=$this->db->select('username,poeni')
            ->from('korisnici')
            ->where('tip', '1')
            ->order_by("poeni", "desc")
            ->get();
        return $query->result();
    }

}