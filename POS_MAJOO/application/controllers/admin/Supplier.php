<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/UserModel');
        $this->load->library('upload');
		cek_session();
    }

	/* FUNCTION INDEX SUPPLIER
	* ----------------------------------------
    * GET: id_supplier, nama_supplier, alamat
    * Table: tb_supplier
	* View: admin/supplier
	*
	*/
    public function index()
    {
        $data['supplier'] = $this->UserModel->readSupplier();
        $this->load->view('admin/supplier/supplier', $data);
    }

	/* FUNCTION CREATE SUPPLIER
	* ----------------------------------------
	* Table: tb_produk
	* View: admin/supplier/tambah
	* Validation: nama, alamat
	* Data Array: id_supplier, nama_supplier, alamat, created_at, updated_at
	*
	*/
    public function create()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/supplier/tambah');
        } else {
            $dataPost = array(
                'id_supplier'   => '',
                'nama_supplier' => $this->input->post('nama'),
                'alamat'        => $this->input->post('alamat'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            );
            if ($this->UserModel->createSupplier($dataPost)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Selamat, </strong>supplier berhasil ditambahkan !
						</div>'
                );
                redirect('admin/Supplier');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Maaf, </strong>supplier gagal ditambahkan !
						</div>'
                );
                redirect('admin/Supplier');
            }
        }
    }

	/* FUNCTION DELETE SUPPLIER
	* ----------------------------------------
	* DELETE : delete supplier where id_supplier = $id
	* Table: tb_supplier
	*
	*/
    public function delete($id)
	{
		$delete = $this->UserModel->deleteSupplier($id);
		if ($delete) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Selamat, </strong>data berhasil dihapus !
                </div>'
			);
			redirect('admin/Supplier');
		} else {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Maaf, </strong>data gagal dihapus !
                </div>'
			);
			redirect('admin/Supplier');
		}
	}

	/* FUNCTION UPDATE SUPPLIER
	* ----------------------------------------
	* Table: tb_supplier
	* View: admin/supplier/edit
	* Validation: nama, alamat
	* Data Array: id_supplier, nama_supplier, alamat, created_at, updated_at
	*
	*/
    public function update($id = null)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');

		if ($this->form_validation->run() == false) {
			$data["supplier"] = $this->UserModel->detailSupplier($id);
			$this->load->view('admin/Supplier/edit', $data);
		} else {
			if ($this->input->method() == "post") {
				$update = $this->UserModel->updateSupplier(array(
					'id_supplier'		=> $this->input->post('id_supplier'),
					'nama_supplier'		=> $this->input->post('nama'),
					'alamat'		    => $this->input->post('alamat'),
					'created_at'		=> $this->input->post('created_at'),
					'updated_at'		=> date('Y-m-d H:i:s')
				), $id);
				if ($update) {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-success alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Selamat,</strong> data berhasil diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
					);
					redirect('admin/Supplier');
				} else {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Maaf,</strong> data gagal diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
					);
					redirect('admin/Supplier');
				}
			}
		}
	}
}
