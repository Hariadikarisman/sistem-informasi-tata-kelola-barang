<?php 
function user() {
  $cek = get_instance();
  return $cek->session->userdata('logged_in');
}
function cek_login()
{
    $cek = get_instance();
    $user = $cek->session->userdata('logged_in');

    if(!$cek->session->userdata('email')){
        redirect('auth/login');
    } else {
        $role_id = $cek->session->userdata('role_id');
        $menu = $cek->uri->segment(1);

        $queryMenu = $cek->db->get_where('menu_user', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $cek->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menu_id
        ]);

        if($userAccess->num_rows() < 1){
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id){
    $cek = get_instance();
    $cek->db->where('role_id', $role_id);
    $cek->db->where('menu_id', $menu_id);
    $result = $cek->db->get('user_access_menu');
    if($result->num_rows() > 0){
        return "checked = 'checked'";
    }
}
?>
