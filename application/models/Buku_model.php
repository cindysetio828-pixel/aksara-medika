<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    private $table = 'buku';

    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_buku' => $id]);
    }

    public function update($id, $data)
    {
        $this->db->where('id_buku', $id);
        return $this->db->update($this->table, $data);
    }
}