<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {

        $data['title'] = 'Dashboard Mahasiswa';

        $email = $this->session->userdata('email');

        $this->db->select('tabel_user.*, tabel_role.role');
        $this->db->from('tabel_user');
        $this->db->join('tabel_role', 'tabel_user.role_id = tabel_role.id');
        $this->db->where('tabel_user.email', $email);
        $data['user'] = $this->db->get()->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('template/footer');
    }
}
