<?php
    defined('BASEPATH') or exit('no direct script');
    class M_myworkingspace extends CI_Model{
        public function getDataPage($page, $user_id)
        {
            if($page == "general"){
                $data['general'] = $this->dataGeneral($user_id);
                $data['photos'] = $this->dataPhoto($user_id);
            }
            elseif($page == "payment")
            {
                $data = $this->dataPayment($user_id);
            }
            elseif($page == "facilities")
            {
                $data['facilities'] = $this->dataFacilities($user_id);
                $data['places_facilities'] = $this->dataPlacesFacilities($user_id);
            }

            return $data;
        }

        private function dataGeneral($user_id)
        {
            $data = $this->db->select("*")->from("places")->where("user_id", $user_id)->get()->row();

            if(empty($data))
            {
                $data = $this->db->insert('places', [
                    'user_id' => $user_id,
                    'name' => '',
                    'description' => '',
                    'capacity' => '',
                    'price' => '',
                    'province_id' => '',
                    'regency_id' => '',
                    'district_id' => '',
                    'village_id' => '',
                    'address' => '',
                    'longitude' => '',
                    'latitude' => '',
                    'status' => 0
                ]);
            }

            return $data;
        }

        private function dataPhoto($user_id) 
        {
            return $this->db->select("*")
                    ->from("place_photos a")
                    ->join('places p', 'p.id = a.place_id')
                    ->where("p.user_id", $user_id)
                    ->get()
                    ->result();
        }

        private function dataPayment($user_id)
        {
            return $this->db->select('c.*, a.id as id_payment_place, a.`value`, a.place_id, b.`name` as place')
                    ->from("places_payments a")
                    ->join("places b", "b.id = a.place_id and b.user_id = $user_id")
                    ->join("payments c", "c.id = a.payment_id", "right")
                    ->get()
                    ->result();
        }

        private function dataFacilities($user_id)
        {
            return $this->db->select('c.*, b.id as place_id, b.`name` as place, a.facility_id')
            ->from("places_facilities a")
            ->join("places b", "b.id = a.place_id and b.user_id = $user_id")
            ->join("facilities c", "c.id = a.facility_id", "right")
            ->get()
            ->result();
        }

        private function dataPlacesFacilities($user_id)
        {
            return $this->db->select('*')->from('places_facilities a')
                    ->join('facilities b', 'b.id = a.facility_id')
                    ->join('places c', 'c.id = a.place_id')
                    ->where(['c.user_id' => $user_id])->get()->result();
        }
    }
?>