<?php


class User extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function insert($user){

        if($this->db->insert("korisnici",$user)){
            return true;
        }
    }
    function fetch_stars($ocena){
        return  $this->db
            ->where('ocena',$ocena)
            ->count_all_results('pitanjavv')+
        $this->db
            ->where('ocena',$ocena)
            ->count_all_results('pitanjavj')+
        $this->db
            ->where('ocena',$ocena)
            ->count_all_results('pitanjeu')+
        $this->db
            ->where('ocena',$ocena)
            ->count_all_results('pitanjes');
    }
    function fetch_kategorija($kategorija){
        return $this->db
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjavv')+
        $this->db
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjavj')+
        $this->db
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjeu')+
        $this->db
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjes');

    }
    
    
    public function delete($user){
        $this->db->where('username', $user);
        $this->db->delete('korisnici');
        
    }




    public function getNoAdmin($user){
        $query=$this->db->select('*')
            ->from('korisnici')
            ->where('username', $user)
            ->where('tip',3)
            ->get();
        return $query->result();
    }

    //Coda menjao!!
    public function get($user){
        $query=$this->db->select('*')
            ->from('korisnici')
            ->where('username', $user)
            ->get();
        return $query->result();
    }

    public function edit($user, $data){

        $this->db->where('username', $user);
        $this->db->update('korisnici', $data);
        
    }

    //Coda menjao!

    public function checkType($user,$tip){
        return $this->db->where('username', $user)
                ->where('tip',$tip)
                ->count_all_results('korisnici');
        

    }

    
}