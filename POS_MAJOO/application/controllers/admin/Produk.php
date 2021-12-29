<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/ProdukModel');
		$this->load->library('upload');
		cek_session();
	}

	/* FUNCTION INDEX PRODUCT
	* ----------------------------------------
    * GET: id_produk, nama_produk, id_supplier, deskripsi, dll.
    * Table: tb_produk
	* View: admin/product
	*
	*/
	public function index()
	{
		$data['produk'] = $this->ProdukModel->readProduk();
		$this->load->view('admin/product/produk', $data);
	}

	/* FUNCTION CREATE PRODUCT
	* ----------------------------------------
	* GET: id_supplier
	* Table: tb_produk, tb_supplier
	* View: admin/product/tambah
	* Validation: nama_produk, supplier, deskripsi, harga, foto
	* Data Array: id_produk, id_supplier, nama_produk, foto, harga, deskripsi, status, created_at, updated_at
	*
	*/
	public function create()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim|max_length[100]|is_unique[tb_produk.nama_produk]');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('foto', 'Foto Produk', 'trim');

		if ($this->form_validation->run() == false) {
			$data['supplier'] = $this->ProdukModel->getSupplier();
			$this->load->view('admin/product/tambah', $data);
		} else {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads/foto_produk/';

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data('file_name');
				$dataPost = array(
					'id_produk'		=> '',
					'id_supplier'	=> $this->input->post('supplier'),
					'nama_produk'	=> $this->input->post('nama_produk'),
					'foto'			=> $foto,
					'harga'			=> $this->input->post('harga'),
					'deskripsi'		=> $this->input->post('deskripsi'),
					'status'		=> 1,
					'created_at'	=> date('Y-m-d H:i:s'),
					'updated_at'	=> date('Y-m-d H:i:s')
				);
				if ($this->ProdukModel->create($dataPost)) {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Selamat, </strong>produk berhasil ditambahkan !
						</div>'
					);
					redirect('admin/Produk');
				} else {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Maaf, </strong>produk gagal ditambahkan !
						</div>'
					);
					redirect('admin/Produk');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
						. $this->upload->display_errors() .
						'</div>'
				);
				redirect('admin/Produk');
			}
		}
	}

	/* FUNCTION DELETE PRODUCT
	* ----------------------------------------
	* DELETE : delete produk where id_produk = $id
	* Table: tb_produk
	*
	*/
	public function delete($id)
	{
		$delete = $this->ProdukModel->deleteProduk($id);
		if ($delete) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Selamat, </strong>data berhasil dihapus !
                </div>'
			);
			redirect('admin/Produk');
		} else {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Maaf, </strong>data gagal dihapus !
                </div>'
			);
			redirect('admin/Produk');
		}
	}

	/* FUNCTION UPDATE PRODUCT
	* ----------------------------------------
	* GET: relation from tb_user and tb_supplier
	* Table: tb_produk, tb_supplier
	* View: admin/product/edit
	* Validation: nama_produk, supplier, deskripsi, harga, foto
	* Data Array: id_produk, id_supplier, nama_produk, foto, harga, deskripsi, status, created_at, updated_at
	*
	*/
	public function update($id = null)
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('foto', 'Foto Produk', 'trim');

		if ($this->form_validation->run() == false) {
			$data["supplier"]	 = $this->ProdukModel->detail($id);
			$data["row"]		 = $this->ProdukModel->getSup($id);
			$data["data"]		 = $this->ProdukModel->getDetail($id);
			// var_dump($datas);
			$this->load->view('admin/product/edit', $data);
		} else {
			$update = $this->ProdukModel->updateProduk(array(
				'id_produk'		=> $this->input->post('id_produk'),
				'id_supplier'	=> $this->input->post('supplier'),
				'nama_produk'	=> $this->input->post('nama_produk'),
				'deskripsi'		=> $this->input->post('deskripsi'),
				'harga'			=> $this->input->post('harga'),
				'status'		=> 1,
				'created_at'	=> $this->input->post('created_at'),
				'updated_at'	=> date('Y-m-d H:i:s')
			), $id);

			if ($update) {
				$ubahfoto = $_FILES['foto']['name'];
				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']		 = '2048';
					$config['upload_path'] 	 = './uploads/foto_produk/';
					$config['file_name'] 	 = $ubahfoto;

					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto')) {
						$produk = $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
						$fotolama = $produk['foto'];
						if ($fotolama) {
							unlink(FCPATH . './uploads/foto_produk/' . $fotolama);
						}
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('foto', $fotobaru);
						$this->db->where('id_produk', $id);
						$this->db->update('tb_produk');
					} else {
						$this->session->set_flashdata(
							'pesan',
							'<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
								. $this->upload->display_errors() .
							'</div>'
						);
						redirect('admin/Produk');
					}
				}
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Selamat, </strong>data berhasil diperbaharui !
                </div>'
				);
				redirect('admin/Produk');
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Selamat, </strong>data gagal diperbaharui !
                </div>'
				);
				redirect('admin/Produk');
			}
		}
	}

	/* FUNCTION DETAIL PRODUCT
	* ----------------------------------------
	* GET: id_produk, nama_produk, foto, dll.
	* Table: tb_produk
	* View: admin/product/detail
	*
	*/
	public function detail($id)
	{
		$data['produk'] = $this->ProdukModel->detail($id);

		if (isset($_POST['on'])) {
			$this->ProdukModel->active($id);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Selamat, </strong>akun berhasil diaktifkan !
				</div>'
			);
			redirect('admin/Produk');
		} elseif (isset($_POST['off'])) {
			$this->ProdukModel->nonActive($id);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Selamat, </strong>akun berhasil dinon-aktifkan !
				</div>'
			);
			redirect('admin/Produk');
		}
		$this->load->view('admin/product/detail', $data);
	}
}
