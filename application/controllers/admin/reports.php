<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        /*if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }*/
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
		$this->layout->view('admin/reports');
	}
}

/* End of file admin/reports.php */
/* Location: ./application/controllers/admin/reports.php */