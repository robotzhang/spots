<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //$this->layout->setLayout('layout/partners');
    }

	public function index() {
        $this->layout->view('partners/index');
	}

    public function login() {
        $this->layout->setLayout('layout/mini');
        $this->layout->view('partners/login');
    }
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */