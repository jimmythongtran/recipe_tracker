<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
}

function get_first_entry() {
    $query = $this->db->get('recipes', 1, 0);
    $result = $query->result();
    return $result;
}