<?php
    class M_places extends CI_Model{
        public function get_data($limit = null, $name = null)
        {
            $this->db->select('a.*, b.name province, c.name regency, d.name district')->from('places a');
            $this->db->join('provinces b', 'b.id = a.province_id');
            $this->db->join('regencies c', 'c.id = a.regency_id');
            $this->db->join('districts d', 'd.id = a.district_id');
            $this->db->where('a.status', 1);
            if($name != null)
            {
                $this->db->like('a.name', $name);
            }
            if($limit != null)
            {
                $this->db->limit($limit);
            }
            
            $places = $this->db->get()->result_array();

            $data = [];
            foreach ($places as $key => $value) {
                $photos = $this->db->select('*')->from('place_photos')->where('place_id', $value['id'])->get()->result_array();

                if($this->session->userdata('is_login') == null)
                {
                    $bookmark = false;
                }
                else
                {
                    $cek_bookmark = $this->db->get_where('bookmarks', [
                        'user_id' => $this->session->userdata('user_id'),
                        'place_id' => $value['id']
                    ])->row();

                    $bookmark = (!empty($cek_bookmark));
                }
                

                $places[$key]['photos'] = $photos;
                $places[$key]['bookmark'] = $bookmark;

                $data[] = $places[$key];
            }

            
            return $data;
        }

        public function get_data_by_date($from_date, $to_date)
        {   
            $this->db->select('a.place_id')->from('reservations a');
            $this->db->where("'$from_date:00' BETWEEN a.from_date and a.to_date OR '$to_date:00' BETWEEN a.from_date and a.to_date");
            $avail = $this->db->get()->result_array();

            $place_id = [];
            if(count($avail))
            {
                foreach ($avail as $k_avail => $v_avail) {
                    array_push($place_id, $v_avail['place_id']);
                }
            }

            $this->db->select('b.*, c.name province, d.name regency, e.name district')->from('reservations a');
            $this->db->join('places b', 'b.id = a.place_id');
            $this->db->join('provinces c', 'c.id = b.province_id');
            $this->db->join('regencies d', 'd.id = b.regency_id');
            $this->db->join('districts e', 'e.id = b.district_id');
            if(count($avail)){
                $this->db->where_not_in('b.id', $place_id);
            }
            $this->db->where('b.status', 1);
            $places = $this->db->get()->result_array();

            $data = [];
            foreach ($places as $key => $value) {
                $photos = $this->db->select('*')->from('place_photos')->where('place_id', $value['id'])->get()->result_array();

                if($this->session->userdata('is_login') == null)
                {
                    $bookmark = false;
                }
                else
                {
                    $cek_bookmark = $this->db->get_where('bookmarks', [
                        'user_id' => $this->session->userdata('user_id'),
                        'place_id' => $value['id']
                    ])->row();

                    $bookmark = (!empty($cek_bookmark));
                }
                

                $places[$key]['photos'] = $photos;
                $places[$key]['bookmark'] = $bookmark;

                $data[] = $places[$key];
            }

            
            return $data;
        }
    }
?>