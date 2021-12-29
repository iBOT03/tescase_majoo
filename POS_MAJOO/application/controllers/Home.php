<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CustomerModel');
        $this->load->library('form_validation');
    }

    /* FUNCTION INDEX HOME
	* ----------------------------------------
    * GET: id_produk, nama_produk, harga, foto, deskripsi
    * Table: tb_produk
	* View: home
	*
	*/
    public function index()
    {
        $data['produk'] = $this->CustomerModel->getProduk();
        $this->load->view('home', $data);
    }

    /* FUNCTION CHECKOUT PRODUCT
	* ----------------------------------------
	* GET: data produk
	* Table: tb_produk
	* View: home
	* Validation: nama, nohp, alamat, bayar
	* Data Array: id_transaksi, id_produk, nama_cust, nohp_cust, alamat_cust, grand_total, bayar, kembali, status_trans, created_at, updated_at
	*
	*/
    public function checkout()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|numeric|min_length[11]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('bayar', 'Pembayaran', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['produk'] = $this->CustomerModel->getProduk();
            $this->load->view('home', $data);
        } else {
            $dataPost = array(
                'id_transaksi'      => '',
                'id_produk'         => $this->input->post('id_produk'),
                'nama_cust'         => $this->input->post('nama'),
                'nohp_cust'         => $this->input->post('nohp'),
                'alamat_cust'       => $this->input->post('alamat'),
                'grand_total'       => $this->input->post('harga_produk'),
                'bayar'             => $this->input->post('bayar'),
                'status_trans'      => 0,
                'created_at'        => date('Y-m-d H:s:i')
            );

            if ($this->CustomerModel->create($dataPost)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Selamat, </strong>produk berhasil dipesan !
                    </div>'
                );
                redirect('Home');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Maaf, </strong>produk gagal dipesan !
                    </div>'
                );
                redirect('Home');
            }
        }
    }
}
