<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_controller {

    public function __construct() {
        parent::__construct();

        // loads the recipe model to make it available
        // to all of the controller's actions
        $this->load->model('Recipe_model');
    }

    public function index()
    {
        // load the data
        $all_recipes = $this->Recipe_model->get_all_entries();
   
        // makes data available to view
        $data = array();
        $data['recipes'] = $all_recipes;

        // render the view and pass it the data
        $this->template->set('active_page', 'recipes');
        $this->template->set('title', 'Recipes');
        $this->template->load('template', 'recipes/index', $data);
    }
}
