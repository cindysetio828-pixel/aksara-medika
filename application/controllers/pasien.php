<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('Pasien_model');
        $this->load->model('Pendaftaran_model');
    }

    public function register()
    {
        if ($this->session->userdata('login') == TRUE && $this->session->userdata('role') == 'pasien') {
            redirect('pasien/dashboard');
        }

        $this->load->view('pasien/register');
    }

    public function simpan_register()
    {
        $nama_pasien   = $this->input->post('nama_pasien', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $alamat        = $this->input->post('alamat', TRUE);
        $no_telepon    = $this->input->post('no_telepon', TRUE);
        $username      = $this->input->post('username', TRUE);
        $password      = $this->input->post('password', TRUE);
        $konfirmasi    = $this->input->post('konfirmasi_password', TRUE);

        if (
            empty($nama_pasien) ||
            empty($tanggal_lahir) ||
            empty($alamat) ||
            empty($no_telepon) ||
            empty($username) ||
            empty($password) ||
            empty($konfirmasi)
        ) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi.');
            redirect('pasien/register');
        }

        if ($password != $konfirmasi) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak sama.');
            redirect('pasien/register');
        }

        if ($this->Pasien_model->cek_username($username)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan.');
            redirect('pasien/register');
        }

        $data_user = [
            'username' => $username,
            'password' => md5($password),
            'role'     => 'pasien'
        ];

        $data_pasien = [
            'nama_pasien'   => $nama_pasien,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat'        => $alamat,
            'no_telepon'    => $no_telepon
        ];

        $simpan = $this->Pasien_model->register($data_user, $data_pasien);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('pasien/login');
        } else {
            $this->session->set_flashdata('error', 'Registrasi gagal. Silakan coba lagi.');
            redirect('pasien/register');
        }
    }

    public function login()
    {
        if ($this->session->userdata('login') == TRUE && $this->session->userdata('role') == 'pasien') {
            redirect('pasien/dashboard');
        }

        $this->load->view('pasien/login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi.');
            redirect('pasien/login');
        }

        $user = $this->Pasien_model->cek_login($username, $password);

        if ($user) {
            $pasien = $this->Pasien_model->get_pasien_by_user($user->id);

            if (!$pasien) {
                $this->session->set_flashdata('error', 'Data pasien tidak ditemukan.');
                redirect('pasien/login');
            }

            $session_data = [
                'id_user'      => $user->id,
                'id_pasien'    => $pasien->id_pasien,
                'username'     => $user->username,
                'nama_pasien'  => $pasien->nama_pasien,
                'role'         => $user->role,
                'login'        => TRUE
            ];

            $this->session->set_userdata($session_data);
            $this->Pasien_model->update_last_login($user->id);

            redirect('pasien/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password pasien salah.');
            redirect('pasien/login');
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('login') != TRUE) {
            redirect('pasien/login');
        }

        if ($this->session->userdata('role') != 'pasien') {
            redirect('pasien/login');
        }

        $data['title'] = 'Dashboard Pasien';
        $data['active'] = 'dashboard';

        $this->load->view('templates/pasien/pasien_header', $data);
        $this->load->view('templates/pasien/pasien_navbar', $data);
        $this->load->view('pasien/dashboard', $data);
        $this->load->view('templates/pasien/pasien_footer');
    }

    public function daftar_berobat()
    {
        if ($this->session->userdata('login') != TRUE || $this->session->userdata('role') != 'pasien') {
            redirect('pasien/login');
        }

        $data['title'] = 'Daftar Berobat';
        $data['active'] = 'daftar';
        $data['dokter'] = $this->Pendaftaran_model->get_dokter();

        $this->load->view('templates/pasien/pasien_header', $data);
        $this->load->view('templates/pasien/pasien_navbar', $data);
        $this->load->view('pasien/form_pendaftaran', $data);
        $this->load->view('templates/pasien/pasien_footer');
    }

    public function simpan_pendaftaran()
    {
        if ($this->session->userdata('login') != TRUE || $this->session->userdata('role') != 'pasien') {
            redirect('pasien/login');
        }

        $id_pasien = $this->session->userdata('id_pasien');

        $id_dokter = $this->input->post('id_dokter', TRUE);
        $keluhan = $this->input->post('keluhan', TRUE);
        $tanggal_kunjungan = $this->input->post('tanggal_kunjungan', TRUE);
        $jam_kunjungan = $this->input->post('jam_kunjungan', TRUE);

        if (empty($id_pasien)) {
            $this->session->set_flashdata('error', 'Session pasien tidak ditemukan. Silakan login ulang.');
            redirect('pasien/login');
        }

        if (empty($id_dokter) || empty($keluhan) || empty($tanggal_kunjungan) || empty($jam_kunjungan)) {
            $this->session->set_flashdata('error', 'Semua data pendaftaran wajib diisi.');
            redirect('pasien/daftar-berobat');
        }

        $hari_ini = date('Y-m-d');

        if ($tanggal_kunjungan < $hari_ini) {
            $this->session->set_flashdata('error', 'Tanggal kunjungan tidak boleh tanggal yang sudah lewat.');
            redirect('pasien/daftar-berobat');
        }

        $tanggal_jam_kunjungan = $tanggal_kunjungan . ' ' . $jam_kunjungan . ':00';

        if ($tanggal_kunjungan == $hari_ini && strtotime($tanggal_jam_kunjungan) < time()) {
            $this->session->set_flashdata('error', 'Jam kunjungan tidak boleh lebih awal dari waktu sekarang.');
            redirect('pasien/daftar-berobat');
        }

        $data = [
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter,
            'keluhan' => $keluhan,
            'tanggal_kunjungan' => $tanggal_kunjungan,
            'jam_kunjungan' => $jam_kunjungan,
            'status' => 'Dalam Proses'
        ];

        $simpan = $this->Pendaftaran_model->simpan($data);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Pendaftaran berhasil dikirim. Silakan cek status pendaftaran secara berkala.');
            redirect('pasien/status-pendaftaran');
        } else {
            $this->session->set_flashdata('error', 'Pendaftaran gagal disimpan. Silakan coba lagi.');
            redirect('pasien/daftar-berobat');
        }
    }

    public function status_pendaftaran()
    {
        if ($this->session->userdata('login') != TRUE || $this->session->userdata('role') != 'pasien') {
            redirect('pasien/login');
        }

        $id_pasien = $this->session->userdata('id_pasien');

        $data['title'] = 'Status Pendaftaran';
        $data['active'] = 'status';
        $data['pendaftaran'] = $this->Pendaftaran_model->get_by_pasien($id_pasien);

        $this->load->view('templates/pasien/pasien_header', $data);
        $this->load->view('templates/pasien/pasien_navbar', $data);
        $this->load->view('pasien/status_pendaftaran', $data);
        $this->load->view('templates/pasien/pasien_footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('pasien/login');
    }
}