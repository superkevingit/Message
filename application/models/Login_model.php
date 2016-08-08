<?php
class Login_model extends CI_Model {
    public function check_user($username, $password)
    {
        $this->load->database();
        $query = $this->db->get_where('admin', array('username' => $username))->row_array();
        if ($query)
        {
            if ($query['password'] == md5($password))
            {
                $result = array('msg' => TRUE, 'info' => '登陆成功');
            }
            else
            {
                $result = array('msg' => FALSE, 'info' => '密码错误');
            }
        }
        else
        {
            $result = array('msg' => FALSE, 'info' => '用户名错误');
        }
        return $result;
    }
}
