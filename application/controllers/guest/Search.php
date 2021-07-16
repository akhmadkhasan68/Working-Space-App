<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_places', 'places');
	}

	public function index()
	{
		$data['title'] = "Cari";
		$data['places'] = $this->places->get_data(3, null, 1);
		$data['view'] = $this->load->view("guest/search/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/search/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

	public function get_search()
	{
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		$data['places'] = $this->places->get_data_by_date($from_date, $to_date);
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		
		$this->load->view('guest/search/ajax/search', $data);
	}
}
