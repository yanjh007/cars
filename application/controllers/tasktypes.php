<?php
class Tasktypes extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('tasktype');
    check_session();
  }

  public function index(){
	$this->load->helper('form');
	if ($this->input->get("search")) {
	  $keyword=$this->input->get("search");
	  $data['tasktypes'] = $this->tasktype->search($keyword);
	} else {
	  $data['tasktypes'] = $this->tasktype->search();
	}

    $this->load->view('_common/header');
    
    show_nav(11);

    $this->load->view('tasktypes/list', $data);

    $this->load->view('_common/footer');
  }

  public function view($tid){
	if ($this->input->server('REQUEST_METHOD')==="DELETE") {
	  $this->tasktype->remove($tid);
	  echo "OK";
	  return;
	}
	
	if ($this->input->get("method") === "delete") {
	  	$this->tasktype->remove($tid);
		redirect('users'); 		  
	} else { //详情页面 基本信息 车辆信息
	  $data['tasktype'] = $this->tasktype->get_tasktype($tid);
	  if (empty($data['tasktype'])) show_404();

	  $this->load->helper('form');
	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $data['cars'] = $this->tasktype->get_cars($tid);
	  $this->load->view('users/detail', $data);
	  
	  $this->load->view('_common/footer');	  
	}
  }

  public function edit($tid) {	
	  $data['tasktype'] = $this->tasktype->get_tasktype($tid);
	  if (empty($data['tasktype'])) show_404();

	  $this->load->helper('form');
	
	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $this->load->view('users/edit', $data);
	  $this->load->view('_common/footer');	  
  }
  
  public function save() {	
	$this->tasktype->save($this->input->post());
	redirect('tasktypes');
  }
  
  public function link() {
	$userid=$this->input->post("user_id");
	if ($userid) {
	  $this->tasktype->link($this->input->post());
	  redirect('tasktypes/'.$tasktypeid);
	} else {
	  redirect('tasktypes');
	}
	
  } 
  
}