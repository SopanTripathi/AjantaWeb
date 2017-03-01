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
    
    public function create(){
        $data = array('error' => '');
        $config = array(
                'upload_path' => './uploads',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '204800',
                'max_width' => '1920',
                'max_height' => '1080',
                'encrypt_name' => true
            );
        $this->load->library('upload', $config);
            if(!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $data['title'] = 'Create a news item';
                $data['main_content'] = 'news/create';
                $this->load->view('templates/template', $data, $error);
            }
        else{
            $slug = url_title($this->input->post('title'), 'dash', TRUE);
            $upload_data = $this->upload->data();
            $data = array(
                'post_title' => $this->input->post('title'),
                'slug' => $slug,
                'post_text' => $this->input->post('body'),
                'post_date' => time(),
                'post_image' => $upload_data['file_name'],
                'post_date' => time()
            );
        $this->db->insert('news', $data);
        $data['title'] = 'News item has been published';
        $data['main_content'] = 'news/success';
        $this->load->view('templates/template', $data);
        }
    }

//index
}
