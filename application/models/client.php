<?php
class Client extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function search($keyword = FALSE) {
    $sql="SELECT id,name,mobile FROM clients" ;
    if ($keyword) {
      $sql=$sql." where name like %'".$keyword."'% ";
    }
    $sql= $sql." order by edit_at desc limit 20";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function get_client($cid){
    $sql="SELECT id,name,mobile FROM clients where id=".$cid ;
    $query = $this->db->query($sql);
    return $query->row_array();
  }
  
  public function save(){


  }
  
  function get_passwd_by_login($login) {
    $query = $this->db->query("SELECT passwd FROM clients where login ='".$login."' limit 1");

    if($query -> num_rows() > 0) {
      return $query->row()->passwd;
    } else {
        return NULL;
    }
  }
}