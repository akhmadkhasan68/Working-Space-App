<?php
    class Places extends CI_Model{
        public function get_data($limit)
        {
            $places = $this->db->select('a.*, b.name province, c.name regency, d.name district')->from('places a')
            ->join('provinces b', 'b.id = a.province_id')
            ->join('regencies c', 'c.id = a.regency_id')
            ->join('districts d', 'd.id = a.district_id')
            ->where('a.status', 1)->limit($limit)->get()->result_array();

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