<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myworkingspace extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_login') != true){
			redirect('auth/login');
		}
		if($this->session->userdata('role') != 'owner'){
			show_404();
		}

		$this->load->model('M_myworkingspace', 'm');
	}

	public function index()
	{
		$info = $this->db->select("*")->from("places")->where("user_id", $this->session->userdata('user_id'))->get()->row();

		$data['title'] = "Kelola Co-Working Space";
		$data['reservations_waiting'] = $this->db->select('*')->from('reservations a')->where('a.place_id', $info->id)->join('reservation_detail b', 'b.reservation_id = a.id')->where('status', 0)->get()->result();
		$data['view'] = $this->load->view("owner/myworkingspace/index", $data, TRUE);
		$data['view_js'] = $this->load->view("owner/myworkingspace/index-js.php", $data, TRUE);

		$this->template->__guest($data);
	}

	public function render($page)
	{
		$data['data'] = $this->m->getDataPage($page, $this->session->userdata('user_id'));
		$data['provinces'] = $this->db->select('*')->from('provinces')->order_by('name', 'ASC')->get()->result();
		$data['regencies'] = $this->db->select('*')->from('regencies')->order_by('name', 'ASC')->get()->result();
		$data['districts'] = $this->db->select('*')->from('districts')->order_by('name', 'ASC')->get()->result();

		$this->load->view("owner/myworkingspace/partials/$page", $data);
	}
}
