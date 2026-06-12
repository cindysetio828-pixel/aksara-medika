<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pendaftaran extends CI_Controller
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
        $status = $this->input->get('status', TRUE);

        $data['title'] = 'Data Pendaftaran Pasien';
        $data['subtitle'] = 'Kelola data pendaftaran pasien, setujui, atau tolak pendaftaran berobat.';
        $data['active'] = 'pendaftaran';

        $data['status_filter'] = $status;
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_admin($status);

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/pendaftaran', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    public function setujui($id_pendaftaran)
    {
        $cek = $this->Pendaftaran_model->get_by_id($id_pendaftaran);

        if (!$cek) {
            $this->session->set_flashdata('error', 'Data pendaftaran tidak ditemukan.');
            redirect('admin/pendaftaran');
        }

        $this->Pendaftaran_model->update_status($id_pendaftaran, 'Disetujui');

        $this->session->set_flashdata('success', 'Pendaftaran pasien berhasil disetujui.');
        redirect('admin/pendaftaran');
    }

    public function tolak($id_pendaftaran)
    {
        $cek = $this->Pendaftaran_model->get_by_id($id_pendaftaran);

        if (!$cek) {
            $this->session->set_flashdata('error', 'Data pendaftaran tidak ditemukan.');
            redirect('admin/pendaftaran');
        }

        $this->Pendaftaran_model->update_status($id_pendaftaran, 'Ditolak');

        $this->session->set_flashdata('success', 'Pendaftaran pasien berhasil ditolak.');
        redirect('admin/pendaftaran');
    }
}