<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }

	public function index() {
        $this->layout->view('partners/settings/index');
    }
}

/* End of file partners/settings.php */
/* Location: ./application/controllers/partners/settings.php */