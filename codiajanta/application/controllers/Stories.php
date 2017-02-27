<?php

class Stories extends CI_Controller {

    /**
     * Responsible for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('painting_model');
        $this->load->model('stories_model');
        $this->load->model('video_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {
        $this->load->view('stories/stories'); //I am able to reach this
        //load the view
        $this->load->view('includes/template');
    }

//index
}
