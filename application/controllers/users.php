<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    /**
     * 激活手册
     * */
	public function activation() {
		$this->layout->view('users/activation');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */