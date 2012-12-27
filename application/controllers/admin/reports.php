<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
        $this->load->model('Handbook_model', 'handbook');
        $count['all'] = $this->handbook->count();
        $count['used_y'] = $this->handbook->count(array('is_used' => 'Y'));
        $count['used_n'] = $this->handbook->count(array('is_used' => 'N'));
        $handbooks = $this->handbook->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->handbook->last_query_number));
        $this->layout->view('admin/reports', array(
            'handbooks' => $handbooks,
            'count' => $count,
            'pagination' => $this->page->create()
        ));
	}
}

/* End of file admin/reports.php */
/* Location: ./application/controllers/admin/reports.php */