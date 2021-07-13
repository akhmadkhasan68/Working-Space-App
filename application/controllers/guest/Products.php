<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Places', 'places');
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
        $data['title'] = "Produk";
		$data['places'] = $this->places->get_data(3);
		$data['view'] = $this->load->view("guest/products/detail", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/products/detail-js", $data, TRUE);

		$this->template->__guest($data);
    }
}
