<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/UserModel');
		$this->load->library('upload');
		cek_session();
	}

	/* FUNCTION INDEX ADMIN
	* ----------------------------------------
	* GET Session userdata
    * GET: id_user, nama user, email, alamat, dll.
    * Table: tb_user
	* View: administrator
	*
	*/
	public function index()
	{
		$data['admin'] = $this->UserModel->readAdmin();
		$this->load->view('admin/administrator/administrator', $data);
	}

	/* FUNCTION CREATE AKUN ADMIN
	* ----------------------------------------
	* GET Session userdata
	* GET: id, email, nama, dll.
	* Table: tb_user
	* View: admin/administrator
	* Validation: nama, email, foto, alamat, password1, password2
	* Data Array: id_user, nama, email, foto, password, status, role, alamat, created_at, updated_at
	*
	*/
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('foto', 'Foto Profile', 'trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|max_length[100]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/administrator/tambah');
		} else {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads/foto_user/';

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data('file_name');
				$dataPost = array(
					'id_user'		=> '',
					'nama'			=> $this->input->post('nama'),
					'email'			=> $this->input->post('email'),
					'foto'			=> $foto,
					'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'status'		=> 1,
					'alamat'		=> $this->input->post('alamat'),
					'created_at'	=> date('Y-m-d H:i:s'),
					'updated_at'	=> date('Y-m-d H:i:s')
				);
				if ($this->UserModel->create($dataPost)) {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Selamat, </strong>akun berhasil ditambahkan !
						</div>'
					);
					redirect('admin/Admin');
				} else {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Maaf, </strong>akun gagal ditambahkan !
						</div>'
					);
					redirect('admin/Admin');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						' . $this->upload->display_errors() . '
					</div>'
				);
				redirect('admin/Admin');
			}
		}
	}

	/* FUNCTION DETAIL AKUN ADMIN
	* ----------------------------------------
	* GET Session userdata
	* GET: id, email, nama, dll.
	* Table: tb_user
	* View: admin/detail
	*
	*/
	public function detail($id)
	{
		$data['user'] = $this->UserModel->detail($id);

		if (isset($_POST['on'])) {
			$this->UserModel->active($id);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Selamat, </strong>akun berhasil diaktifkan !
				</div>'
			);
			redirect('admin/Admin');
		} elseif (isset($_POST['off'])) {
			$this->UserModel->nonActive($id);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Selamat, </strong>akun berhasil dinon-aktifkan !
				</div>'
			);
			redirect('admin/Admin');
		}
		$this->load->view('admin/administrator/detail', $data);
	}
}
