<?php
$this->load->view('layouts/_partials/admin/head');
$this->load->view('layouts/_partials/admin/sidenav');
$data_content = array('view' => $view);
$this->load->view('layouts/_partials/admin/content', $data_content);
$data_js = array('view_js' => $view_js);
$this->load->view('layouts/_partials/admin/footer', $data_js);
?>