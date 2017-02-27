<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Load the URL helper */
        $this->load->helper('url');
    }

    /**
     * Home page call for validated users
     * @return void
     */
    function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('painting/index');
        } else {
            $this->load->view('login');
        }
    }

    function login() {
        $this->load->view('login');
    }
    
    /**
     * Validation of all users with database-records
     * @return void
     */
    function validate_credentials() {
        $this->load->model('Users_model');
        $user_name = $this->input->post('user_name');
        $password = $this->__encrip_password($this->input->post('password'));

        //function which return if its validated
        $is_valid = $this->Users_model->validate($user_name, $password);
        
        if ($is_valid) {
            echo "You have been Successfully Loged-In !";
            $data = array(
                'user_name' => $user_name,
                //'user_profile' => $user_profile,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('painting/index'); // See in routes corresponding controller and method
        } else { // incorrect username or password
            echo "There was an error with your E-Mail/Password combination. Please try again!";
            $data['login_error'] = TRUE;
            $this->load->view('login', $data); //Passing data to view
        }
    }

    /**
     * SignUp form for User
     * @return void
     */
    function signup() {
        $this->load->view('signup_form');
    }
    
    /**
     * Creating New Users
     * @return void
     */
    function create_member() {
        $this->load->library('form_validation');

        // Fieldname, Placeholders, validation rules
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup_form');
        } else {
            $this->load->model('Users_model');

            //if ($query == $this->Users_model->create_member()) {
            if ($this->Users_model->create_member()) {
                $this->load->view('signup_successful');
            } else {
                $this->load->view('signup_form');
            }
        }
    }
    
    /**
     * Encrypting password of Users
     * @return void
     */
    function __encrip_password($password) {
        return md5($password);
    }

    /**
     * Destroy the session, and logout the user.
     * @return void
     */
    function logout() {
        $this->session->sess_destroy();
        redirect('home/index');
    }
    
    /**
     * Administrator can set up user-rights for all users
     * @return void
     */
    function admin_index() {
        $this->load->model('Users_model');
        $data = $this->Users_model->rights_by_admin();
        $this->load->view('admin/admin_landing',$data);
        }

}
