<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe_model extends CI_Model {

    /**
     * Recipe fields
     */

    var $name = '';
    var $author_id = '';
    var $image = '';
    var $servings = '';
    var $time_prep = '';
    var $time_cook = '';

    function __construct() {
        parent::__construct();
    }
    
    function get_first_entry() {
        $query = $this->db->get('recipes', 1);
        $result = $query->result();
        return $result;
    }
    
    # Github service outage: https://www.screencast.com/t/6A7HXAfxx5

    function get_all_entries() {
        // prep the query
        $this->db
            ->select('recipes.*, authors.name AS author_name')
            ->from('recipes')
            ->join('authors', 'recipes.author_id = authors.id')
            ->order_by('recipes.id', 'DESC');

        // run the query
        $query = $this->db->get();

        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }

        return $results;
    }

    function insert_entry() {
        $this->created_at = date('Y-m-d H:i:s');
        $result = $this->db->insert('recipes', $this);
        $new_recipe_id = $this->db->insert_id();

        // set the item's new id
        $this->id = $new_recipe_id;

        return $new_recipe_id;
    }
}
