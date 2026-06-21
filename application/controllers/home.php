<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $data['title'] = 'Home Pasien';
        $data['subtitle'] = 'Selamat datang di Home pasien Aksara Medika.';
        $data['active'] = 'home';

        $this->load->view('templates/pasien/pasien_header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('templates/pasien/pasien_footer');
    }
}