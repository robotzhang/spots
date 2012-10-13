<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        /*if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }*/
        $this->load->model('User_model', 'user');
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
        $users = $this->user->get(array(), $this->input->get('page'), 20);
        $users = $this->user->set_handbook($users);
        $this->load->library('page', array('total' => $this->user->last_query_number));
		$this->layout->view('admin/users/index', array('users' => $users, 'pagination' => $this->page->create()));
	}

    public function edit($id) {
        $user = current($this->user->find_by('id', $id));
        $this->layout->view('admin/users/form', array('user' => $user));
    }

    public function update() {
        $user = $this->input->post('user');
        if (empty($user['password'])) {
            unset($user['password']);
        } else {
            $user['password'] = md5($user['password']);
        }
        if ($this->user->update($user)) {
            redirect('admin/users/index');
        } else {
            $partner['errors'] = $this->user->errors;
            return $this->layout->view('admin/users/form', array('user' => (object)$user));
        }
    }
}

/* End of file admin/reports.php */
/* Location: ./application/controllers/admin/reports.php */