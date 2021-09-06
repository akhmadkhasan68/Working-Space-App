<?php
    defined('BASEPATH') or exit('no direct script');
    class M_myworkingspace extends CI_Model{
        public function getDataPage($page, $user_id)
        {
            if($page == "home"){
                $data = $this->dataHome($user_id);
            }
            elseif($page == "general"){
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
            elseif($page == "operational")
            {
                $data = $this->dataOperational($user_id);
            }
            elseif($page == "contact")
            {
                $contacts = ["Whatsapp", "Instagram", "Twitter", "Facebook", "Email", "Website"];
                foreach($contacts as $k_contact => $v_contact)
                {
                    $data[$v_contact] = $this->dataContacts($user_id, $v_contact);
                }
            }
            elseif($page == "menu")
            {
                $data = $this->dataMenu($user_id);
            }
            elseif($page == "review")
            {
                $data = $this->dataReview($user_id);
            }
            elseif($page == "reservation")
            {
                $data = $this->dataMenu($user_id);
            }

            return $data;
        }

        private function dataHome($user_id) 
        {
            $info = $this->db->select("*")->from("places")->where("user_id", $user_id)->get()->row(); //get info place/workingspace
            $reservations = $this->db->select('*')->from('reservations a')->where('a.place_id', $info->id)->join('reservation_detail b', 'b.reservation_id = a.id')->get()->result(); //get data reservasi
            $reservations_success = $this->db->select('*')->from('reservations a')->where('a.place_id', $info->id)->join('reservation_detail b', 'b.reservation_id = a.id')->where('status', 1)->get()->result(); //get data reservasi berhasil
            $reservations_denied = $this->db->select('*')->from('reservations a')->where('a.place_id', $info->id)->join('reservation_detail b', 'b.reservation_id = a.id')->where('status', 2)->get()->result(); //get data reservasi batal
            $reservations_waiting = $this->db->select('*')->from('reservations a')->where('a.place_id', $info->id)->join('reservation_detail b', 'b.reservation_id = a.id')->where('status', 0)->get()->result(); //get data reservasi pending

            $data['info'] = $info;
            $data['reservations'] = $reservations;
            $data['reservations_success'] = $reservations_success;
            $data['reservations_denied'] = $reservations_denied;
            $data['reservations_waiting'] = $reservations_waiting;

            return $data;
        }

        private function dataGeneral($user_id)
        {
            //get data place/workingspace berdasarkan user id pemilik
            $data = $this->db->select("*")->from("places")->where("user_id", $user_id)->get()->row(); 

            return $data;
        }

        private function dataPhoto($user_id) 
        {
            //get data photo workingpsace
            return $this->db->select("a.*")
                    ->from("place_photos a")
                    ->join('places p', 'p.id = a.place_id')
                    ->where("p.user_id", $user_id)
                    ->get()
                    ->result();
        }

        private function dataPayment($user_id)
        {
            //get data payment
            return $this->db->select('c.*, a.id as id_payment_place, a.`value`, a.place_id, b.`name` as place')
                    ->from("places_payments a")
                    ->join("places b", "b.id = a.place_id and b.user_id = $user_id")
                    ->join("payments c", "c.id = a.payment_id", "right")
                    ->get()
                    ->result();
        }

        private function dataFacilities($user_id)
        {
            //get data semua fasilitas 
            return $this->db->select('c.*, b.id as place_id, b.`name` as place, a.facility_id')
            ->from("places_facilities a")
            ->join("places b", "b.id = a.place_id and b.user_id = $user_id")
            ->join("facilities c", "c.id = a.facility_id", "right")
            ->get()
            ->result();
        }

        

        private function dataPlacesFacilities($user_id)
        {
            //get data fasilitas workingspace yang sudah ditambahkan
            return $this->db->select('*')->from('places_facilities a')
                    ->join('facilities b', 'b.id = a.facility_id')
                    ->join('places c', 'c.id = a.place_id')
                    ->where(['c.user_id' => $user_id])->get()->result();
        }

        private function dataOperational($user_id)
        {
            //get data jam operasional
            return $this->db->select("c.*, a.id as id_schedule, a.open, a.close")->from("place_schedules a")
                        ->join("places b", "b.id = a.place_id and b.user_id = $user_id")
                        ->join("day c", "c.id = a.day_id", 'right')->get()->result();
        }

        private function dataContacts($user_id, $type)
        {
            //get data kontak
            return $this->db->select('a.*')->from('place_contacts a')
                    ->join('places b', 'b.id = a.place_id')
                    ->where('b.user_id', $user_id)
                    ->where('a.type', $type)
                    ->get()
                    ->row();
        }

        private function dataMenu($user_id)
        {
            //get data menu
            return $this->db->select('a.*')->from('menus a')
                    ->join('places b', 'b.id = a.place_id')
                    ->where('b.user_id', $user_id)->get()->result();
        }

        private function dataReview($user_id)
        {
            $data = $this->db->select('c.*, d.*, b.*')->from('reservations a')
            ->join('ratings b', 'b.reservation_id = a.id')
            ->join('feedbacks c', 'c.rating_id = b.id')
            ->join('users d', 'd.id = a.user_id')
            ->join('places e', 'e.id = a.place_id')
            ->where('e.user_id', $user_id)->get()->result_array();

            return $data;
        }
    }
?>