<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredient_model extends CI_Model {
    
    /**
     * Ingredient fields
     */

    var $recipe_id = '';
    var $name = '';
    var $amount = '';
    var $unit = '';
    var $order = '';

    function get_recipe_entries($recipe_id) {
        $query = $this->db->order_by('order', 'ASC')
            ->get_where('ingredients', array('recipe_id' => $recipe_id));
        $result = $query->result();
        return $result;
    } // end get_recipe_entries

    function insert_entry() {
        $result = $this->db->insert('ingredients', $this);
        $new_ingredient_id = $this->db->insert_id();

        // set the item's new id
        $this->id = $new_ingredient_id;

        return $new_ingredient_id;
    }
} // end Ingredient_model
