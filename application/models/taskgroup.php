<?php
Class Taskgroup extends CI_Model {
  const SQLQUERY = 'SELECT id,name,descp FROM taskgroups ';
  
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

  public function save($taskgroup) {
    $data = array(
			'name' => $taskgroup["name"],
			'descp' => $taskgroup["descp"],
          );
    
	if (isset($taskgroup["taskgroup_id"]) ) { // insert
        $this->db->where('id', $taskgroup["taskgroup_id"]);
        $this->db->update('taskgroups', $data); 
	} else {
        $this->db->insert('taskgroups', $data); 
	}
    return TRUE;
  }
  
  public function get_taskgroup($cid){
    $sql= self::SQLQUERY." where id=".$cid ;
    $query = $this->db->query($sql);
    return $query->row_array();
  }
  
  public function get_tasks1($tgid) { //获取任务组相关任务
	$this->load->model('link');
	$sql = "select rid,rname from links where lid= ? and ltype = ? order by rid";
    $query = $this->db->query($sql,array($tgid,Link::TYPE_TASKGROUP_TASK));
    return $query->result_array();
  }
  
  public function get_tasks2($tgid) { //获取其他任务
	$this->load->model('link');
	$sql = "select id,name from tasktypes where id not in (select rid from links where lid= ? and ltype=?)";
    $query = $this->db->query($sql,array($tgid,Link::TYPE_TASKGROUP_TASK));
    return $query->result_array();
  } 
}
?>
