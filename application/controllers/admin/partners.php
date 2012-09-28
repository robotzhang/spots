<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Partner_model', 'partner');
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
        $users = $this->partner->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->partner->last_query_number));
		$this->layout->view('admin/users/index', array('partners' => $users, 'pagination' => $this->page->create()));
	}
}

/* End of file admin/partner.php */
/* Location: ./application/controllers/admin/partner.php */