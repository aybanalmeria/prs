<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_PatientModel extends CI_Model {

    private $table = 'tbl_patients';

    public function insert_patient($data) {
        return $this->db->insert($this->table, $data);
    }
    public function get_all_patients() {
        $this->db->where('status', 'Active'); 
        return $this->db->get($this->table)->result_array();
    }
    public function get_patient_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }
    public function update_patient($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function soft_delete_patient($id) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, ['status' => 'Inactive']);
    }

}
