<?php
class Clients extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('client');
    check_session();
  }

  public function index(){
	$this->load->helper('form');
	
    $data['clients'] = $this->client->search();

    $this->load->view('_common/header');
    
    show_nav(11);

    $this->load->view('clients/list', $data);

    $this->load->view('_common/footer');
  }

  public function detail($cid){
	if ($this->input->server('REQUEST_METHOD')==="DELETE") {
	  $this->client->remove($cid);
	  echo "OK";
	  return;
	}
	
	if ($this->input->get("method") === "delete") {
	  	$this->client->remove($cid);
		redirect('clients'); 		  
	} else if ($this->input->get("method") === "edit") {
	  $data['client'] = $this->client->get_client($cid);
	  if (empty($data['client'])) show_404();

	  $this->load->helper('form');
	
	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $this->load->view('clients/edit', $data);
	  $this->load->view('_common/footer');	  
	} else {
	  $data['client'] = $this->client->get_client($cid);
	  if (empty($data['client'])) show_404();

	  $this->load->view('_common/header');
	  show_nav(11);
	  
	  $this->load->view('clients/detail', $data);
	  $this->load->view('_common/footer');	  
	}
  }

  public function save() {	
	$this->client->save($this->input->post());
	redirect('clients');
  }

  
}