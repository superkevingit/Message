<?php
class Message extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('message_model');
    }

	public function index()
	{
		$this->load->view('message');
	}

    public function check_message()
    {
        $this->form_validation->set_rules('child_name', 'child_name', 'required|xss_clean',
                                            array('required' => '请填写孩子姓名！')
                                        );
        $this->form_validation->set_rules('parent_name', 'parent_name', 'required|xss_clean',
                                            array('required' => '请填写家长姓名！')
                                        );
        $this->form_validation->set_rules('tel', 'tel', 'required|numeric|xss_clean',
                                            array('required' => '请填写联系方式！',
                                                  'numeric' => '请输入数字'
                                                 )
                                        );
        $this->form_validation->set_rules('year', 'year', 'required|numeric|xss_clean',
                                            array('required' => '请填写孩子出生年份！',
                                                  'numeric' => '请输入数字'
                                                 )
                                        );
        $this->form_validation->set_rules('month', 'month', 'required|numeric|xss_clean',
                                            array('required' => '请填写孩子出生月份！',
                                                  'numeric' => '请输入数字'
                                                )
                                        );
        $this->form_validation->set_rules('day', 'day', 'required|numeric|xss_clean',
                                            array('required' => '请填写孩子出生日期！',
                                                  'numeric' => '请输入数字'
                                                )
                                        );
        $this->form_validation->set_rules('requirement', 'requirement', 'required|min_length[10]|trim|xss_clean',
                                            array('required' => '请填写体检要求！',
                                                  'min_length' => '体验要求不少于10个字'
                                                )
                                        );

        if ($this->form_validation->run() === FALSE){
            $this->load->view('message');
        }
        else{
        $child_birth = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
        $arr = explode('-',$child_birth);
        $time = mktime(0,0,0,$arr[1],$arr[2],$arr[0]);
        $fmtDate = date('Y-m-d', $time);

        $data = array(
            'child_name' => $this->input->post('child_name'),
            'parent_name' => $this->input->post('parent_name'),
            'tel' => $this->input->post('tel'),
            'child_birth' => $fmtDate,
            'requirement' => $this->input->post('requirement'),
            'message_time' => date('y-m-d h:i:s',time())
        );

        $this->message_model->check_message($data);
        $this->load->view('check_message');
        }
    }
}
