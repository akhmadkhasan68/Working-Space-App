<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth', 'm');
	}

	public function login()
	{
		if($this->session->userdata('is_login'))
		{
			redirect('');
		}

		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("auth/login", $data, TRUE);
		$data['view_js'] = $this->load->view("auth/login-js.php", $data, TRUE);

		$this->template->__guest($data);
	}

	public function register_owner()
	{
		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("auth/register_owner", $data, TRUE);
		$data['view_js'] = $this->load->view("auth/register_owner-js.php", $data, TRUE);

		$this->template->__guest($data);
	}

	public function register_guest()
	{
		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("auth/register_guest", $data, TRUE);
		$data['view_js'] = $this->load->view("auth/register_guest-js.php", $data, TRUE);

		$this->template->__guest($data);
	}

	public function do_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$do_login = $this->m->do_login($email, $password);

		if(!$do_login)
		{
			print json_encode([
				'error' => true,
				'message' => 'Username/Email dan Password salah!'
			]);

			die();
		}

		print json_encode([
			'error' => false,
			'message' => 'Selamat datang!'
		]);
	}

	public function do_register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

		if ($this->form_validation->run() == FALSE)
		{
			$errors = $this->form_validation->error_array();
			print json_encode([
				'error' => true,
				'message' => $errors
			]);
		}

		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'type' => $this->input->post('role')
		];

		$do_register = $this->m->do_register($data);

		if(!$do_register)
		{
			print json_encode([
				'error' => true,
				'message' => 'Ada kesalahan saat mendaftar. Mohon ulangi beberapa saat lagi'
			]);

			die();
		}

		print json_encode([
			'error' => false,
			'message' => 'Selamat akun anda berhasil dibuat!'
		]);
	}
}
