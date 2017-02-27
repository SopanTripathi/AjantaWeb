<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Painting_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertNotices($arrayOfNoticeFiles) {
        $tableName = "painting";
        $inputArray = $arrayOfNoticeFiles;

        $data = array(
            'file_dir' => $inputArray["document_foldername"],
            'filename' => $inputArray["document_filename"]
        );

        $this->db->insert($tableName, $data);
    }

    function add_collection_object($params) {
        if (!$params) {
            return FALSE;
        }

        if (!(isset($params['title']) && isset($params['title']))) {
            return FALSE;
        }

        if (!(isset($params['created_by']) && $params['created_by'])) {
            $params['created_by'] = $this->user_id ? $this->user_id : 1;
        }

        if (!(isset($params['created_at']) && $params['created_at'])) {
            $params['created_at'] = date('Y-m-d H:i:s');
        }

        $this->db->insert('collection_objects', $params);
        return $this->db->insert_id();
    }

    //To take out data from database
    function get_collections($data) {
        $results = FALSE;
        $params = array();

        $sql = 'SELECT * FROM collection_objects WHERE 1 ';

        if (isset($data['id']) && $data['id']) {
            $sql .= ' AND collection_objects.id = ?';
            $params[] = $data['id'];
        }

        if (isset($data['collection_object_id']) && $data['collection_object_id']) {
            $sql .= ' AND collection_objects.id = ?';
            $params[] = $data['collection_object_id'];
        }

        if (isset($data['gallery_id']) && $data['gallery_id']) {
            $sql .= ' AND collection_objects.gallery_id = ?';
            $params[] = $data['gallery_id'];
        }

        if (isset($data['parent_id']) && $data['parent_id']) {
            $sql .= ' AND collection_objects.parent_id = ?';
            $params[] = $data['parent_id'];
        }

        if (isset($data['active_only']) && $data['active_only']) {
            $sql .= ' AND collection_objects.disabled_by < 1';
        }

        if (isset($data['q']) && $data['q']) {
            $sql .= ' AND collection_objects.title LIKE ?';
            $params[] = '%' . $data['q'] . '%';
        }

        $query = $this->slave_db->query($sql, $params);
        if ($query->num_rows() > 0) {
            if (isset($data['collection_object']) && $data['collection_object']) {
                $results = $query->row_array();
            } else {
                $results = $query->result_array();
            }

            $query->free_result();
            return $results;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */