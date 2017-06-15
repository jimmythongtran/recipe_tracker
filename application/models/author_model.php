<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author_model extends CI_Model {

    /**
     * Author fields
     */
    var $name = '';

    function __construct() {
        parent::__construct();
    }

    // retrieve all authors
    function get_all_entries() {
        $query = $this->db->get('authors');
        $result = $query->result();
        return $result;
    }
}
