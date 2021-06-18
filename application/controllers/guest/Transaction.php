<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    public function create($id)
    {
        echo $id;
    }

	public function index()
	{
		$data['title'] = "Transaksi";
		$data['view'] = $this->load->view("guest/transaction/index", $data, TRUE);

		$this->template->__guest($data);
	}
}
