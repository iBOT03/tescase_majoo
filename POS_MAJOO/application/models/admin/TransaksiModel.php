<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function for get tb_transaksi join tb_produk where id_transaksi = $id
    public function detail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_transaksi, tb_produk WHERE tb_transaksi.id_produk = tb_produk.id_produk AND tb_transaksi.id_transaksi = '$id'")->result();
        return $query;
    }

    // Function for get tb_transaksi join tb_produk 
    public function read()
    {
        // return $this->db->get("tb_transaksi")->result();
        $query = $this->db->query("SELECT * FROM tb_transaksi, tb_produk WHERE tb_transaksi.id_produk = tb_produk.id_produk")->result();
        return $query;
    }
    
    // Function for get sum data from grand_total
    public function sum()
    {
        // return $this->db->get("tb_transaksi")->result();
        $query = $this->db->query("SELECT SUM(grand_total) AS total FROM tb_transaksi")->result();
        return $query;
    }

    // Function for update tb_transaksi
    public function update($data, $id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->update('tb_transaksi', $data);
    }
    
}
