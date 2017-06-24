<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_model extends CI_Model {

    /**
     * Step fields
     */

    var $recipe_id = '';
    var $instructions = '';
    var $order = '';

    function get_recipe_entries($recipe_id) {
        $query = $this->db->order_by('order', 'ASC')
                ->get_where('steps', array('recipe_id' => $recipe_id));
        $result = $query->result();
        return $result;
    } //end get_recipe_entries

    function insert_entry() {
        $result = $this->db->insert('steps', $this);
        $new_step_id = $this->db->insert_id();

        // set the item's new id
        $this->id = $new_step_id;

        return $new_step_id;
    }
} // end Step_model
