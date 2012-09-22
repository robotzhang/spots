<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rooms extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout/my');
        $this->load->model('Room_model', 'room');
    }

    public function index()
    {
        $this->layout->view('my/rooms/show.php');
    }

    public function create()
    {
        if (empty($_POST)) {
            return $this->layout->view('my/rooms/form.php');
        }
    }
}

/* End of file admin/users.php */
/* Location: ./application/controllers/admin/users.php */