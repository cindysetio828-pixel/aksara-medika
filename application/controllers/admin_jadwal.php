<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_jadwal extends CI_Controller
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
        $tanggal = $this->input->get('tanggal', TRUE);
        $status = $this->input->get('status', TRUE);
        $id_dokter = $this->input->get('id_dokter', TRUE);

        $data['title'] = 'Jadwal Pasien';
        $data['subtitle'] = 'Lihat jadwal kunjungan pasien berdasarkan tanggal, dokter, dan status.';
        $data['active'] = 'jadwal';

        $data['tanggal_filter'] = $tanggal;
        $data['status_filter'] = $status;
        $data['dokter_filter'] = $id_dokter;

        $data['dokter'] = $this->Pendaftaran_model->get_dokter();
        $data['jadwal'] = $this->Pendaftaran_model->get_jadwal_admin($tanggal, $status, $id_dokter);

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/admin/admin_footer');
    }
}