<?php
    class M_places extends CI_Model{
        public function get_data($limit = null, $name = null, $status = null)
        {
            //get semua data places/workingspace dengan status aktif
            $this->db->select('a.*, b.name province, c.name regency, d.name district')->from('places a');
            $this->db->join('provinces b', 'b.id = a.province_id');
            $this->db->join('regencies c', 'c.id = a.regency_id');
            $this->db->join('districts d', 'd.id = a.district_id');
            if(!empty($status)){
                $this->db->where('a.status', $status);
            }

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
                $photos = $this->get_photos($value['id']);
                $places[$key]['photos'] = $photos;

                $bookmark = $this->get_bookmark($value['id']);
                $places[$key]['bookmark'] = $bookmark;

                $data[] = $places[$key];
            }

            
            return $data;
        }

        public function get_data_by_date($from_date, $to_date)
        {   
            //get all data place/workingspace berdasarkan tanggal yang sudah direservasi
            $this->db->select('a.place_id')->from('reservations a');
            // $this->db->where('a.status', 2);
            $this->db->where("'$from_date:00' BETWEEN a.from_date and a.to_date OR '$to_date:00' BETWEEN a.from_date and a.to_date");
            $avail = $this->db->get()->result_array();

            $place_id = [];
            if(count($avail) > 0)
            {
                foreach ($avail as $k_avail => $v_avail) {
                    array_push($place_id, $v_avail['place_id']);
                }
            }

            //get all data place/workingspace berdasarkan tanggal yang belum direservasi
            $this->db->select('b.*, c.name province, d.name regency, e.name district')->from('places b');
            $this->db->join('provinces c', 'c.id = b.province_id');
            $this->db->join('regencies d', 'd.id = b.regency_id');
            $this->db->join('districts e', 'e.id = b.district_id');
            if(count($avail) > 0){
                $this->db->where_not_in('b.id', $place_id);
            }
            $this->db->where('b.status', 1);
            $this->db->group_by('b.id');
            $places = $this->db->get()->result_array();

            $data = [];
            foreach ($places as $key => $value) {
                $photos = $this->get_photos($value['id']);
                $places[$key]['photos'] = $photos;
                
                $bookmark = $this->get_bookmark($value['id']);
                $places[$key]['bookmark'] = $bookmark;

                $data[] = $places[$key];
            }

            
            return $data;
        }

        public function get_detail($id, $status = null)
        {
            //get detail place/workingspace
            $this->db->select('a.*, b.name province, c.name regency, d.name district')->from('places a');
            $this->db->join('provinces b', 'b.id = a.province_id');
            $this->db->join('regencies c', 'c.id = a.regency_id');
            $this->db->join('districts d', 'd.id = a.district_id');
            if(!empty($status))
            {
                $this->db->where('a.status', $status);
            }

            $this->db->where('a.id', $id);
            $place = $this->db->get()->row_array();

            $data = [];

            //get photos
            $photos = $this->get_photos($place['id']);
            $place['photos'] = $photos;

            //get schedules
            $schedules = $this->get_schedules($place['id']);
            $place['schedules'] = $schedules;

            //get bookmark
            $bookmark = $this->get_bookmark($place['id']);
            $place['bookmark'] = $bookmark;

            //facilities
            $facilities = $this->get_facilities($place['id']);
            $place['facilities'] = $facilities;

            //contacts
            $contacts = $this->get_contacts($place['id']);
            $place['contacts'] = $contacts;

            //payments
            $payments = $this->get_payments($place['id']);
            $place['payments'] = $payments;

            //menus
            $menus = $this->get_menus($place['id']);
            $place['menus'] = $menus;

            return $place;
        }

        public function get_places_payments($place_id)
        {
            return $this->get_payments($place_id);
        }

        private function get_photos($place_id)
        {
            return $this->db->select('*')->from('place_photos')->where('place_id', $place_id)->get()->result_array();
        }

        private function get_bookmark($place_id)
        {
            if($this->session->userdata('is_login') == null)
            {
                $bookmark = false;
            }
            else
            {
                $cek_bookmark = $this->db->get_where('bookmarks', [
                    'user_id' => $this->session->userdata('user_id'),
                    'place_id' => $place_id
                ])->row();

                $bookmark = (!empty($cek_bookmark));
            }

            return $bookmark;
        }

        private function get_facilities($place_id)
        {
            return $this->db->select('b.*')->from("places_facilities a")
                    ->join("facilities b", "b.id = a.facility_id")
                    ->where("a.place_id", $place_id)
                    ->get()->result_array();
        }

        private function get_schedules($place_id)
        {
            $data = [];
            $days = $this->db->get("day")->result_array();
            foreach ($days as $key => $value) {
                $data[$value['name']] = $this->db->get_where("place_schedules", [
                    "place_id" => $place_id,
                    "day_id" => $value['id'],
                ])->row_array();
            }

            return $data;
        }

        private function get_contacts($place_id)
        {
            $data = [];
            $contacts = ["Whatsapp", "Instagram", "Twitter", "Facebook", "Email", "Website"];
            foreach ($contacts as $contact) {
                $data[$contact] = $this->db->get_where("place_contacts", [
                    'type' => $contact,
                    'place_id' => $place_id
                ])->row_array();
            }

            return $data;
        }

        private function get_payments($place_id)
        {
            return $this->db->select('b.*, a.value')->from("places_payments a")
                    ->join("payments b", "b.id = a.payment_id")
                    ->where("a.place_id", $place_id)
                    ->get()->result_array();
        }

        private function get_menus($place_id)
        {
            $data = [];
            $types = ['food', 'baverage', 'snack', 'other'];
            foreach ($types as $type) {
                $data[$type] = $this->db->get_where("menus", [
                    "type" => $type,
                    "place_id" => $place_id
                ])->result_array();
            }

            return $data;
        }
    }
?>