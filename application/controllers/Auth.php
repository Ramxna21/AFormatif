<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Akun_model', 'akun_model');
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        $this->load->view('auth/login');
    }

    public function action_login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() === false) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $user = $this->akun_model->getakun($username);

            if ($user && md5($password) === $user->password) {
                $this->session->set_userdata([
                    'username'  => $user->username,
                    'logged_in' => true
                ]);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah.');
                redirect('auth');
            }
        }
    }

    // Tampilkan form reset password
    public function reset_password()
    {
        $this->load->view('auth/reset_password');
    }

    // Proses reset password
    public function reset_password_action()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm  = $this->input->post('confirm_password');

        // Cek apakah username terdaftar
        $user = $this->db->get_where('users', ['username' => $username])->row();

        if (!$user) {
            $this->session->set_flashdata('error', 'Username tidak ditemukan.');
            redirect('auth/reset_password');
        }

        // Validasi password dan confirm password
        if ($password != $confirm) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak cocok.');
            redirect('auth/reset_password');
        }

        // Simpan password baru (gunakan hashing untuk keamanan)
        $this->db->where('username', $username);
        $this->db->update('users', ['password' => password_hash($password, PASSWORD_DEFAULT)]);

        $this->session->set_flashdata('success', 'Password berhasil diubah. Silakan login kembali.');
        redirect('auth');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}


