<?php
    class Contacts extends CI_Controller{
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

        public function delete()
        {
            $id = $this->input->post('id');

            $this->db->where('id', $id)->delete('place_contacts');

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menghapus kontak!'
            ]);
        }

        public function save()
        {
            $place_id = $this->db->get_where('places', ['user_id' => $this->session->userdata('user_id')])->row()->id;
            $contacts = ["Whatsapp", "Instagram", "Twitter", "Facebook", "Email", "Website"];
            foreach ($contacts as $k_contact => $v_contact) {
                $value = $this->input->post(strtolower($v_contact));
                if($value == null || empty($value))
                    continue;

                $cek = $this->db->select('*')->from('place_contacts')->where(['place_id' => $place_id, 'type' => $v_contact])->get()->row();
                if(!empty($cek))
                {
                    $this->db->where('id', $cek->id)->update('place_contacts', [
                        'place_id' => $place_id,
                        'type' => $v_contact,
                        'value' => $value
                    ]);
                }else{
                    $this->db->insert('place_contacts', [
                        'place_id' => $place_id,
                        'type' => $v_contact,
                        'value' => $value
                    ]);
                }   
            }

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menyimpan kontak!'
            ]);
        }
    }
?>