<?php
    class Profile extends CI_Controller{
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('is_login') != true){
                redirect('auth/login');
            }
            if($this->session->userdata('role') != 'guest'){
                show_404();
            }

            $this->load->model('M_auth', 'm');
        }

        public function index()
        {
            $data['title'] = "Profile";
            $data['data'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();
            $data['view_js'] = $this->load->view('guest/profile/index-js', $data, true);
            $data['view'] = $this->load->view("guest/profile/index", $data, TRUE);

            $this->template->__guest($data);
        }

        public function save()
        {
            $id = $this->input->post('id');
            $password_change = $this->input->post('password_change');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $conf_password = $this->input->post('conf_password');
            $userdata = $this->m->get_userdata($id);

            $this->form_validation->set_message('is_unique', '%s is already taken. Please enter another value');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', ($userdata->username != $username) ? 'required|is_unique[users.username]' : 'required');
            $this->form_validation->set_rules('email', 'Email', ($userdata->email != $email) ? 'required|is_unique[users.email]' : 'required');

            if($password_change == 1){
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
            }

            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                print json_encode([
                    'error' => true,
                    'message' => $errors
                ]);
                die;
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'username' => $username,
            ];
            if($password_change == 1)
            {
                $data['password'] = md5($password);
            }

            $do_save = $this->db->where('id', $id)->update('users', $data);
    
            if(!$do_save)
            {
                print json_encode([
                    'error' => true,
                    'message' => 'Ada kesalahan saat mengubah profil. Mohon ulangi beberapa saat lagi'
                ]);
    
                die();
            }
    
            print json_encode([
                'error' => false,
                'message' => 'Selamat profil anda berhasil diubah!'
            ]);
        }
    }
?>