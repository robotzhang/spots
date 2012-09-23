<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //$this->layout->setLayout('layout/partners');
    }
	public function index() {
        $this->layout->view('partners/index');
	}
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */