<?php

class M_profil extends CI_Model{
    
    public function cekusername($user_usernameold){
        $hasil = $this->db->query("SELECT * FROM user WHERE user_username='$user_usernameold'");
        return $hasil;
    }

    public function updateprofil($user_id, $data){
        $this->db->where('user_id', $user_id);
		$this->db->update('user', $data);
    }

    public function updatepassword($user_username, $data){
        $this->db->where('user_username', $user_username);
		$this->db->update('user', $data);
    }
}
