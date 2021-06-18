<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	public function index()
	{
		$data['title'] = "Transaksi";
		$data['view'] = $this->load->view("guest/transaction/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/transaction/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

	public function create($id)
    {
        redirect('guest/transaction');
    }
}
