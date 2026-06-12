<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
    public function get_all($keyword = null, $spesialis = null)
    {
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('nama_dokter', $keyword);
            $this->db->or_like('spesialis', $keyword);
            $this->db->group_end();
        }

        if (!empty($spesialis)) {
            $this->db->where('spesialis', $spesialis);
        }

        $this->db->order_by('id_dokter', 'DESC');
        return $this->db->get('dokter')->result();
    }

    public function get_spesialis()
    {
        $this->db->select('spesialis');
        $this->db->from('dokter');
        $this->db->where('spesialis !=', '');
        $this->db->group_by('spesialis');
        $this->db->order_by('spesialis', 'ASC');

        return $this->db->get()->result();
    }

    public function get_by_id($id_dokter)
    {
        return $this->db->get_where('dokter', ['id_dokter' => $id_dokter])->row();
    }

    public function simpan($data)
    {
        return $this->db->insert('dokter', $data);
    }

    public function update($id_dokter, $data)
    {
        $this->db->where('id_dokter', $id_dokter);
        return $this->db->update('dokter', $data);
    }

    public function hapus($id_dokter)
    {
        $this->db->where('id_dokter', $id_dokter);
        return $this->db->delete('dokter');
    }
}