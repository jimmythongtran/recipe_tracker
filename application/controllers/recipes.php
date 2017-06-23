<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_controller {

    public function __construct() {
        parent::__construct();

        // loads the recipe model to make it available
        // to all of the controller's actions
        $this->load->model('Recipe_model');

        // load the author model
        $this->load->model('Author_model');
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

    public function add()
    {
        // retrieve all authors
        $author_entries = $this->Author_model->get_all_entries();

        // generate an array of author options
        $author_options = array();
        $author_options[''] = ''; // add a blank initial option
        foreach ($author_entries as $auth) {
            $author_options[$auth->id] = $auth->name;
        }
        $data['author_options'] = $author_options;

        // generate array for hour options
        $hour_options = array();
        $hour_options[''] = ''; // add blank initial option
        for ($i = 0; $i <=23; $i++) {
            $time_val = $i < 10 ? '0' . $i : $i;
            $hour_options[$time_val] = $time_val;
        }
        $data['hour_options'] = $hour_options;

        //generate array for minute options
        $minute_options = array();
        $minute_options[''] = ''; // add blank initial option
        for ($i = 0; $i <= 59; $i++) {
            $time_val = $i < 10 ? '0' . $i : $i;
            $minute_options[$time_val] = $time_val;
        }
        $data['minute_options'] = $minute_options;

        $this->template->set('title', 'Add a Recipe');
        $this->template->load('template', 'recipes/add', $data);
    } // end of add

    public function single($recipe_id) {
        $data = array();
        $data['recipe_id'] = $recipe_id;

        $this->template->set('title', 'Single Recipe');
        $this->template->load('template', 'recipes/single', $data);
    } // end of single

    public function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'name', 'Name', 'required');
        $this->form_validation->set_rules(
            'author_id', 'Author', 'required');
        $this->form_validation->set_rules(
            'servings', 'Number of servings', 'required');
        $this->form_validation->set_rules(
            'time_prep_hours', 'Prep time hours', 'required');
        $this->form_validation->set_rules(
            'time_prep_minutes', 'Prep time minutes', 'required');
        $this->form_validation->set_rules(
            'time_cook_hours', 'Cook time hours', 'required');
        $this->form_validation->set_rules(
            'time_cook_minutes', 'Cook time minutes', 'required');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            // redisplay add recipe page with errors
            $this->add();
        }
        else {
            // validation succeeded
            // add recipe to the database
            
            // create a recipe object with the Recipe_model
            $recipe = new Recipe_model();

            // assign recipe object's field values
            // based on the submitted form values
            $recipe->name = $this->input->post('name');
            $recipe->author_id = $this->input->post('author_id');
            $recipe->servings = $this->input->post('servings');
            $recipe->time_prep = $this->input->post('time_prep_hours')
                . ':'
                . $this->input->post('time_prep_minutes')
                . ':00';
            $recipe->time_cook = $this->input->post('time_cook_hours')
                . ':'
                . $this->input->post('time_cook_minutes')
                . ':00';

            // add the recipe to the database
            $new_recipe_id = $recipe->insert_entry();

            // set a "success" message and redirect
            // to the recipes index page
            $this->session->set_flashdata('message',
                '<div class="alert alert-success">'
                . 'Your recipe was successfully created!</div>');
            redirect('recipes/index');
        }
    } // end of create
}
