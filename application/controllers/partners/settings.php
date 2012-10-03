<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }

	public function index() {
        $this->layout->view('partners/settings/index');
    }

    public function repassword() {
        if (empty($_POST)) {
            return $this->layout->view('partners/settings/repassword');
        }
        $this->load->model('Partner_model', 'partner');
        $result = $this->partner->repassword(current_partner()->id, $this->input->post('password_old'), $this->input->post('password_new'), $this->input->post('password_confirm'));
        if ($result) {
            $this->session->set_flashdata('message', '密码重置成功');
            return redirect('partners/settings/repassword');
        } else {
            return $this->layout->view('partners/settings/repassword', array('errors' => $this->partner->errors));
        }
    }
}

/* End of file partners/settings.php */
/* Location: ./application/controllers/partners/settings.php */