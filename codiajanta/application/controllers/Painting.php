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
            redirect('home/index');
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

    public function add_painting(){
        $data=array(
            'title' => $this->input->post('title'),
            'caption' => $this->input->post('caption'),
            'cave_num' => $this->input->post('cave_num'),
            'belong_to' => $this->input->post('belong_to'),
            'cave_type' => $this->input->post('cave_type'),
            'filename' => $this->input->post('filename')
            );
        
        //Configuration for Uploaded File
        $config['upload_path']   = './assets/img'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']      = 100000;  
        //Set Configuration
        $this->load->library('upload', $config);
        //Try Uploading to Your folder
        if (!$this->upload->do_upload('filename')) {
             $error = array(
                'error' => $this->upload->display_errors()
                ); 
                print_r($error); 
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data());
            echo "Your Image is Uploaded ";
            
            //redirect('painting/index');
            $this->load->view('painting/painting', $data); 
            
         } 
      } 
}
