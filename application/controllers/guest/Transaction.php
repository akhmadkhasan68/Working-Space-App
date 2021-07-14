<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_places', 'places');
		$this->load->model('M_reservations', 'reservations');
		
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
		$data['reservation'] = $this->reservations->get_detail($id);
		$data['place'] = $this->places->get_detail($data['reservation']['place_id']);
		$data['payments'] = $this->places->get_places_payments($data['reservation']['place_id']);
		$data['view'] = $this->load->view("guest/transaction/index", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/transaction/index-js", $data, TRUE);

		$this->template->__guest($data);
	}

	public function history()
	{
		$user_id = $this->session->userdata('user_id');

		$data['title'] = "History Transaksi";
		$data['reservations'] = $this->reservations->get_reservation_user($user_id);
		$data['view'] = $this->load->view("guest/transaction/history", $data, TRUE);
		$data['view_js'] = $this->load->view("guest/transaction/history-js", $data, TRUE);

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
    }

	public function upload_transaction()
	{
		$reservation_id = $this->input->post('reservation_id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$type = $this->input->post('type');
		$total_payment = $this->input->post('total_payment');
		$payment_id = $this->input->post('payment_id');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('type', 'Asal Instansi', 'required');
		$this->form_validation->set_rules('total_payment', 'Nominal Pembayaran', 'required');
		$this->form_validation->set_rules('payment_id', 'Metode Pembayaran', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$errors = $this->form_validation->error_array();
			print json_encode([
				'error' => true,
				'message' => $errors
			]);
			die;
		}

		$reservation = $this->reservations->get_detail($reservation_id);
		$total = $reservation['total'];
		if($total_payment != $total)
		{
			print json_encode([
				'error' => true,
				'message' => ["Nominal Pembayaran tidak sesuai dengan tagihan!"]
			]);
			die;
		}

		$config['upload_path'] = 'uploads/photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('photos')){
			$messages = $this->upload->display_errors();

			print json_encode([
				'error' => true,
				'message' => $messages
			]);
			die();
		}
		
		$dataupload = $this->upload->data();

		$this->db->insert("reservation_detail", [
			"reservation_id" => $reservation_id,
			"type" => $type,
			"name" => $name,
			"address" => $address,
			"phone" => $phone
		]);

		$this->db->insert("transaction", [
			"reservation_id" => $reservation_id,
			"payment_id" => $payment_id,
			"total_payment" => $total_payment,
			"photo" => $dataupload['file_name'],
			"status" => "fund",
		]);

		print json_encode([
			'error' => false,
			'message' => 'Selamat, anda berhasil melakukan aksi!',
		]);
	}

	public function reject()
	{
		$id = $this->input->post('id');

		$this->db->where('id', $id)->update('reservations', ['status' => 2]);
		$this->db->where('reservation_id', $id)->update('transaction', ['status' => 'refund']);

		print json_encode([
			'error' => false,
			'message' => 'Selamat, anda berhasil melakukan aksi!',
		]);
	}
}
