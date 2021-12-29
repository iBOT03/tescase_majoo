<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/TransaksiModel');
        cek_session();
    }

    /* FUNCTION INDEX TRANSACTION
	* ----------------------------------------
    * GET: id_transaksi, nama_cust, created_at, dll.
    * Table: tb_transaksi
	* View: admin/transaksi
	*
	*/
    public function index()
    {
        $data['transaksi'] = $this->TransaksiModel->read();
        $data['sum'] = $this->TransaksiModel->sum();
        // var_dump($data);
        $this->load->view('admin/transaksi/transaksi', $data);
    }

    /* FUNCTION INDEX LAPORAN
	* ----------------------------------------
    * GET: id_transaksi, nama_cust, created_at, dll.
    * Table: tb_transaksi
	* View: admin/transaksi
	*
	*/
    public function laporan()
    {
        $data['transaksi'] = $this->TransaksiModel->read();
        $data['sum'] = $this->TransaksiModel->sum();
        // var_dump($data);
        $this->load->view('admin/transaksi/laporan', $data);
    }

    /* FUNCTION CETAK TRANSACTION
	* ----------------------------------------
    * GET: id_transaksi, nama_cust, created_at, dll.
    * Table: tb_transaksi
	* View: admin/cetak
	*
	*/
    public function cetak($id = null)
    {
        $data['transaksi'] = $this->TransaksiModel->detail($id);
        $this->load->view('admin/transaksi/cetak', $data);
    }

    /* FUNCTION UPDATE TRANSACTION
	* ----------------------------------------
	* GET: relation from tb_transaksi and tb_produk
	* Table: tb_transaksi, tb_produk
	* View: admin/transaksi/edit
	* Validation: nama_cust, nohp, alamat, harga, bayar
	* Data Array: id_transaksi, id_produk, nama_cust, nohp_cust, alamat_cust, grand_total, bayar, kembali, status_trans, created_at, updated_at
	*
	*/
    public function update($id = null)
    {
        $this->form_validation->set_rules('nama_cust', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|numeric|min_length[11]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('bayar', 'Pembayaran', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Grand Total', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['transaksi'] = $this->TransaksiModel->detail($id);
            $this->load->view('admin/transaksi/edit', $data);
        } else {
            if ($this->input->method() == "post") {
                $update = $this->TransaksiModel->update(array(
                    'id_transaksi'      => $this->input->post('id_transaksi'),
                    'id_produk'         => $this->input->post('id_produk'),
                    'nama_cust'         => $this->input->post('nama_cust'),
                    'nohp_cust'         => $this->input->post('nohp'),
                    'alamat_cust'       => $this->input->post('alamat'),
                    'grand_total'       => $this->input->post('harga'),
                    'bayar'             => $this->input->post('bayar'),
                    'kembali'           => $this->input->post('kembali'),
                    'status_trans'      => 1,
                    'created_at'        => $this->input->post('created_at'),
                    'updated_at'        => date('Y-m-d H:s:i')
                ), $id);
                if ($update) {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat, </strong>data berhasil diperbaharui !
                    </div>'
                    );
                    redirect('admin/Transaksi');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Maaf, </strong>data gagal diperbaharui !
                    </div>'
                    );
                    redirect('admin/Transaksi');
                }
            }
        }
    }
}
