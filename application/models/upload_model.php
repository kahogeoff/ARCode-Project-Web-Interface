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
    
    function get_filepath_data()
    {
        $query = $this->db->get('filepath');
        return $query;
    }
    
    function insert_filepath_data($data)
    {
        
    }
}
