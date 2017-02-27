<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function M_notice() {
        parent::Model();
    }

    function insertNotices($arrayOfNoticeFiles) {
        $tableName = "vedio";
        $inputArray = $arrayOfNoticeFiles;

        $data = array(
            'file_dir' => $inputArray["document_foldername"],
            'filename' => $inputArray["document_filename"]
        );

        $this->db->insert($tableName, $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
