<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }
        $this->layout->setLayout('layout/admin');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $users = $this->user->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->user->last_query_number));
        $this->layout->view('admin/users/index', array('users' => $users, 'pagination' => $this->page->create()));
    }
}

/* End of file admin/users.php */
/* Location: ./application/controllers/admin/users.php */