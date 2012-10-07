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
		$this->layout->view('admin/partners/index', array('partners' => $users, 'pagination' => $this->page->create()));
	}

    public function create() {
        if (empty($_POST)) {
            return $this->layout->view('admin/partners/form');
        }

        $partner = $this->input->post('partner');
        $partner['password'] = md5($partner['password']);
        if ($this->partner->create($partner)) {
            redirect('admin/partners/index');
        } else {
            $partner['errors'] = $this->partner->errors;
            return $this->layout->view('admin/partners/form', array('partner' => (object)$partner));
        }
    }

    public function edit($id) {
        $partner = current($this->partner->find_by('id', $id));
        $this->layout->view('admin/partners/form', array('partner' => $partner));
    }

    public function update() {
        $partner = $this->input->post('partner');
        if (empty($partner['password'])) {
            unset($partner['password']);
        } else {
            $partner['password'] = md5($partner['password']);
        }
        if ($this->partner->update($partner)) {
            redirect('admin/partners/index');
        } else {
            $partner['errors'] = $this->partner->errors;
            return $this->layout->view('admin/partners/form', array('partner' => (object)$partner));
        }
    }

    public function delete($id) {
        $this->partner->delete($id);
        redirect('admin/partners/index');
    }
}

/* End of file admin/partner.php */
/* Location: ./application/controllers/admin/partner.php */