<?php
class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user');
    check_session();
  }

  public function index(){
	$this->load->helper('form');

	if ($this->input->get("search")) {
	  $keyword=$this->input->get("search");
	  $data['users'] = $this->user->search($keyword);
	} else {
	  $data['users'] = $this->user->search();
	}

    $this->load->view('_common/header');
    
    show_nav(11);

    $this->load->view('users/list', $data);

    $this->load->view('_common/footer');
  }

  public function view($cid){
	if ($this->input->server('REQUEST_METHOD')==="DELETE") {
	  $this->client->remove($cid);
	  echo "OK";
	  return;
	}
	
	if ($this->input->get("method") === "delete") {
	  	$this->client->remove($cid);
		redirect('users'); 		  
	} else { //详情页面 基本信息 车辆信息
	  $data['client'] = $this->client->get_client($cid);
	  if (empty($data['client'])) show_404();

	  $this->load->helper('form');
	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $data['cars'] = $this->client->get_cars($cid);
	  $this->load->view('users/detail', $data);
	  
	  $this->load->view('_common/footer');	  
	}
  }

  public function edit($cid) {	
	  $data['client'] = $this->client->get_client($cid);
	  if (empty($data['client'])) show_404();

	  $this->load->helper('form');
	
	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $this->load->view('users/edit', $data);
	  $this->load->view('_common/footer');	  
  }
  
  public function save() {	
	$this->client->save($this->input->post());
	redirect('users');
  }
  
  public function link() {
	$userid=$this->input->post("user_id");
	if ($userid) {
	  $this->client->link($this->input->post());
	  redirect('users/'.$clientid);
	} else {
	  redirect('users');
	}
	
  } 
  
}