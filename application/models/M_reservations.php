<?php
    class M_reservations extends CI_Model{
        public function get_reservations($user_id = null, $status_reservation = null, $status_payment = null)
        {
            $this->db->select('a.*, b.type, b.name, b.address, b.phone, b.created_at pay_date, c.total_payment, c.photo, c.status status_payment, d.value rating, e.description feedback, f.id payment_id, f.name payment, g.name place, g.price');
            $this->db->from('reservations a');
            $this->db->join('reservation_detail b', 'b.reservation_id = a.id', 'left');
            $this->db->join('transaction c', 'c.reservation_id = a.id', 'left');
            $this->db->join('ratings d', 'd.transaction_id = c.id', 'left');
            $this->db->join('feedbacks e', 'e.rating_id = d.id', 'left');
            $this->db->join('payments f', 'f.id = c.payment_id', 'left');
            $this->db->join('places g', 'g.id = a.place_id', 'left');
            if($user_id != null) $this->db->where('a.user_id', $user_id);
            if($status_reservation != null || $status_reservation != "") $this->db->where('a.status', $status_reservation);
            if($status_payment != null || $status_payment != "") {
                if($status_payment == "done_payment"){
                    $this->db->where('c.status IS NOT NULL');
                }elseif($status_payment == "not_payment"){
                    $this->db->where('c.status IS NULL');
                }else{
                    $this->db->where('c.status', $status_payment);
                }
            }
            $this->db->order_by('created_at', 'DESC');
            return $this->db->get()->result_array();
        }

        public function get_detail($id)
        {
            $this->db->select('a.*, b.type, b.name, b.address, b.phone, b.created_at pay_date, c.total_payment, c.photo, c.status status_payment, d.value rating, e.description feedback, f.id payment_id, f.name payment');
            $this->db->from('reservations a');
            $this->db->join('reservation_detail b', 'b.reservation_id = a.id', 'left');
            $this->db->join('transaction c', 'c.reservation_id = a.id', 'left');
            $this->db->join('ratings d', 'd.transaction_id = c.id', 'left');
            $this->db->join('feedbacks e', 'e.rating_id = d.id', 'left');
            $this->db->join('payments f', 'f.id = c.payment_id', 'left');
            $this->db->where('a.id', $id);
            return $this->db->get()->row_array();
        }
    }
?>