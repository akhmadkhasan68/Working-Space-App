<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("guest/auth/login", $data, TRUE);

		$this->template->__guest($data);
	}

	public function register_owner()
	{
		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("guest/auth/register_owner", $data, TRUE);

		$this->template->__guest($data);
	}

	public function register_guest()
	{
		$data['title'] = "Masuk";
		$data['view'] = $this->load->view("guest/auth/register_guest", $data, TRUE);

		$this->template->__guest($data);
	}
}
