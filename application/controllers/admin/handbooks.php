<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handbooks extends CI_Controller {
    public function __construct() {
        parent::__construct();
        /*if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }*/
        $this->load->model('Handbook_model', 'handbook');
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
        $handbooks = $this->handbook->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->handbook->last_query_number));
		$this->layout->view('admin/handbooks/index.php', array('handbooks' => $handbooks, 'pagination' => $this->page->create()));
	}

    public function create() {
        if (empty($_POST)) {
            return $this->layout->view('admin/handbooks/form');
        }
        $this->handbook->create($this->input->post('handbook'));
        redirect(site_url('admin/handbooks'));
    }

    public function delete()
    {
        $this->handbook->delete($this->input->get('id'));
        redirect(site_url('admin/handbooks'));
    }

    public function active($id) {
        $handbook = current($this->handbook->find_by('id', $id));
        if (empty($_POST)) {
            return $this->layout->view('admin/handbooks/active', array('handbook' => $handbook));
        }
        $user = $this->input->post('user');
        $this->load->model('User_model', 'user');
        if ($this->user->active($user, $handbook->id)) {
            redirect('admin/handbooks');
        } else {
            return $this->layout->view('admin/handbooks/active', array('handbook' => $handbook, 'user' => (object)$user, 'errors' => $this->user->errors));
        }
    }
}

/* End of file admin/handbooks.php */
/* Location: ./application/controllers/admin/handbooks.php */