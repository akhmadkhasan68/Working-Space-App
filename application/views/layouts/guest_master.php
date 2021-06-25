<?php
$this->load->view('layouts/_partials/head');
$this->load->view('layouts/_partials/navbar');
$data_content = array('view' => $view);
$this->load->view('layouts/_partials/content', $data_content);
$data_js = array('view_js' => $view_js);
$this->load->view('layouts/_partials/footer', $data_js);
?>