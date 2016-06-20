<?php
 class Igrac_M extends CI_Model{
    
     
     
     
     
     public function get($user){
    $query=$this->db->select('*')
    ->from('korisnici')
    ->where('username', $user)
    ->get();
    return $query->result();
    }
    //Coda menjao!!
    
    
    
    //Coda menjao!PROFIL!
    public function edit($user,$data)
    {
    
    $this->db->where('username', $user);
    $this->db->update('korisnici', $data);
    
    }
    //Coda menjao!PROFIL!
    
    
    
    //Coda menjao!PROFIL!
    public function check_unique_user($username)
    {
    return $this->db
    ->where('username', $username)
    ->count_all_results('korisnici');
    }
    //Coda menjao!PROFIL!
    
    
    
    //Coda menjao!PROFIL!
    public function check_unique_email($email)
    {
    return $this->db
    ->where('email', $email)
    ->count_all_results('korisnici');
    }
    //Coda menjao!PROFIL!
    
    
    
    
    //Coda menjao!RangLista
    public function getRangList(){
    $query=$this->db->select('username,poeni')
    ->from('korisnici')
    ->where('tip', '1')
    ->order_by("poeni", "desc")
    ->get();
    return $query->result();
    }
    //Coda menjao!RangLista
     
     //single play

    function dohvatiPitanjeVJ(){
       $br=$this->db
           ->count_all_results('pitanjavj');

       $i=rand(0,$br-1);


       $query=$this->db->select('idpitanjaVJ,pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8')
           ->from('pitanjavj')
           ->get()->result_array();
        return $query[$i];

    }

     function dohvatiPitanjeU(){
     $br=$this->db
         ->count_all_results('pitanjeU');

     $i=rand(0,$br-1);


     $query=$this->db->select('idpitanjeU,pitanje')
         ->from('pitanjeu')
         ->get()->result_array();
     return $query[$i];

 }

     function dohvatiPitanjeS(){
         $br=$this->db
             ->count_all_results('pitanjes');

         $i=rand(0,$br-1);


         $query=$this->db->select('idpitanjeS,pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8,slika')
             ->from('pitanjes')
             ->get()->result_array();
         return $query[$i];
     }

     function dohvatiPitanjeVV(){
         $br=$this->db
             ->count_all_results('pitanjavv');

         $i=rand(0,$br-1);


         $query=$this->db->select('idpitanjaVV,pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8')
             ->from('pitanjavv')
             ->get()->result_array();
         return $query[$i];
     }

     function da_li_je_tacan_odgU($idP,$odg){
         $tacno = $this->db->where('idpitanjeU',$idP)->where('odgovor',$odg)->count_all_results('pitanjeu');

         $this->db->select('postavljeno,odgovoreno');
         $this->db->from('pitanjeu');
         $this->db->where('idpitanjeU',$idP);
         $r = $this->db->get()->row();
         $postavljeno=$r->postavljeno+1;
         $odgovoreno=$r->odgovoreno+($tacno?1:0);
         $this->db->set('odgovoreno',$odgovoreno);
         $this->db->set('postavljeno',$postavljeno);
         $this->db->where('idpitanjeU',$idP);
         $this->db->update('pitanjeu');
         return $tacno;
     }
   
   
    function oceniPitanje($tip,$idP,$ocena){
        if($tip==0){$idIme='idpitanjaVJ';$tabela='pitanjavj';}
        elseif ($tip==1){$idIme='idpitanjeU';$tabela='pitanjeu';}
        elseif ($tip==2){$idIme='idpitanjeS';$tabela='pitanjes';}
        elseif ($tip==3){$idIme='idpitanjaVV';$tabela='pitanjavv';}
        
        $this->db->select('postavljeno,ocena');
        $this->db->from($tabela);
        $this->db->where($idIme,$idP);
        $r=$this->db->get()->row();
        $novaO=($r->postavljeno*$r->ocena+$ocena)/($r->postavljeno+1);
        $this->db->set('ocena',$novaO);
        $this->db->where($idIme,$idP);
        $this->db->update($tabela);
    
    }

    function da_li_je_tacan_odgVJ($idP,$odg){
        $tacno = $this->db->where('idpitanjaVJ',$idP)->where('tacanodg',$odg)->count_all_results('pitanjavj');

        $this->db->select('postavljeno,odgovoreno');
        $this->db->from('pitanjavj');
        $this->db->where('idpitanjaVJ',$idP);
        $r = $this->db->get()->row();
        $postavljeno=$r->postavljeno+1;
        $odgovoreno=$r->odgovoreno+($tacno?1:0);
        $this->db->set('odgovoreno',$odgovoreno);$this->db->set('postavljeno',$postavljeno);
        $this->db->where('idpitanjaVJ',$idP);
        $this->db->update('pitanjavj');
        return $tacno;
    }

     function da_li_je_tacan_odgS($idP,$odg1,$odg2,$odg3,$odg4){
         $tacno = $this->db->where('idpitanjeS',$idP)->where('tacan1',$odg1)->where('tacan2',$odg2)->where('tacan3',$odg3)->where('tacan4',$odg4)->count_all_results('pitanjes');

         $this->db->select('postavljeno,odgovoreno');
         $this->db->from('pitanjes');
         $this->db->where('idpitanjeS',$idP);
         $r = $this->db->get()->row();
         $postavljeno=$r->postavljeno+1;
         $odgovoreno=$r->odgovoreno+($tacno?1:0);
         $this->db->set('odgovoreno',$odgovoreno);$this->db->set('postavljeno',$postavljeno);
         $this->db->where('idpitanjeS',$idP);
         $this->db->update('pitanjes');
         return $tacno;

     }
     


     function vrati_broj_odgS($idP){
         $arr = $this->db->where('idpitanjeS',$idP)->get('pitanjes')->row();
         $i=4;
         if(strlen($arr->odgovor5)>0)$i++;
         if(strlen($arr->odgovor6)>0)$i++;
         if(strlen($arr->odgovor7)>0)$i++;
         if(strlen($arr->odgovor8)>0)$i++;
         
         return $i;
         
     }

     function da_li_je_tacan_odgVV($idP,$odg1,$odg2,$odg3,$odg4){
         $tacno = $this->db->where('idpitanjaVV',$idP)->where('tacan1',$odg1)->where('tacan2',$odg2)->where('tacan3',$odg3)->where('tacan4',$odg4)->count_all_results('pitanjavv');

         $this->db->select('postavljeno,odgovoreno');
         $this->db->from('pitanjavv');
         $this->db->where('idpitanjaVV',$idP);
         $r = $this->db->get()->row();
         $postavljeno=$r->postavljeno+1;
         $odgovoreno=$r->odgovoreno+($tacno?1:0);
         $this->db->set('odgovoreno',$odgovoreno);$this->db->set('postavljeno',$postavljeno);
         $this->db->where('idpitanjaVV',$idP);
         $this->db->update('pitanjavv');
         return $tacno;

     }

     function vrati_broj_odgVV($idP){
         $arr = $this->db->where('idpitanjaVV',$idP)->get('pitanjavv')->row();
         $i=4;
         if(strlen($arr->odgovor5)>0)$i++;
         if(strlen($arr->odgovor6)>0)$i++;
         if(strlen($arr->odgovor7)>0)$i++;
         if(strlen($arr->odgovor8)>0)$i++;

         return $i;

     }
     function obradi_Igraca(){
         $q=$this->db->select('poeni')->where('username',$_SESSION['username'])->get('korisnici')->row();
         $poeni=$q->poeni+$_SESSION['poeni'];
         $rank=$this->db->where('poeni >',$poeni)->from('korisnici')->count_all_results()+1;
         $this->db->set('rank',$rank)->set('poeni',$poeni)->where('username',$_SESSION['username'])->update('korisnici');
         $data=array(
             'rank'=>$rank,
             'ukupnoPoena'=>$poeni,
             'poeni'=>$_SESSION['poeni']
         );
         return $data;
     }
     function skiniPoene($poencici){
             $q=$this->db->select('poeni')->where('username',$_SESSION['username'])->get('korisnici')->row();
             $poeni=$q->poeni-$poencici;
             $rank=$this->db->where('poeni >',$poeni)->from('korisnici')->count_all_results()+1;
             $this->db->set('rank',$rank)->set('poeni',$poeni)->where('username',$_SESSION['username'])->update('korisnici');
         
     }
     function vrati_poene_igraca($user){
         return $this->db->select('poeni')->where('username',$user)->get('korisnici')->row()->poeni;
     }
     function vrati_id_slobodne_igre(){
         return $this->db->select_min('idDvoboj')->where('username2 is NULL')->get('dvoboj')->row()->idDvoboj;
     }
     function upari_igraca($idD,$user,$ul){
         $this->db->set('username2',$user)->set('ulozeni2',$ul)->where('idDvoboj',$idD)->where('username2 is NULL')->update('dvoboj');
         return $this->db->affected_rows();
     }
     function insert_dvoboj($data){
         $this->db->insert("dvoboj",$data);
         return $this->db->insert_id();
     }
     function proveri($id){
         return $this->db->select('username2')->where('idDvoboj',$id)->get('dvoboj')->row()->username2;
         
     }
     function dohvatiPitanje($idD,$tip,$idp){
         $str=$tip.",".$idp;
         $r=$this->db->select($str)->where('idDvoboj',$idD)->get('dvoboj')->row();
         $id=$r->$idp;
         
           if ($r->$tip==0) $q=$this->db->select('pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8')->where('idpitanjaVJ',$id)->from('pitanjavj')->get()->result_array();
           if($r->$tip==1)$q=$this->db->select('pitanje')->where('idpitanjeU',$id)->from('pitanjeu')->get()->result_array();
           if($r->$tip==2) $q=$this->db->select('pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8,slika')->where('idpitanjeS',$id)->from('pitanjes')->get()->result_array();
           if($r->$tip==3) $q=$this->db->select('pitanje,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,odgovor7,odgovor8')->where('idpitanjaVV',$id)->from('pitanjavv')->get()->result_array();
            return $q[0];
         
     }
     function dohvati_tip($idD,$tip){
         $d=$this->db->select($tip)->where('idDvoboj',$idD)->get('dvoboj')->row();
         return $d->$tip;
     }
     function  dohvati_protivnika_i_poene1($idD){
         $q=$this->db->select('username1,trenutni1')->where('idDvoboj',$idD)->get('dvoboj')->result_array();
         return $q[0];
     }
     function  dohvati_protivnika_i_poene2($idD){
         $q=$this->db->select('username2,trenutni2')->where('idDvoboj',$idD)->get('dvoboj')->result_array();
         return $q[0];
     }
     function dohvati_tip_id_pitanja($rdB){
         $str="tip".$rdB.",idp".$rdB;
         $query=$this->db->select($str)->from('dvoboj')->where('idDvoboj',$_SESSION['idD'])->get()->result_array();
         return $query[0];
           
         
     }
     function  postaviPoene($poeni,$idD,$igrac){
         $str="trenutni".$igrac;
         $this->db->set($str,$poeni)->where('idDvoboj',$idD)->update('dvoboj');
     }
     function stigao($ind,$id){
         $str="idp".$ind;
         $this->db->set($str,0)->where('idDvoboj',$id)->update('dvoboj');
     }
     function proveraKraj($ind,$id){
        $str="idp".$ind;
         return $this->db->where('idDvoboj',$id)->where($str,0)->count_all_results('dvoboj');
    }
     function dodajPoenePobedniku($id,$ind,$user){
         $str="ulozeni".$ind;
         $poeni=$this->db->select($str)->where('idDvoboj',$id)->get('dvoboj')->result_array();
         $t=$this->dodajPoene($user,$poeni[0][$str]);
         $poeniT=$this->db->select('trenutni1,trenutni2,ulozeni1,ulozeni2,username1,username2')->where('idDvoboj',$id)->get('dvoboj')->row();
         $data=array(
             'pobednik'=>$user,
             'protivnik_poeni'=>$ind==1?$poeniT->trenutni2:$poeniT->trenutni1,
             'protivnik_username'=>$ind==1?$poeniT->username2:$poeniT->username1,
             'rank'=>$t
         );
         
         return $data;
     }
     function dodajPoene($user,$poencici){
         $q=$this->db->select('poeni')->where('username',$user)->get('korisnici')->row();
         $poeni=$q->poeni+$poencici;
         $rank=$this->db->where('poeni >',$poeni)->from('korisnici')->count_all_results()+1;
         $this->db->set('rank',$rank)->set('poeni',$poeni)->where('username',$user)->update('korisnici');
         
         return $rank;
     }
     function obradiIgracaDvoboj($id,$ind,$user){
         $poeni=$this->db->select('trenutni1,trenutni2,ulozeni1,ulozeni2,username1,username2')->where('idDvoboj',$id)->get('dvoboj')->row();
         $data=array(
                'pobednik'=>"",
                'protivnik_poeni'=>$ind==1?$poeni->trenutni2:$poeni->trenutni1,
                'protivnik_username'=>$ind==1?$poeni->username2:$poeni->username1,
                'rank'=>"",
         );
         if($poeni->trenutni1>$poeni->trenutni2){
             if($ind==1){
                 $data['pobednik']=$user;
                 $data['rank']=$this->dodajPoene($user,2*$poeni->ulozeni1);
             }
             else{
                 $data['pobednik']=$poeni->username1;
                 $data['rank']=$this->dodajPoene($user,0);
             }
         }
         elseif($poeni->trenutni1<$poeni->trenutni2){
             if($ind==2){
                 $data['pobednik']=$user;
                 $data['rank']=$this->dodajPoene($user,2*$poeni->ulozeni2);
             }
             else{
                 $data['pobednik']=$poeni->username2;
                 $data['rank']=$this->dodajPoene($user,0);
             }
         }
         else{
             $data['pobednik']="NERESENO JE!!";
             if($ind==1){$data['rank']=$this->dodajPoene($user,$poeni->ulozeni1);}
             else {$data['rank']=$this->dodajPoene($user,$poeni->ulozeni2);}
         }
         return $data;
         
     }
     function updateRank($user){
             $q=$this->db->select('poeni')->where('username',$user)->get('korisnici')->row();
             $poeni=$q->poeni;
             $rank=$this->db->where('poeni >',$poeni)->from('korisnici')->count_all_results()+1;
             $this->db->set('rank',$rank)->where('username',$user)->update('korisnici');

             return $rank;
     }
     function IzbrisiDvoboj($idD){
         $this->db->where('idDvoboj', $idD);
         $this->db->delete('dvoboj');
     }
     function izbrisiSaProverom($idD){
         $this->db->where('idDvoboj',$idD)->where('username2 is NULL')->delete('dvoboj');
         $res['obrisana']=$this->db->affected_rows();
         return $res;
     }
 }   