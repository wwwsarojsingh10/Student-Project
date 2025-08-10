<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studentmodel extends CI_Model
{

    public function register($data)
    {
        return $this->db->insert('students', $data);
    }

    public function get_all_students($name_prefix = null)
    {
        if ($name_prefix) {
            $this->db->like('name', $name_prefix, 'after');
        }
        return $this->db->get('students')->result_array();
    }

    public function get_student($id)
    {
        return $this->db->get_where('students', ['id' => $id])->row_array();
    }

    public function update_student($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    public function delete_student($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }
}