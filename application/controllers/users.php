<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }
    /**
     * 激活手册
     * */
	public function activation() {
        if (empty($_POST)) {
            return redirect(site_url());
        }
        $user = $this->input->post('user');
        $user['ip'] = $this->input->ip_address();
        $this->load->model('Handbook_model', 'handbook');
        $handbook = $this->input->post('handbook');
        if (!$this->handbook->can_used($handbook['unique_id'])) { // 验证景点手册
            $this->user->errors['handbook[unique_id]'] = $this->handbook->errors['unique_id'];
        }
        if (empty($this->user->errors) && $this->user->create($user)) {
            // 设置景点手册的user_id
            $user_id = $this->user->db->insert_id();
            if ($this->handbook->update(array('user_id' => $user_id), array('unique_id' => $handbook['unique_id']))) {
                // 发送验证码到手机
                $code =  rand(1001, 9999);
                $this->session->set_userdata('code', $code);
                // 进入第二步，输入手机码
                redirect(site_url(sprintf("users/check_mobile?mobile=%d&unique_id=%d", $user['mobile'], $handbook['unique_id'])));
            }
        }

        $this->layout->view('users/activation_form', array('user' => $user, 'handbook' => $handbook, 'errors' => $this->user->errors));
	}

    // 验证手机
    public function check_mobile() {
        if (empty($_POST)) {
            return $this->layout->view('users/check_mobile');
        }
        // 通过验证，设置handbook为已使用
        $this->load->model('Handbook_model', 'handbook');
        $this->handbook->update(array('is_used' => 'Y'), array('unique_id' => $this->input->get('unique_id')));
        $this->user->update(array('is_validation' => 'Y'), array('mobile' => $this->input->get('mobile')));
        redirect(site_url('my')); // 跳到我的主页
    }

    // 登陆到系统
    public function login() {
        $this->layout->view('users/login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */