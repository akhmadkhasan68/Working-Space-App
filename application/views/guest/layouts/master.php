<?php
$this->load->view('guest/layouts/_partials/head');
$this->load->view('guest/layouts/_partials/navbar');
$data_content = array('view' => $view);
$this->load->view('guest/layouts/_partials/content', $data_content);
$data_js = array('view_js' => $view_js);
$this->load->view('guest/layouts/_partials/footer', $data_js);
?>