<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function for get data from tb_user
    public function readAdmin()
    {
        return $this->db->get('tb_user')->result();
    }

    // Function for get data from tb_supplier
    public function readSupplier()
    {
        return $this->db->get("tb_supplier")->result();
    }
    
    // Function for insert data to database
    public function create($data)
    {
        return $this->db->insert('tb_user', $data);
    }
    
    // Function for insert data to database
    public function createSupplier($data)
    {
        return $this->db->insert('tb_supplier', $data);
    }

    // Function for update data from database
    public function updateSupplier($data, $id)
    {
        $this->db->where('id_supplier', $id);
        return $this->db->update('tb_supplier', $data);
    }

    // Function for delete data from database
    public function deleteSupplier($id)
    {
        $this->db->where('id_supplier', $id);
        return $this->db->delete('tb_supplier');
    }

    // Function for get data from tb_user where id_user = $id
    public function detail($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get("tb_user")->result();
    }
    
    // Function for get data from tb_supplier where id_supplier = $id
    public function detailSupplier($id)
    {
        $this->db->where('id_supplier', $id);
        return $this->db->get("tb_supplier")->result();
    }

    // Function to update status from tb_user 
    public function active($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', ['status' => '1']);
    }

    // Function to update status from tb_user 
    public function nonActive($id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', ['status' => '0']);
    }

}
