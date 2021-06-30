<?php
    class Payments extends CI_Controller{
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

        public function save()
        {
            $payment_id = $this->input->post('payment_id');
            $place_id = $this->db->get_where('places', ['user_id' => $this->session->userdata('user_id')])->row()->id;
            $value = $this->input->post('value');
            $bank = $this->input->post('bank');

            $cek = $this->db->select('*')->from('places_payments')->where(['place_id' => $place_id, 'payment_id' => $payment_id])->get()->row();

            if(!empty($cek))
            {
                if(isset($bank)){
                    $value .= " ($bank)";
                }

                //update
                $this->db->where('id', $cek->id)->update('places_payments', ['value' => $value]);
            }
            else
            {
                if(isset($bank)){
                    $value .= " ($bank)";
                }

                //insert
                $data = [
                    'place_id' => $place_id,
                    'payment_id' => $payment_id,
                    'value' => $value
                ];

                $this->db->insert('places_payments', $data);
            }

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menyimpan data!'
            ]);
        }
    }
?>