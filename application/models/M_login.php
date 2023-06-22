<?php

class M_login extends CI_Model{

    public function cekakun($u,$p){
        $hasil = $this->db->query("SELECT * FROM user WHERE user_username='$u' AND user_password=md5('$p')");
        return $hasil;
    }

    public function cekforpass($user_username,$user_email){
        $hasil = $this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_email='$user_email'");
        return $hasil;
    }

    public function updateactive($user_id, $data){
        $this->db->where('user_id', $user_id);
		$this->db->update('user', $data);
    }

    public function updatepass($user_username, $data){
        $this->db->where('user_username', $user_username);
		$this->db->update('user', $data);
    }
}
