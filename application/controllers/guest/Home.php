<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('places', 'm');
	}

	public function index()
	{
		$data['title'] = "Home";
		$data['places'] = $this->m->get_data(3);
		$data['view_js'] = $this->load->view('guest/home/index-js', $data, true);
		$data['view'] = $this->load->view("guest/home/index", $data, TRUE);

		$this->template->__guest($data);
	}
}
