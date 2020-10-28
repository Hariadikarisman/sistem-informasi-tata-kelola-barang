<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    public function getAll()
    {
      return $this->db->where('submenu_user')
                      ->get('submenu_user')
                      ->result_array();
    }

    public function getSubMenu(){
        $query = " SELECT `submenu_user`.*, `menu_user`. `menu`
                   FROM `submenu_user` JOIN `menu_user`
                   ON `submenu_user`.`menu_id` = `menu_user`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getPengguna(){
     // return $this->db->where('role_id !=', '1')->get('user')->result_array();
      return $this->db->where('role_id !=', '1')->get('user')->result_array();
    } 

    public function getAdmin(){
     // return $this->db->where('role_id !=', '1')->get('user')->result_array();
      return $this->db->where('role_id !=', '2')->get('user')->result_array();
    }

}
