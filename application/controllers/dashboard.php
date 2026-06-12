<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['subtitle'] = 'Selamat datang di sistem pendaftaran pasien Aksara Medika.';
        $data['active'] = 'dashboard';

        $data['total_pasien'] = $this->Dashboard_model->total_pasien();
        $data['total_dokter'] = $this->Dashboard_model->total_dokter();
        $data['total_pendaftaran'] = $this->Dashboard_model->total_pendaftaran();
        $data['total_proses'] = $this->Dashboard_model->total_proses();
        $data['total_disetujui'] = $this->Dashboard_model->total_disetujui();
        $data['total_ditolak'] = $this->Dashboard_model->total_ditolak();

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin/admin_footer');
    }
}