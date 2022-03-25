<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrGeneration_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getTopics() 
    {
        $osticketdb = $this->load->database("osticket", true);
        // ----- STATUS -----
        // 0 - Disabled
        // 2 - Active
        // 4 - Archived
        // ----- END STATUS -----
        $sql = "SELECT topic_id, topic FROM ost_help_topic WHERE flags = 2";
        $query = $osticketdb->query($sql);
        return $query ? $query->result_array() : [];
    }

    public function getItems()
    {
        $sql = "SELECT * FROM qrcodes ORDER BY updatedAt DESC";
        $query = $this->db->query($sql);
        return $query ? $query->result_array() : [];
    }

    public function saveQrCode($action = 'insert', $id = 0, $data = [])
    {
        if ($action == 'update') {
            $query = $this->db->update("qrcodes", $data, ['qrcodeID' => $id]);
        } else {
            $query = $this->db->insert("qrcodes", $data);
            $id = $this->db->insert_id();
        }
        return $query ? $id : 0;
    }

    public function getTableData($table = '', $columns = '', $where = '')
    {
        if ($table) {
            $columns = $columns ? $columns : "*";
            $where   = $where ? $where : "1=1";
            $sql = "SELECT $columns FROM $table WHERE $where";
            $query = $this->db->query($sql);
            return $query ? $query->result_array() : [];
        }
        return [];
    }

}
