<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$data['title'] = "Produk";
		$data['view'] = $this->load->view("guest/products/index", $data, TRUE);

		$this->template->__guest($data);
	}

    public function detail($id)
    {
        $data['title'] = "Produk";
		$data['view'] = $this->load->view("guest/products/detail", $data, TRUE);

		$this->template->__guest($data);
    }
}
