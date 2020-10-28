<?php 

class Login_model extends CI_Model {
    
    public function cekUsername($nama){
		return $this->db->get_where('user', ['nama' => $nama]);
	}

}
