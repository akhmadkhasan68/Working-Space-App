<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_places', 'places');
		$this->load->helper('string');

		if($this->session->userdata('is_login') != true){
			redirect('auth/login');
		}
		if($this->session->userdata('role') != 'guest'){
			show_404();
		}
	}

	public function detail($id)
	{
		$data['title'] = "Transaksi";
		$data['view'] = $this->load->view("guest/transaction/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/transaction/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

	public function create($id)
    {
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		$this->db->select('a.place_id')->from('reservations a');
		$this->db->where('a.place_id', $id);
		$this->db->where('a.status', 2);
		$this->db->where("'$from_date:00' BETWEEN a.from_date and a.to_date OR '$to_date:00' BETWEEN a.from_date and a.to_date");
		$avail = $this->db->get()->result_array();

		if(count($avail) > 0)
		{
			print json_encode([
				'error' => true,
				'message' => 'Mohon maaf, jadwal tidak tersedia!'
			]);
			die;
		}

		$date1 = new DateTime($from_date);
		$date2 = new DateTime($to_date);

		$diff = $date2->diff($date1);

		$hours = $diff->h;
		$hours = $hours + ($diff->days*24);
		$total = $hours * $this->db->get_where("places", ['id' => $id])->row()->price;

		$this->db->insert("reservations", [
			"code" => random_string('alnum', 10),
			"place_id" => $id,
			"user_id" => $this->session->userdata('user_id'),
			"from_date" => $from_date,
			"to_date" => $to_date,
			"hours" => $hours,
			"total" => $total,
			"status" => 0,
		]);

		print json_encode([
			'error' => false,
			'message' => 'Selamat, anda berhasil melakukan reservasi!',
			'data_id' => $this->db->insert_id()
		]);
		die;
    }
}
