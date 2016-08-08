<?php
class Message_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function check_message($data)
    {
        $query = $this->db->insert('message', $data);
        return $query;
    }
}
