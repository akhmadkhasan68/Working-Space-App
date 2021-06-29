<?php
$this->load->view('layouts/_partials/guest/head');
$this->load->view('layouts/_partials/guest/navbar');
$data_content = array('view' => $view);
$this->load->view('layouts/_partials/guest/content', $data_content);
$data_js = array('view_js' => $view_js);
$this->load->view('layouts/_partials/guest/footer', $data_js);
?>