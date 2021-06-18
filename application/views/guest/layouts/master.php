<?php
$this->load->view('guest/layouts/_partials/head');
$this->load->view('guest/layouts/_partials/navbar');
$data_content = array('view' => $view);
$this->load->view('guest/layouts/_partials/content', $data_content);
$this->load->view('guest/layouts/_partials/footer');
?>