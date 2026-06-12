<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }

        if ($this->session->userdata('role') != 'admin') {
            redirect('login');
        }

        $this->load->model('Pendaftaran_model');
    }

    public function index()
    {
        $tgl_awal = $this->input->get('tgl_awal', TRUE);
        $tgl_akhir = $this->input->get('tgl_akhir', TRUE);

        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Lihat laporan statistik dan data pendaftaran pasien.';
        $data['active'] = 'laporan';

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        $data['total_pendaftaran'] = $this->Pendaftaran_model->total_laporan(null, $tgl_awal, $tgl_akhir);
        $data['total_proses'] = $this->Pendaftaran_model->total_laporan('Dalam Proses', $tgl_awal, $tgl_akhir);
        $data['total_disetujui'] = $this->Pendaftaran_model->total_laporan('Disetujui', $tgl_awal, $tgl_akhir);
        $data['total_ditolak'] = $this->Pendaftaran_model->total_laporan('Ditolak', $tgl_awal, $tgl_akhir);

        $data['laporan'] = $this->Pendaftaran_model->get_laporan_admin($tgl_awal, $tgl_akhir);

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    public function export_csv()
    {
        $tgl_awal = $this->input->get('tgl_awal', TRUE);
        $tgl_akhir = $this->input->get('tgl_akhir', TRUE);

        $laporan = $this->Pendaftaran_model->get_laporan_admin($tgl_awal, $tgl_akhir);

        $filename = 'laporan_pendaftaran_pasien_' . date('Ymd_His') . '.csv';

        if (ob_get_length()) {
            ob_end_clean();
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, [
            'No',
            'Nama Pasien',
            'No Telepon',
            'Dokter',
            'Spesialis',
            'Keluhan',
            'Tanggal Kunjungan',
            'Jam Kunjungan',
            'Status',
            'Tanggal Daftar'
        ]);

        $no = 1;
        foreach ($laporan as $l) {
            fputcsv($output, [
                $no++,
                $l->nama_pasien,
                $l->no_telepon,
                $l->nama_dokter,
                $l->spesialis,
                $l->keluhan,
                date('d-m-Y', strtotime($l->tanggal_kunjungan)),
                date('H:i', strtotime($l->jam_kunjungan)),
                $l->status,
                date('d-m-Y H:i', strtotime($l->tanggal_daftar))
            ]);
        }

        fclose($output);
        exit;
    }

    public function export_pdf()
    {
        $tgl_awal = $this->input->get('tgl_awal', TRUE);
        $tgl_akhir = $this->input->get('tgl_akhir', TRUE);

        $data['title'] = 'Laporan Pendaftaran Pasien';
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        $data['total_pendaftaran'] = $this->Pendaftaran_model->total_laporan(null, $tgl_awal, $tgl_akhir);
        $data['total_proses'] = $this->Pendaftaran_model->total_laporan('Dalam Proses', $tgl_awal, $tgl_akhir);
        $data['total_disetujui'] = $this->Pendaftaran_model->total_laporan('Disetujui', $tgl_awal, $tgl_akhir);
        $data['total_ditolak'] = $this->Pendaftaran_model->total_laporan('Ditolak', $tgl_awal, $tgl_akhir);

        $data['laporan'] = $this->Pendaftaran_model->get_laporan_admin($tgl_awal, $tgl_akhir);

        $this->load->view('admin/laporan_pdf', $data);
    }
}