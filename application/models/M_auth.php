<?php
    defined('BASEPATH') or exit('no direct script');
    class M_auth extends CI_Model{
        public function do_login($email, $password)
        {
            $data = [
                'email' => $email,
                'password' => md5($password)
            ];

            //query cek user untuk login 
            $cek = $this->db->select('*')->from('users')
                    ->group_start()
                        ->where('username', $email)
                        ->where('password', md5($password))
                    ->group_end()
                    ->or_group_start()
                        ->where('email', $email)
                        ->where('password', md5($password))
                    ->group_end()
                    ->get()
                    ->row();

            if(!empty($cek))
            {
                $userdata = [
                    'user_id' => $cek->id,
                    'name' => $cek->name,
                    'username' => $cek->username,
                    'email' => $cek->email,
                    'role' => $cek->type,
                    'is_login' => true
                ];

                $this->session->set_userdata($userdata);

                return true;
            }

            return false;
        }

        public function do_register($data)
        {
            //query insert data user untuk register
            return $this->db->insert('users', $data);
        }

        public function get_userdata($id)
        {
            return $this->db->get_where('users', ['id' => $id])->row();
        }
    }
?>