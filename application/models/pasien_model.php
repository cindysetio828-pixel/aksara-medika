<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
    public function cek_username($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row();
    }

    public function cek_username_except($username, $id_user)
    {
        $this->db->where('username', $username);
        $this->db->where('id !=', $id_user);
        return $this->db->get('user')->row();
    }

    public function register($data_user, $data_pasien)
    {
        $this->db->trans_start();

        $this->db->insert('user', $data_user);
        $id_user = $this->db->insert_id();

        $data_pasien['id_user'] = $id_user;
        $this->db->insert('pasien', $data_pasien);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function cek_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('role', 'pasien');
        $user = $this->db->get('user')->row();

        if ($user) {
            if ($user->password == md5($password)) {
                return $user;
            }
        }

        return false;
    }

    public function get_pasien_by_user($id_user)
    {
        return $this->db->get_where('pasien', ['id_user' => $id_user])->row();
    }

    public function update_last_login($id_user)
    {
        $this->db->where('id', $id_user);
        return $this->db->update('user', [
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_all_admin($keyword = null)
    {
        $this->db->select('pasien.*, user.username, user.last_login');
        $this->db->from('pasien');
        $this->db->join('user', 'user.id = pasien.id_user', 'left');

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('pasien.nama_pasien', $keyword);
            $this->db->or_like('pasien.no_telepon', $keyword);
            $this->db->or_like('user.username', $keyword);
            $this->db->group_end();
        }

        $this->db->order_by('pasien.id_pasien', 'DESC');

        return $this->db->get()->result();
    }

    public function get_by_id_admin($id_pasien)
    {
        $this->db->select('pasien.*, user.username');
        $this->db->from('pasien');
        $this->db->join('user', 'user.id = pasien.id_user', 'left');
        $this->db->where('pasien.id_pasien', $id_pasien);
        return $this->db->get()->row();
    }

    public function update_admin($id_pasien, $data_user, $data_pasien)
    {
        $pasien = $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row();

        if (!$pasien) {
            return false;
        }

        $this->db->trans_start();

        if ($pasien->id_user) {
            $this->db->where('id', $pasien->id_user);
            $this->db->update('user', $data_user);
        }

        $this->db->where('id_pasien', $id_pasien);
        $this->db->update('pasien', $data_pasien);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function hapus_admin($id_pasien)
    {
        $pasien = $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row();

        if (!$pasien) {
            return false;
        }

        $this->db->trans_start();

        $this->db->where('id_pasien', $id_pasien);
        $this->db->delete('pendaftaran');

        $this->db->where('id_pasien', $id_pasien);
        $this->db->delete('pasien');

        if ($pasien->id_user) {
            $this->db->where('id', $pasien->id_user);
            $this->db->delete('user');
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}