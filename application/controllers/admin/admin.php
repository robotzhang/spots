<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        /*if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }*/
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
		redirect(site_url('admin/reports'));
	}

    public function reports() {

    }

    public function login() {
        $this->layout->setLayout('layout/default');
        $admin_post = $this->input->post('admin');
        if (empty($_POST)) {
            return $this->layout->view('admin/login');
        }
        $this->load->model('Admin_model', 'admin');
        $admin = current($this->admin->get(array('name' => $admin_post['name'], 'password' => md5($admin_post['password']))));
        if (empty($admin)) {
            $this->layout->view('admin/login', array('errors' => '用户名或密码错误！'));
        } else {
            $this->session->set_userdata('admin', $admin);
            redirect('admin');
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin');
        redirect('admin/login');
    }

    public function upload() {
        $config['upload_path'] = getcwd().'./uploads/kindeditor';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('imgFile')) {
            $data = $this->upload->data();
            $res = array(
                'error' => 0,
                'url' => site_url('/uploads/kindeditor/'.$data['file_name'])
            );
        } else {
            $res = array(
                'error' => 1,
                'message' => $this->upload->display_errors(),
            );
        }

        echo json_encode($res);
    }
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */