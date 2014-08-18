<?php
Class Tasktype extends CI_Model {
  const SQLQUERY = 'SELECT id,tcode,name,duration1,duration2,tasktime,taskprice FROM tasktypes ';
  
  public function __construct() {
    $this->load->database();
  }
  
  public function search($keyword = FALSE) {
    $sql=self::SQLQUERY;
    if ($keyword) {
      $sql=$sql." where name like '%".$keyword."%' ";
    }
    
    //$sql= $sql." order by role desc";

    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function save($tasktype) {
    $data = array(
           'tcode'     => $tasktype["tcode"],
           'name'      => $tasktype["name"],
           'duration1' => $tasktype["duration1"],
           'duration2' => $tasktype["duration2"],
           'tasktime'  => $tasktype["tasktime"],
           'taskprice' => $tasktype["taskprice"],
          );
    
	if (isset($tasktype["tasktype_id"]) ) { // insert
        $this->db->where('id', $tasktype["tasktype_id"]);
        $this->db->update('tasktypes', $data); 
	} else {
        $this->db->insert('tasktypes', $data); 
	}
    return TRUE;
  }
  
  public function get_tasktype($cid){
    $sql="SELECT id,name,mobile,wechat FROM tasktypes where id=".$cid ;
    $query = $this->db->query($sql);
    return $query->row_array();
  }
 
}
?>
