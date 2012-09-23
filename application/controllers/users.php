<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    /**
     * 激活手册
     * */
	public function activation() {
		$this->layout->view('users/activation');
	}

    // 登陆到系统
    public function login() {
        $this->layout->view('users/login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */