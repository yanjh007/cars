<?php
Class User extends CI_Model {
  const SQLQUERY = 'SELECT id,login,name,role,passwd,mobile FROM users ';
  
  public function __construct() {
    $this->load->database();
  }
  
  function get_user_by_login($login) {
      $query = $this->db->query(self::SQLQUERY. "where login ='".$login."' limit 1");

      if($query -> num_rows() == 1) {
         return $query->row();
      } else {
         return NULL;
      }
  }
  
  public function search($keyword = FALSE) {
    $sql=self::SQLQUERY;
    if ($keyword) {
      $sql=$sql." where name like '%".$keyword."%' ";
    }
    
    $sql= $sql." order by role desc";

    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function get_client($cid){
    $sql="SELECT id,name,mobile,wechat FROM clients where id=".$cid ;
    $query = $this->db->query($sql);
    return $query->row_array();
  }
 
}
?>
