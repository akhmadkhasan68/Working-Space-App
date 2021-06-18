<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = "Home";
		$data['view'] = $this->load->view("guest/home/index", $data, TRUE);

		$this->template->__guest($data);
	}
}
