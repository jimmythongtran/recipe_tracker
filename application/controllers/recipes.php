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
    }

    public function create()
    {
        // retrieve ALL values
        $all_values = $this->input->post();
        foreach ($all_values as $input_name => $input_val) {
            echo $input_name . ': ' . $input_val . '<br>';
        }

        // retrieve only the name value
        $name = $this->input->post('name');
        echo 'JUST the name: ' . $name;
    }
}
