<?php
    class Menu extends CI_Controller{
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('is_login') != true){
                redirect('auth/login');
            }
            if($this->session->userdata('role') != 'owner'){
                show_404();
            }

            $this->load->model('M_myworkingspace', 'm');
        }

        public function get_table()
        {
            $filter = $this->input->get('filter');

            $this->db->select('a.*')->from('menus a');
            $this->db->join('places b', 'b.id = a.place_id');
            if($filter != null) 
                $this->db->where('type', $filter);
            $this->db->where('b.user_id', $this->session->userdata('user_id'));
            $menus = $this->db->get()->result();

            print json_encode([
                'error' => false,
                'data' => $menus
            ]);
        }

        public function get_form()
        {
            $id = $this->input->get('id');
            if(!empty($id))
            {
                $data['menu'] = $this->db->get_where("menus", [
                    "id" => $id
                ])->row();
            }
            $data['place_id'] = $this->input->get('place_id');

            $this->load->view('owner/menu/form', $data);
        }

        public function save()
        {
            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required');
            $this->form_validation->set_rules('type', 'Jenis Makanan', 'required');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                print json_encode([
                    'error' => true,
                    'message' => $errors
                ]);
                die;
            }

            $post = $this->input->post();

            if(empty($post['id']))
            {
                $save = $this->createMenu($post);
            }else{
                $save = $this->updateMenu($post);
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

        private function createMenu($post)
        {
            $insert = $this->db->insert("menus", [
                "place_id" => $post['place_id'],
                "name" => $post['name'],
                "description" => $post['description'],
                "price" => $post['price'],
                "type" => $post['type'],
            ]);

            return $insert;
        }

        private function updateMenu($post)
        {
            $update = $this->db->where('id', $post['id'])->update("menus", [
                "name" => $post['name'],
                "description" => $post['description'],
                "price" => $post['price'],
                "type" => $post['type']
            ]);

            return $update;
        }

        public function delete()
        {
            $id = $this->input->post('id');

            $this->db->where('id', $id)->delete("menus");

            print json_encode([
                'error' => false,
                'message' => "Berhasil melakukan aksi."
            ]);
        }
    }
?>