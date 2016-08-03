<?php
class AdminAuth {
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function auth()
    {
        $this->CI->load->helper('url');

        if( preg_match("/admin.*/i", uri_string()))
        {
            $this->CI->load->library('session');

            if( ! $this->CI->session->userdata('username'))
            {
                redirect('login/load_login');
            }
        }
    }
}

