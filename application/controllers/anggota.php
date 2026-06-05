<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'Nomor_anggota'  => $this->input->post('Nomor_anggota'),
            'Nama'           => $this->input->post('Nama'),
            'Alamat'         => $this->input->post('Alamat'),
            'Telepon'        => $this->input->post('Telepon'),
            'Email'          => $this->input->post('Email'),
            'Tanggal_daftar' => $this->input->post('Tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->insert($data);
        redirect('anggota');
    }

    public function hapus($Nomor_anggota)
    {
        $this->anggota_model->delete($Nomor_anggota);
        redirect('anggota');
    }

    public function edit($Nomor_anggota)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($Nomor_anggota);

        if(!$data['anggota']){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($Nomor_anggota)
    {
        $data = [
            'Nama'           => $this->input->post('Nama'),
            'Alamat'         => $this->input->post('Alamat'),
            'Telepon'        => $this->input->post('Telepon'),
            'Email'          => $this->input->post('Email'),
            'Tanggal_daftar' => $this->input->post('Tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->update($Nomor_anggota, $data);
        redirect('anggota');
    }

    public function cetak_anggota()
    {
    $data['data'] = $this->db->get('anggota')->result();

    $this->load->view('laporan/cetak_anggota', $data);
    }
}