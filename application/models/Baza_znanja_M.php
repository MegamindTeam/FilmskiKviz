<?php
class Baza_znanja_M extends CI_Model
{
    function __construct(){
        parent::__construct();
    }
    
    function fetch_questions_VV($username){
        return $pitanjavv=$this->db->where('autor',$username)->get('pitanjavv');
        
    }
    function fetch_questions_VJ($username){
        return $pitanjavj=$this->db->where('autor',$username)->get('pitanjavj');
    }
    function fetch_questions_U($username){
        return $pitanjau=$this->db->where('autor',$username)->get('pitanjeu');
    }
    function fetch_questions_S($username){
        return $pitanjas=$this->db->where('autor',$username)->get('pitanjes');
    }
    function fetch_stars($username,$ocena){
        return  $this->db
                ->where('autor',$username)
                ->where('ocena',$ocena)
                ->count_all_results('pitanjavv')+
        $this->db
            ->where('autor',$username)
            ->where('ocena',$ocena)
            ->count_all_results('pitanjavj')+
        $this->db
            ->where('autor',$username)
            ->where('ocena',$ocena)
            ->count_all_results('pitanjeu')+
        $this->db
            ->where('autor',$username)
            ->where('ocena',$ocena)
            ->count_all_results('pitanjes');
    }
    function fetch_kategorija($username,$kategorija){
        return $this->db
            ->where('autor',$username)
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjavv')+
        $this->db
            ->where('autor',$username)
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjavj')+
        $this->db
            ->where('autor',$username)
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjeu')+
        $this->db
            ->where('autor',$username)
            ->where('kategorija',$kategorija)
            ->count_all_results('pitanjes');
        
    }

    function insert_question_VJ($data){
        $this->db->insert("pitanjavj", $data);
    }
    function insert_question_VV($data){
        $this->db->insert("pitanjavv",$data);
    }
    function insert_question_U($data){
        $this->db->insert("pitanjeu",$data);
    }
    function fetch_questions_pitanje_VV(){
        return $pitanjavv=$this->db->select('pitanje,autor')->get('pitanjavv');

    }
    function fetch_questions_pitanje_VJ(){
        return $pitanjavj=$this->db->select('pitanje,autor')->get('pitanjavj');
    }
    function fetch_questions_pitanje_U(){
        return $pitanjau=$this->db->select('pitanje,autor')->get('pitanjeu');
    }
    function fetch_questions_pitanje_S(){
        return $pitanjas=$this->db->select('pitanje,autor')->get('pitanjes');
    }
    function insert_question_S($data){
        $this->db->insert("pitanjes",$data);

    }
    function fetch_questions_idS(){
        return  $this->db->count_all_results('pitanjeS');
    }
}