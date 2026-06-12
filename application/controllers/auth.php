<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
public function index()
{
    if ($this->session->userdata('login') == TRUE) {
        if ($this->session->userdata('role') == 'admin') {
            redirect('dashboard');
        } else {
            redirect('pasien/dashboard');
        }
    }

    $this->load->view('auth/login');
}

public function login()
{
    $username = $this->input->post('username', TRUE);
    $password = $this->input->post('password', TRUE);

    if (empty($username) || empty($password)) {
        $this->session->set_flashdata('error', 'Username dan password wajib diisi');
        redirect('login');
    }

    $user = $this->Auth_model->cek_login($username, $password);

    if ($user) {
        $data = array(
            'id_user'  => $user->id,
            'username' => $user->username,
            'role'     => $user->role,
            'login'    => TRUE
        );

        $this->session->set_userdata($data);
        $this->Auth_model->update_last_login($user->id);

        if ($user->role == 'admin') {
            redirect('dashboard');
        } else {
            redirect('pasien/dashboard');
        }

    } else {
        $this->session->set_flashdata('error', 'Username atau password salah');
        redirect('login');
    }
}

public function logout()
{
    $this->session->sess_destroy();
    redirect('login');
}
}