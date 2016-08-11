<?php
class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_message()
    {
        $query = $this->db->get('message');
        return $query->result_array();
    }

    public function count_message()
    {
        return $this->db->from('message')->count_all_results();
    }

    public function del_message($ids, $root)
    {
        if ($root){
            $this->db->trans_start();
            foreach( $ids as $id):
            $query = $this->db->where('id', $id)->delete('message');
            endforeach;
            $this->db->trans_complete();
            return $query;
        }
        else{
            return False;
        }
    }

    public function add_admin($data)
    {
        $query = $this->db->insert('admin', $data);
        return $query;
    }

    public function check_root($username)
    {
        $query = $this->db->select('root')->where('username', $username)->get('admin');
        return $query->row_array();
    }
}
