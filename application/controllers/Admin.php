<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function show_message()
    {
        $message = $this->admin_model->get_message();
        $username = $_SESSION['username'];
        $root = $this->admin_model->check_root($username)['root'];
        return $this->load->view('admin/show_message', array('message' => $message, 'root' => $root));
    }

    public function del_message($id)
    {
        $query = $this->admin_model->del_message($id);
        redirect('admin/show_message');
    }

    public function add_admin()
    {
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('passconf', 'password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE)
        {
            return $this->load->view('admin/add_admin', array('info' => ''));
        }
        else
        {
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $query = $this->admin_model->add_admin($data);
            return $this->load->view('admin/add_admin', array('info' => '添加成功!'));
        }
    }

    public function logout()
    {
        $this->load->library('session');
        unset($_SESSION['username']);
        redirect('login/load_login');
    }
}
