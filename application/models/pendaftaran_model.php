<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    public function get_dokter()
    {
        return $this->db->get('dokter')->result();
    }

    public function simpan($data)
    {
        return $this->db->insert('pendaftaran', $data);
    }

    public function get_by_pasien($id_pasien)
    {
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->where('pendaftaran.id_pasien', $id_pasien);
        $this->db->order_by('pendaftaran.tanggal_daftar', 'DESC');

        return $this->db->get()->result();
    }

    // DATA PENDAFTARAN UNTUK ADMIN + FILTER STATUS
    public function get_all_admin($status = null)
    {
        $this->db->select('
            pendaftaran.*,
            pasien.nama_pasien,
            pasien.tanggal_lahir,
            pasien.alamat,
            pasien.no_telepon,
            dokter.nama_dokter,
            dokter.spesialis
        ');
        $this->db->from('pendaftaran');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');

        if (!empty($status)) {
            $this->db->where('pendaftaran.status', $status);
        }

        $this->db->order_by('pendaftaran.tanggal_daftar', 'DESC');

        return $this->db->get()->result();
    }

    public function update_status($id_pendaftaran, $status)
    {
        $this->db->where('id_pendaftaran', $id_pendaftaran);

        return $this->db->update('pendaftaran', [
            'status' => $status
        ]);
    }

    public function get_by_id($id_pendaftaran)
    {
        return $this->db->get_where('pendaftaran', [
            'id_pendaftaran' => $id_pendaftaran
        ])->row();
    }

    // DATA JADWAL PASIEN UNTUK ADMIN
    public function get_jadwal_admin($tanggal = null, $status = null, $id_dokter = null)
    {
        $this->db->select('
            pendaftaran.*,
            pasien.nama_pasien,
            pasien.no_telepon,
            dokter.nama_dokter,
            dokter.spesialis
        ');
        $this->db->from('pendaftaran');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');

        if (!empty($tanggal)) {
            $this->db->where('pendaftaran.tanggal_kunjungan', $tanggal);
        }

        if (!empty($status)) {
            $this->db->where('pendaftaran.status', $status);
        }

        if (!empty($id_dokter)) {
            $this->db->where('pendaftaran.id_dokter', $id_dokter);
        }

        $this->db->order_by('pendaftaran.tanggal_kunjungan', 'ASC');
        $this->db->order_by('pendaftaran.jam_kunjungan', 'ASC');

        return $this->db->get()->result();
    }

    // DATA LAPORAN + FILTER TANGGAL
    public function get_laporan_admin($tgl_awal = null, $tgl_akhir = null)
    {
        $this->db->select('
            pendaftaran.*,
            pasien.nama_pasien,
            pasien.tanggal_lahir,
            pasien.no_telepon,
            dokter.nama_dokter,
            dokter.spesialis
        ');
        $this->db->from('pendaftaran');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');

        if (!empty($tgl_awal)) {
            $this->db->where('pendaftaran.tanggal_daftar >=', $tgl_awal . ' 00:00:00');
        }

        if (!empty($tgl_akhir)) {
            $this->db->where('pendaftaran.tanggal_daftar <=', $tgl_akhir . ' 23:59:59');
        }

        $this->db->order_by('pendaftaran.tanggal_daftar', 'DESC');

        return $this->db->get()->result();
    }

    public function total_laporan($status = null, $tgl_awal = null, $tgl_akhir = null)
    {
        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        if (!empty($tgl_awal)) {
            $this->db->where('tanggal_daftar >=', $tgl_awal . ' 00:00:00');
        }

        if (!empty($tgl_akhir)) {
            $this->db->where('tanggal_daftar <=', $tgl_akhir . ' 23:59:59');
        }

        return $this->db->count_all_results('pendaftaran');
    }

    
}