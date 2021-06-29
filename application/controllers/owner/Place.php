<?php
    class Place extends CI_Controller{
        public function getRegencies($id)
        {
            $data = $this->db->select('*')->from('regencies')->where(['province_id' => $id])->order_by('name', 'ASC')->get()->result();
            
            print json_encode([
                'error' => false,
                'data' => $data
            ]);
        }

        public function getDistrict($id)
        {
            $data = $this->db->select('*')->from('districts')->where(['regency_id' => $id])->order_by('name', 'ASC')->get()->result();
            
            print json_encode([
                'error' => false,
                'data' => $data
            ]);
        }
    }
?>