<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    private $table = 'anggota';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($Nomor_anggota)
    {
        return $this->db->get_where($this->table, ['Nomor_anggota' => $Nomor_anggota])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($Nomor_anggota)
    {
        return $this->db->delete($this->table, ['Nomor_anggota' => $Nomor_anggota]);
    }

    public function update($Nomor_anggota, $data)
    {
        $this->db->where('Nomor_anggota', $Nomor_anggota);
        return $this->db->update($this->table, $data);
    }

    public function is_used($Nomor_anggota)
    {
        return $this->db->where('Nomor_anggota', $Nomor_anggota)
                        ->count_all_results($this->table) > 0;
    }
}