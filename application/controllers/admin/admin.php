<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
		redirect(site_url('admin/topics'));
	}
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */