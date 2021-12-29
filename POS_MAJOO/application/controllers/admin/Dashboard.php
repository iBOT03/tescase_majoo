<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/DashboardModel');
		cek_session();
    }

	/* FUNCTION INDEX DASHBOARD
	* ----------------------------------------
	* GET Session userdata
    * GET: num rows of admin, supplier, product, transaction
    * Table: tb_user, tb_supplier, tb_produk, tb_transaksi
	* View: admin/dashboard
	*
	*/
	public function index()
	{
		$data['admin'] = $this->DashboardModel->count_admin();
		$data['suplier'] = $this->DashboardModel->count_supplier();
		$data['produk'] = $this->DashboardModel->count_product();
		$data['transaksi'] = $this->DashboardModel->count_trans();
		$this->load->view('admin/dashboard', $data);
	}
}
