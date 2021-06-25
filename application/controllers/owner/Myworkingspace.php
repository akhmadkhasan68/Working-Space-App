<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myworkingspace extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_login') != true){
			redirect('auth/login');
		}
		if($this->session->userdata('role') != 'owner'){
			show_404();
		}

		$this->load->model('M_myworkingspace', 'm');
	}

	public function index()
	{
		$data['title'] = "Kelola Co-Working Space";
		$data['view'] = $this->load->view("owner/myworkingspace/index", $data, TRUE);
		$data['view_js'] = $this->load->view("owner/myworkingspace/index-js.php", $data, TRUE);

		$this->template->__guest($data);
	}

	public function render($page)
	{
		$this->load->view("owner/myworkingspace/partials/$page");
	}

	
}
