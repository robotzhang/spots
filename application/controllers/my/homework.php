<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homework extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout/my');
    }

    public function index()
    {
        $this->layout->view('my/homework/show.php');
    }
}

/* End of file admin/users.php */
/* Location: ./application/controllers/admin/users.php */