<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pasien extends CI_Controller
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

        $this->load->model('Pasien_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword', TRUE);

        $data['title'] = 'Data Pasien';
        $data['subtitle'] = 'Kelola data pasien yang sudah terdaftar di sistem.';
        $data['active'] = 'pasien';

        $data['button_url'] = 'admin/pasien/tambah';
        $data['button_text'] = 'Tambah Pasien';
        $data['button_icon'] = 'fa-solid fa-plus';

        $data['keyword_filter'] = $keyword;
        $data['pasien'] = $this->Pasien_model->get_all_admin($keyword);

        $this->load->view('templates/admin/admin_header', $data);
        $this->load->view('templates/admin/admin_sidebar', $data);
        $this->load->view('templates/admin/admin_topbar', $data);
        $this->load->view('admin/pasien', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    public function dashboard()
    {
        if ($this->session->userdata('login') != TRUE || $this->session->userdata('role') != 'pasien') {
            redirect('pasien/login');
        }

        $data['title'] = 'Dashboard Pasien';
        $data['active'] = 'dashboard';

        $this->load->view('templates/pasien/pasien_header', $data);
        $this->load->view('templates/pasien/pasien_navbar', $data);
        $this->load->view('pasien/dashboard', $data);
        $this->load->view('templates/pasien/pasien_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pasien';
        $data['mode'] = 'tambah';
        $data['pasien'] = null;

        $this->load->view('admin/pasien_form', $data);
    }

    public function simpan()
    {
        $nama_pasien = $this->input->post('nama_pasien', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $no_telepon = $this->input->post('no_telepon', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        if (empty($nama_pasien) || empty($tanggal_lahir) || empty($alamat) || empty($no_telepon) || empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi.');
            redirect('admin/pasien/tambah');
        }

        if ($this->Pasien_model->cek_username($username)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan.');
            redirect('admin/pasien/tambah');
        }

        $data_user = [
            'username' => $username,
            'password' => md5($password),
            'role' => 'pasien'
        ];

        $data_pasien = [
            'nama_pasien' => $nama_pasien,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];

        $this->Pasien_model->register($data_user, $data_pasien);

        $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan.');
        redirect('admin/pasien');
    }

    public function edit($id_pasien)
    {
        $pasien = $this->Pasien_model->get_by_id_admin($id_pasien);

        if (!$pasien) {
            $this->session->set_flashdata('error', 'Data pasien tidak ditemukan.');
            redirect('admin/pasien');
        }

        $data['title'] = 'Edit Pasien';
        $data['mode'] = 'edit';
        $data['pasien'] = $pasien;

        $this->load->view('admin/pasien_form', $data);
    }

    public function update($id_pasien)
    {
        $pasien_lama = $this->Pasien_model->get_by_id_admin($id_pasien);

        if (!$pasien_lama) {
            $this->session->set_flashdata('error', 'Data pasien tidak ditemukan.');
            redirect('admin/pasien');
        }

        $nama_pasien = $this->input->post('nama_pasien', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $no_telepon = $this->input->post('no_telepon', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        if (empty($nama_pasien) || empty($tanggal_lahir) || empty($alamat) || empty($no_telepon) || empty($username)) {
            $this->session->set_flashdata('error', 'Data wajib diisi.');
            redirect('admin/pasien/edit/' . $id_pasien);
        }

        if ($this->Pasien_model->cek_username_except($username, $pasien_lama->id_user)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan oleh akun lain.');
            redirect('admin/pasien/edit/' . $id_pasien);
        }

        $data_user = [
            'username' => $username,
            'role' => 'pasien'
        ];

        if (!empty($password)) {
            $data_user['password'] = md5($password);
        }

        $data_pasien = [
            'nama_pasien' => $nama_pasien,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];

        $this->Pasien_model->update_admin($id_pasien, $data_user, $data_pasien);

        $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui.');
        redirect('admin/pasien');
    }

    public function hapus($id_pasien)
    {
        $this->Pasien_model->hapus_admin($id_pasien);

        $this->session->set_flashdata('success', 'Data pasien berhasil dihapus.');
        redirect('admin/pasien');
    }
}