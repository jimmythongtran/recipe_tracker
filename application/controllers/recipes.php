<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_controller {

    public function __construct() {
        parent::__construct();

        // loads the recipe model to make it available
        // to all of the controller's actions
        $this->load->model('Recipe_model');

        // load the author model
        $this->load->model('Author_model');

        // load the ingredient and step models
        $this->load->model('Ingredient_model');
        $this->load->model('Step_model');
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
    }//end index

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
        // retrieve the recipe
        $recipe = $this->Recipe_model->get_single_entry($recipe_id);

        // if the recipe doesn't exist,
        // redirect the user to the recipes index page
        if (empty($recipe)) {
            redirect('recipes/index');
        }

        // get the recipe's ingredients and steps
        $ingredients = $this->Ingredient_model->get_recipe_entries($recipe_id);
        $steps = $this->Step_model->get_recipe_entries($recipe_id);

        // add the recipe, its id, ingredients and steps
        // to the $data array to be passed to our single view
        $data = array();
        $data['recipe_id'] = $recipe_id;
        $data['recipe'] = $recipe;
        $data['ingredients'] = $ingredients;
        $data['steps'] = $steps;

        //get latest 10 recipes
        $latest_recipes = $this->Recipe_model->get_all_entries(10);
        $data['latest_recipes'] = $latest_recipes;

        $this->template->set('title', $recipe->name);
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

    public function create_ingredient()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('name', 'Ingredient name', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required');
        $this->form_validation->set_rules('recipe_id', 'Recipe', 'required');

        if ($this->form_validation->run() == FALSE) {
            //validation failed
            
            // get error messages' HTML
            $errors = $this->load->view('_form_errors', '', true);

            // return "fail" status and the errors
            //in jSON format
            $return = array(
                'status' => 'fail',
                'errors' => $errors
            );
            echo json_encode($return);
        } //end of if
        else {
            //validation succeeds
            // add ingredient to database
            // create an ingredient object with Ingredient_model
            $ingredient = new Ingredient_model();

            //assign ingredient object's field values
            //based on the form values
            $ingredient->amount = $this->input->post('amount');
            $ingredient->unit = $this->input->post('unit');
            $ingredient->name = $this->input->post('name');
            $ingredient->order = $this->input->post('order');
            $ingredient->recipe_id = $this->input->post('recipe_id');

            // add ingredient to the database
            $ingredient->insert_entry();

            //get the ingredient's HTML based on partial view
            $ingredient_html = $this->load->view('recipes/_ingredient', array('ingredient' => $ingredient), true);

            //return a "success" status and the ingredient's HTML
            //in JSON format
            $return = array(
                'status' => 'success',
                'ingredient' => $ingredient_html
            );
            echo json_encode($return);
        }//end else
    }//end create_ingredient 
}//end of Recipes
