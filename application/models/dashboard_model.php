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
        $this->db->where('status', 'Dalam Proses');
        return $this->db->count_all_results('pendaftaran');
    }

    public function total_disetujui()
    {
        $this->db->where('status', 'Disetujui');
        return $this->db->count_all_results('pendaftaran');
    }

    public function total_ditolak()
    {
        $this->db->where('status', 'Ditolak');
        return $this->db->count_all_results('pendaftaran');
    }
}