<?php
    class M_bookmarks extends CI_Model{
        public function get_data($limit)
        {
            $places = $this->db->select('e.*, b.name province, c.name regency, d.name district')->from('bookmarks a')
            ->join('places e', 'e.id = a.place_id')
            ->join('provinces b', 'b.id = e.province_id')
            ->join('regencies c', 'c.id = e.regency_id')
            ->join('districts d', 'd.id = e.district_id')
            ->where('a.user_id', $this->session->userdata('user_id'))
            ->where('e.status', 1)->limit($limit)->get()->result_array();

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