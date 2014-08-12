<?php
Class User extends CI_Model {
  function get_user_by_login($login) {
       $query = $this->db->query("SELECT id,login,name,role,passwd FROM users where login ='".$login."' limit 1");

       if($query -> num_rows() == 1) {
          return $query->row();
       } else {
          return NULL;
       }
  }
}
?>
