<?php
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->load->model('login_model');
    }

    public function load_login()
    {
        if(isset($this->session->username))
        {
            redirect('admin/show_message');
        }
        else
        {
            return $this->load->view('login', array('info' => ''));
        }
    }

    public function check_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('login', array('info' => ''));
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $query = $this->login_model->check_user($username, $password);
            if ($query['msg'])
            {
                $_SESSION['username'] = $username;
                redirect('admin/show_message');
            }
            else
            {
                $info = $query['info'];
                $this->load->view('login', array('info' => $info));
            }
        }
    }
}
