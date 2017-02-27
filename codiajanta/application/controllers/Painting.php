<?php

class Painting extends CI_Controller {
    
    /**
    * Responsible for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('painting_model');
        $this->load->model('stories_model');
        $this->load->model('video_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('login');
        }
    }
    
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index() {
        $this->load->view('painting/painting'); //I am able to reach this
        
        //load the view
        $this->load->view('includes/template'); 
        
    }//index

    
    public function returnjson() {
    	$arr = array('3Dobject' => 'url', 'cavedata' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
    	echo json_encode( $arr );
    }
    
    
    public function addpainting() {
        if ($_FILES ["file"] ["error"] > 0) {
            echo "Error: " . $_FILES ["file"] ["error"] . "<br>";
        } else {
            //move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "upload/" . $_FILES ["file"] ["name"] );
            move_uploaded_file($_FILES ["file"] ["tmp_name"], 'assets/img');
        }
    }
    
    /**
    * Responsible for adding image data to database
    * @return void
    */
    function add_collection_object() {
    $post_data = $this->input->post();
    
    $data['title'] = isset($post_data['title']) ? $post_data['title'] : NULL;
    $data['description'] = isset($post_data['description']) ? $post_data['description'] : NULL;
    $data['image'] = isset($post_data['image']) ? $post_data['image'] : NULL;
    $data['gallery_id'] = isset($post_data['gallery_id']) ? $post_data['gallery_id'] : NULL;
    $data['parent_id'] = isset($post_data['parent_id']) ? $post_data['parent_id'] : NULL;
    $data['position'] = isset($post_data['position']) ? $post_data['position'] : 0;

    if ( ! ($data['title'])) {
      $errors[] = 'Invalid parameters';
    }
    
    if (isset($errors) && $errors) {
      send_api_output('add_collection_object', array('errors' => $errors), 400);
      return;
    }
    
    $data['created_by'] = $this->logged_in_user['id'] ?  $this->logged_in_user['id'] : 1;
    $data['created_at'] = date('Y-m-d H:i:s');
    $results = $this->Collections_Model->add_collection_object($data);
    
    if(isset($results) && $results) {
      send_api_output('get_collections', array('data' => array('message' => 'Successfully added Collection Object.', 'results' => array('id' => $results))));
      return;
    } else {
      send_api_output('add_collection_object', array('errors' => array('Not able to add Collection Object.')), 400);
      return;
    }
  }
  
  function get_collections() {
    $post_data = $this->input->post();
    
    $data['collection_object_id'] = isset($post_data['collection_object_id']) ? $post_data['collection_object_id'] : FALSE;
    $data['gallery_id'] = isset($post_data['gallery_id']) ? $post_data['gallery_id'] : FALSE;
    $data['active_only'] = isset($post_data['active_only']) ? $post_data['active_only'] : FALSE;
    $data['parent_id'] = isset($post_data['parent_id']) ? $post_data['parent_id'] : FALSE;
    $data['q'] = isset($post_data['q']) ? $post_data['q'] : FALSE;
    $data['collection_object'] = isset($post_data['collection_object']) ? $post_data['collection_object'] : FALSE;
    
    if ( ! $post_data) {
      send_api_output('get_collections', array('errors' => array('Invalid parameters.')), 400);
      return;
    }
    
    $results = $this->Collections_Model->get_collections($data);
    if($results) {
      send_api_output('get_collections', array('data' => array('message' => 'Successfully retrieved collections data', 'results' => $results)));
      return;
    } else {
      send_api_output('get_collections', array('errors' => array('Not able to get collections data.')), 400);
      return;
    }
  }
}
