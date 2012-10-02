<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }

	public function index() {
        redirect(site_url('partners/reports'));
	}

    public function login() {
        $this->layout->setLayout('layout/mini');
        if (empty($_POST)) {
            return $this->layout->view('partners/login');
        }
        $this->load->model('Partner_model', 'partner');
        $partner = $this->input->post('partner');
        $partners = $this->partner->get(array('name' => $partner['name'], 'password' => md5($partner['password'])));
        if (count($partners) > 0) {
            $this->session->set_userdata('partner', current($partners));
            return redirect('partners');
        } else {
            return $this->layout->view('partners/login', array('partner' => $partner, 'errors' => '账号或密码错误'));
        }
    }

    public function logout() {
        $this->session->unset_userdata('partner');
        redirect('partners/login');
    }
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */