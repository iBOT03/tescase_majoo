<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    /* FUNCTION INDEX AUTH
	* ----------------------------------------
	* SET Rules form validation
	* View: admin/login
	*
	*/
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $this->_login();
        }
    }

    /* FUNCTION LOGIN AUTH
	* ----------------------------------------
	* CHECK: email (valid), status (1/active), password (valid)
	* GET: email, password, status
	* Table: tb_user
    * SET userdata
	*
	*/
    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        // $pw         = $this->db->get_where('tb_user', ['password'])->result();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nama'      => $user['nama'],
                        'email'     => $user['email'],
                        'foto'      => $user['foto']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat datang, </strong>' . $this->session->userdata('nama') . '
                    </div>'
                    );
                    redirect('admin/Dashboard');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Login gagal, </strong>harap cek kembali password anda !
                    </div>'
                    );
                    redirect('admin/Auth');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Login gagal, </strong>akun anda telah di non-aktifkan !
                    </div>'
                );
                redirect('admin/Auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Login gagal, </strong>anda tidak memiliki akses !
                </div>'
            );
            redirect('admin/Auth');
        }
    }

    /* FUNCTION LOGOUT AUTH
	* ----------------------------------------
    * UNSET/DESTROY userdata
	*
	*/
    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Selamat, </strong>anda berhasil logout. Harap login untuk melanjutkan !
            </div>'
        );
        redirect('admin/Auth');
    }
}
