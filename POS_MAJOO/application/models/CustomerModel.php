<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function for get data from tb_produk where id_produk = $id
    public function detail($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get("tb_produk")->result();
    }

    // Function for get data from tb_produk where status = 1
    public function getProduk()
    {
        $this->db->where('status', 1);
        return $this->db->get("tb_produk")->result();
    }

    // Function for insert data to database
    public function create($data)
    {
        return $this->db->insert('tb_transaksi', $data);
    }
    
}
