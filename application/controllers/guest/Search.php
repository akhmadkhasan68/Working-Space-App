<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index()
	{
		$data['title'] = "Cari";
		$data['view'] = $this->load->view("guest/search/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/search/index-js", $data, TRUE);

		$this->template->__guest($data);
	}
}
