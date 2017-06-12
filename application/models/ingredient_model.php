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
}
