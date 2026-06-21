<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function total_pasien()
    {
        return $this->db->count_all('pasien');
    }

    public function total_dokter()
    {
        return $this->db->count_all('dokter');
    }

    public function total_pendaftaran()
    {
        return $this->db->count_all('pendaftaran');
    }

    public function total_proses()
    {
        return $this->db->where('status', 'Dalam Proses')
                        ->count_all_results('pendaftaran');
    }

    public function total_disetujui()
    {
        return $this->db->where('status', 'Disetujui')
                        ->count_all_results('pendaftaran');
    }

    public function total_ditolak()
    {
        return $this->db->where('status', 'Ditolak')
                        ->count_all_results('pendaftaran');
    }

    public function get_latest_pendaftaran($limit = 5)
    {
        $this->db->select('
            pendaftaran.*,
            pasien.nama_pasien,
            dokter.nama_dokter,
            dokter.spesialis
        ');
        $this->db->from('pendaftaran');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->order_by('pendaftaran.tanggal_daftar', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }
}