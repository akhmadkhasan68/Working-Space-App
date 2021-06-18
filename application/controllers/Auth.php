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
}
