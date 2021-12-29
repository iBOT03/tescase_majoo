<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DashboardModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    // Function for get total rows admin
    public function count_admin()
    {
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
 
    // Function for get total rows supplier
    public function count_supplier()
    {
        $query = $this->db->get('tb_supplier');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
 
    // Function for get total rows transaction
    public function count_trans()
    {
        $query = $this->db->get('tb_transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
 
    // Function for get total rows produk
    public function count_product()
    {
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}