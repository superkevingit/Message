<?php
class Message extends CI_Controller {

	public function index()
	{
		$this->load->view('message');
	}

    public function check_message()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('message_model');

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
