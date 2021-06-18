<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function index()
    {
        if($this->session->userdata('is_login'))
        {
            if($this->session->userdata('role') == 'guest') 
            {
                redirect('guest/home');
            }
            elseif($this->session->userdata('role') == 'owner')
            {
                redirect('guest/home');
            }
            elseif($this->session->userdata('role') == 'admin')
            {
                redirect('guest/home');
            }
            else
            {
                show_404();
            }
        }

        redirect('guest/home');
    }
}
