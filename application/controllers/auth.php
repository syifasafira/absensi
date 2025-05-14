<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Pages';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/template/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tabel_user', ['email' => $email])->row_array();
        //user ada
        if ($user) {
            //user aktif
            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    // if ($password === $user['password']) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']

                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('dosen');
                    } elseif ($user['role_id'] == 3) {
                        redirect('mahasiswa');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                wrong password!
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             This email has not been activated!
             </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Email is not registered!
         </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tabel_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/template/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'id' => $this->generate_uuid(),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 0
            ];

            // Gunakan base64url_encode agar token aman di URL
            $token = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tabel_user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! Your account has been created. Please verify your email to activate your account.
            </div>');
            redirect('auth');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.gmail.com',
            'smtp_user'   => 'syifasafira427@gmail.com',
            'smtp_pass'   => 'empc qheh rlim mtwj', // app password Gmail
            'smtp_port'   => 587,
            'smtp_crypto' => 'tls',
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'wordwrap'    => true,
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('syifasafira427@gmail.com', 'Absensi Digital');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account: 
                <a href="' . base_url('auth/verify?email=' . urlencode($this->input->post('email')) . '&token=' . urlencode($token)) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password: 
                <a href="' . base_url('auth/resetpassword?email=' . urlencode($this->input->post('email')) . '&token=' . urlencode($token)) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            return false;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tabel_user', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', [
                'email' => $email,
                'token' => $token
            ])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < 60 * 60 * 24) { //token expired dalam 24 jam
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tabel_user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        ' . $email . ' has been activated. Please login.
                    </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('tabel_user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Activation failed. Token expired.
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Activation failed. Invalid token.
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Activation failed. Wrong email.
            </div>');
            redirect('auth');
        }
    }



    public function register2()
    {
        $data['title'] = 'Registration';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/register');
        $this->load->view('auth/template/footer');
    }
    private function generate_uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    // public function ForgotPassword()
    // {
    //     $data['title'] = 'Forgot Password';
    //     $this->load->view('auth/template/header', $data);
    //     $this->load->view('auth/forgot-password');
    //     $this->load->view('auth/template/footer');
    // }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       you have been logged out! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/404-page');
    }

    public function ForgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('auth/template/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tabel_user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Please check your email to reset your password!
            </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered or activated!
            </div>');
                redirect('auth/forgotpassword');
            }
        }
    }
}


public function resetPassword()
{
   $email = $this->input->get('email');
   $token=$this->input->get('token'); 

   $user = $this->db->db->get_where('user',=>['$email'])->row_array();

   if($user) {

   
   } else {
    
   }
}
