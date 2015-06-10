<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author geoffreycheung
 */
class Upload_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_filepath_data($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('filepath');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('filepath', array('ID' => $id));
            return $query->row_array();
        }
    }

    function get_filepath_data_for_unity($name) {
        $query = $this->db->get_where('filepath', array('File_Name' => $name));
        return $query->row_array();
    }

    function insert_filepath_data($data) {
        $this->db->insert('filepath', $data);
    }

    function remove_filepath_data($id) {
        $query = $this->db->get_where('filepath', array('ID' => $id));
        $tmp = $query->row_array();
        $this->db->delete('filepath', array('ID' => $id));

        return $tmp['File_Name'];
    }

}
