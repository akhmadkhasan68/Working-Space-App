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
		$data['title'] = "Kelola Co-Working Space";
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

	public function uploadImg()
	{
		$config['upload_path'] = 'uploads/photos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);

        if (!$this->upload->do_upload('file')){
            $messages = $this->upload->display_errors();

			print json_encode([
				'error' => true,
				'message' => $messages
			]);
			die();
        }
        
		$dataupload = $this->upload->data();

		$this->db->insert('place_photos', [
			'place_id' => $this->input->get_post('place_id'),
			'photo' => $dataupload['file_name']
		]);

        print json_encode([	
			'error' => false,
			'message' => 'Selamat, anda berhasil menambahkan gambar!',
			'data' => $dataupload
		]);
	}
}
