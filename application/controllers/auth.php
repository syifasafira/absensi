<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $data['title'] = 'Login Pages';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/login');
        $this->load->view('auth/template/footer');
    }
    public function register()
    {
        $data['title'] = 'Registration';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/register');
        $this->load->view('auth/template/footer');
    }
    public function ForgotPassword()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/forgot-password');
        $this->load->view('auth/template/footer');
    }
}
