<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stories_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function M_notice() {
        parent::Model();
    }

    function insertNotices($arrayOfNoticeFiles) {
        $tableName = "stories";
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