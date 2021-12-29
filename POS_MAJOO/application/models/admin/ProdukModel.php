<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function for get data from tb_produk join tb_supplier
    public function readProduk()
    {
        $query =  $this->db->query("SELECT * FROM tb_produk, tb_supplier WHERE tb_produk.id_supplier = tb_supplier.id_supplier")->result();
        return $query;
    }

    // Function for get data from tb_supplier
    public function getSupplier()
    {
        return $this->db->get("tb_supplier")->result();
    }

    // Function for insert data to database
    public function create($data)
    {
        return $this->db->insert('tb_produk', $data);
    }
    
    // Function for update data to database
    public function updateProduk($data, $id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update('tb_produk', $data);
    }

    // Function for delete data to database
    public function deleteProduk($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete('tb_produk');
    }

    // Function for get data from tb_produk where id_produk = $id
    public function detail($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get("tb_produk")->result();
    }

    public function getSup()
    {
        $query = $this->db->get('tb_supplier');
        return $query->result_array();
    }
    
    // Function for get data from tb_produk join tb_supplier where id_produk = $id
    public function getDetail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_produk, tb_supplier WHERE tb_produk.id_supplier = tb_supplier.id_supplier AND tb_produk.id_produk = '$id'")->result();
        return $query;
    }

    // Function for update status tb_produk to 'active'
    public function active($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk', ['status' => '1']);
    }

    // Function for update status tb_produk to 'non-active'
    public function nonActive($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk', ['status' => '0']);
    }

}
