<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_places', 'places');
	}

	public function index()
	{
		$data['title'] = "Produk";
		$data['places'] = $this->places->get_data(3);
		$data['view'] = $this->load->view("guest/products/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/products/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

    public function detail($id)
    {
        $data['title'] = "Detail Produk";
		$data['places'] = $this->places->get_data(3);
		$data['place'] = $this->places->get_detail($id);
		$data['view'] = $this->load->view("guest/products/detail", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/products/detail-js", $data, TRUE);

		$this->template->__guest($data);
    }

	public function get_search()
	{
		$name = $this->input->post('name');
		$data['places'] = $this->places->get_data(null, $name);
		
		$this->load->view('guest/products/ajax/search', $data);
	}
}
