<?php
    class Payments extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true || $this->session->userdata('role') != 'admin'){
                redirect('auth/login');
            }  
        }

        public function index()
        {
            $data['title'] = "Master Data Payment";
            $data['view'] = $this->load->view('admin/payments/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/payments/index-js', $data, TRUE);

            $this->template->__admin($data);
        }

        public function get_table()
        {
            $data = $this->db->select('*')->from('payments')->get()->result();

            print json_encode([
                'error' => false,
                'data' => $data
            ]);
        }

        public function get_form()
        {
            $id = $this->input->get('id');
            if(!empty($id))
            {
                $data['data'] = $this->db->get_where('payments', ['id' => $id])->row();
            }

            $this->load->view('admin/payments/ajax/form', $data);
        }

        public function save()
        {
            $post = $this->input->post();

            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('is_bank', 'Apakah ini adalah rekening bank?', 'required');
        
            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                print json_encode([
                    'error' => true,
                    'message' => $errors
                ]);
                die;
            }

            $cek = $this->db->get_where("payments", ['is_bank' => 1])->num_rows();
            if($post['is_bank'] == 1 && $cek > 0)
            {
                print json_encode([
                    'error' => true,
                    'message' => ['Tipe Pembayaran bank Tidak boleh lebih dari 1']
                ]);
                die;
            }

            if(empty($post['id']))
            {
                $save = $this->createData($post);
            }else{
                $save = $this->editData($post);
            }

            if(!$save)
            {
                print json_encode([
                    'error' => true,
                    'message' => ['Mohon maaf, gagal melakukan penyimpanan data!']
                ]);
                die;
            }

            print json_encode([
                'error' => false,
                'message' => "Berhasil melakukan aksi."
            ]);
        }

        private function createData($post)
        {
            return $this->db->insert('payments', [
                "name" => $post['name'],
                "is_bank" => $post['is_bank'],
            ]);
        }

        private function editData($post)
        {
            return $this->db->where('id', $post['id'])->update('payments', [
                "name" => $post['name'],
                "is_bank" => $post['is_bank'],
            ]);
        }

        public function delete()
        {
            $id = $this->input->post('id');

            $this->db->where('id', $id)->delete('payments');

            print json_encode([
                'error' => false,
                'message' => "Berhasil melakukan aksi."
            ]);
        }
    }
?>