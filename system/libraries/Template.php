<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class CI_Template
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function __guest($data) {
        $data["title"] = "WorkingSpace - $data[title]";

        $this->CI->load->view('guest/layouts/master', $data);
    }
}
