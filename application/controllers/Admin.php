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

        $config['per_page'] = 10;
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

        $page = (int)$this->uri->segment(3, 1);
        $offset = $page == false ? 0 : ($config['per_page']* ($page-1));

        $this->db->limit($config['per_page'], $offset);
        $data['list'] = $this->admin_model->get_message();

        $data['page_list'] = $this->pagination->create_links();

        //判断root
        $username = $_SESSION['username'];
        $root = $this->admin_model->check_root($username)['root'];

        return $this->load->view('admin/show_message', array('data' => $data, 'root' => $root, 'seg' => $page));
    }

    public function del_message()
    {
        $ids = $this->input->post('del');
        var_dump($ids);
        $query = $this->admin_model->del_message($ids);

        $seg = $this->input->post('seg');

        # 防空页
        $total_rows = $this->admin_model->count_message();
        $perPage = 10;
        $page  = (int)$total_rows / $perPage;
        if ($seg > $page){
            $seg = round($page);
        }

        redirect("admin/show_message/$seg");
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

    public function get_excel()
    {
        ob_clean();
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('优哒用户留言');
        $message = $this->admin_model->get_message();
        $add = array_unshift($message, array(
                'id'           =>'编号',
                'child_name'   =>'孩子姓名',
                'parent_name'  =>'家长姓名',
                'tel'          =>'电话号码',
                'child_birth'  =>'孩子出生年月',
                'requirement'  =>'体检要求',
                'message_time' =>'留言时间'
            ));
        $this->excel->getActiveSheet()->fromArray($message);
        $filename="youda_message.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function logout()
    {
        $this->load->library('session');
        unset($_SESSION['username']);
        redirect('login/load_login');
    }
}
