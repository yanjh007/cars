<?php
class Clients extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('client');
    check_session();
  }

  public function index(){
    $data['clients'] = $this->client->search();

    $this->load->view('_common/header');
    
    show_nav(11);

    $this->load->view('clients/list', $data);

    $this->load->view('_common/footer');
  }

  public function detail($cid){
  	$data['client'] = $this->client->get_client($cid);

  	if (empty($data['client'])){
	  show_404();
  	}

  	$this->load->view('_common/header');
	show_nav(11);
	
  	$this->load->view('clients/detail', $data);
  	$this->load->view('_common/footer');
  }

  public function edit($cid) {
  	$this->load->helper('form');
  	$this->load->library('form_validation');
  
  	$data['title'] = 'Create a news item';
  
  	$this->form_validation->set_rules('title', 'Title', 'required');
  	$this->form_validation->set_rules('text', 'text', 'required');
  
  	if ($this->form_validation->run() === FALSE) {
    	$this->load->view('_common/header');
	show_nav(11);
	
    	$this->load->view('clients/edit');
    	$this->load->view('_common/footer');
    
  	} else {
	  $this->news_model->set_news();
	  $this->load->view('news/success');
  	}
  }

}