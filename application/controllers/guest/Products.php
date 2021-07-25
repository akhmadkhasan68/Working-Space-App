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
		$data['places'] = $this->places->get_data(3, null, 1);
		$data['view'] = $this->load->view("guest/products/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/products/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

    public function detail($id)
    {
        $data['title'] = "Detail Produk";
		$data['places'] = $this->places->get_data(3, null, 1);
		$data['place'] = $this->places->get_detail($id, 1);
		$data['ratings'] = $this->get_ratings($data['place']['feedbacks']);
		$data['view'] = $this->load->view("guest/products/detail", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/products/detail-js", $data, TRUE);

		$this->template->__guest($data);
    }

	private function get_ratings($feedbacks)
	{
		$total = 0;
		foreach ($feedbacks as $key => $value) {
			$total += $value['value'];
		}

		return round($total/count($feedbacks));
	}

	public function get_search()
	{
		$name = $this->input->post('name');
		$data['places'] = $this->places->get_data(null, $name, 1);
		
		$this->load->view('guest/products/ajax/search', $data);
	}
}
