<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dokter extends CI_Controller
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

        $this->load->model('Dokter_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword', TRUE);
        $spesialis = $this->input->get('spesialis', TRUE);

        $data['title'] = 'Data Dokter';
        $data['subtitle'] = 'Kelola daftar dokter dan spesialis yang tersedia.';
        $data['active'] = 'dokter';

        $data['button_url'] = 'admin/dokter/tambah';
        $data['button_text'] = 'Tambah Dokter';
        $data['button_icon'] = 'fa-solid fa-plus';

        $data['keyword_filter'] = $keyword;
        $data['spesialis_filter'] = $spesialis;

        $data['list_spesialis'] = $this->Dokter_model->get_spesialis();
        $data['dokter'] = $this->Dokter_model->get_all($keyword, $spesialis);

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/dokter', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Dokter';
        $data['mode'] = 'tambah';
        $data['dokter'] = null;

        $this->load->view('admin/dokter_form', $data);
    }

    public function simpan()
    {
        $nama_dokter = $this->input->post('nama_dokter', TRUE);
        $spesialis = $this->input->post('spesialis', TRUE);

        if (empty($nama_dokter) || empty($spesialis)) {
            $this->session->set_flashdata('error', 'Nama dokter dan spesialis wajib diisi.');
            redirect('admin/dokter/tambah');
        }

        $data = [
            'nama_dokter' => $nama_dokter,
            'spesialis' => $spesialis
        ];

        $this->Dokter_model->simpan($data);

        $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan.');
        redirect('admin/dokter');
    }

    public function edit($id_dokter)
    {
        $dokter = $this->Dokter_model->get_by_id($id_dokter);

        if (!$dokter) {
            $this->session->set_flashdata('error', 'Data dokter tidak ditemukan.');
            redirect('admin/dokter');
        }

        $data['title'] = 'Edit Dokter';
        $data['mode'] = 'edit';
        $data['dokter'] = $dokter;

        $this->load->view('admin/dokter_form', $data);
    }

    public function update($id_dokter)
    {
        $nama_dokter = $this->input->post('nama_dokter', TRUE);
        $spesialis = $this->input->post('spesialis', TRUE);

        if (empty($nama_dokter) || empty($spesialis)) {
            $this->session->set_flashdata('error', 'Nama dokter dan spesialis wajib diisi.');
            redirect('admin/dokter/edit/' . $id_dokter);
        }

        $data = [
            'nama_dokter' => $nama_dokter,
            'spesialis' => $spesialis
        ];

        $this->Dokter_model->update($id_dokter, $data);

        $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui.');
        redirect('admin/dokter');
    }

    public function hapus($id_dokter)
    {
        $this->Dokter_model->hapus($id_dokter);

        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus.');
        redirect('admin/dokter');
    }
}