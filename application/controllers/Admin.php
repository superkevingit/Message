<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation'));
    }

    public function show_message()
    {
        $this->load->library('pagination');

        $config['per_page'] = 5;
        $config['base_url'] = site_url('admin/show_message');
        $total_rows = $this->admin_model->count_message();
        $config['total_rows'] = $total_rows;
        $config['use_page_numbers'] = TRUE;
        //样式配置
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&lt;';
        $config['next_link'] = '&gt;';
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a><li>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';

        $this->pagination->initialize($config);

        $page = (int)$this->uri->segment(3);
        $offset = $page == false ? 0 : ($config['per_page']* ($page-1));

        $this->db->limit($config['per_page'], $offset);
        $data['list'] = $this->admin_model->get_message();

        $data['page_list'] = $this->pagination->create_links();

        //判断root
        $username = $_SESSION['username'];
        $root = $this->admin_model->check_root($username)['root'];

        return $this->load->view('admin/show_message', array('data' => $data, 'root' => $root));
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
            $username = $_SESSION['username'];
            $root = $this->admin_model->check_root($username)['root'];
            if($root)
            {
                $query = $this->admin_model->add_admin($data);
                return $this->load->view('admin/add_admin', array('info' => '添加成功!'));
            }
            else
            {
                return $this->load->view('admin/show_message');
            }
        }
    }

    public function logout()
    {
        $this->load->library('session');
        unset($_SESSION['username']);
        redirect('login/load_login');
    }
}
