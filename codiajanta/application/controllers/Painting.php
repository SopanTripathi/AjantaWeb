<?php

class Painting extends CI_Controller {

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
            redirect('home/index');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {
        $this->load->view('painting/painting', array('error' => '')); //I am able to reach this
        $this->load->view('includes/template');
    }


    public function returnjson() {
        $arr = array('3Dobject' => 'url', 'cavedata' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        echo json_encode($arr);
    }

    /**
     * Add Image to folder 
     * @return void
     */
    public function add_painting() {
//        $data = array(
//            'title' => $this->input->post('title'),
//            'caption' => $this->input->post('caption'),
//            'cave_num' => $this->input->post('cave_num'),
//            'belong_to' => $this->input->post('belong_to'),
//            'cave_type' => $this->input->post('cave_type'),
//                //'filename' => $this->input->post('filename')
//        );

        $config = array(
            'upload_path' => "./assets/img/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );

        $this->load->library('upload');
        $this->upload->initialize($config);

        //If configuration are set rightly i.e. do_upload()=TRUE to Upload class
        if ($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('painting/upload_success', $data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            redirect('painting');
        }
    }

}
