<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $user = $this->db->get('user')->row();

        if ($user) {
            if ($user->password == md5($password)) {
                return $user;
            }
        }

        return false;
    }

    public function update_last_login($id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', array(
            'last_login' => date('Y-m-d H:i:s')
        ));
    }
}