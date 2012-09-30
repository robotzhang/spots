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
                return redirect(site_url(sprintf("users/check_mobile?mobile=%s&unique_id=%s&code=%d", $user['mobile'], $handbook['unique_id'], $code)));
            } else {
                echo  '更新handbook出错';
            }
        }

        $this->layout->view('users/activation_form', array('user' => $user, 'handbook' => $handbook, 'errors' => $this->user->errors));
	}

    // 验证手机
    public function check_mobile() {
        if (empty($_POST)) {
            $form = array('mobile'=>$this->input->get('mobile'), 'unique_id' => $this->input->get('unique_id'));
            return $this->layout->view('users/check_mobile', array('form' => $form));
        }
        $form = array('mobile'=>$this->input->post('mobile'), 'unique_id' => $this->input->post('unique_id'));
        $errors = array();
        // 验证码是否正确
        if ($this->input->post('code') != $this->session->userdata('code')) {
            $errors['code'] = '验证码输入错误';
        }
        // 通过验证，设置handbook为已使用
        if (empty($errors)) {
            $this->load->model('Handbook_model', 'handbook');
            if (!$this->user->update(array('is_validation' => 'Y'), array('mobile' => $form['mobile']))) {
                $errors['user'] = join('<br>', $this->user->errors);
            } else {
                if (!$this->handbook->update(array('is_used' => 'Y'), array('unique_id' => $form['unique_id']))) {
                    $errors['handbook'] = join('<br>', $this->handbook->errors);
                }
            }
        }
        if (empty($errors)) {
            $this->session->set_userdata('user', current($this->user->find_by('mobile', $form['mobile'])));
            redirect(site_url('my')); // 跳到我的主页
        } else {
            return $this->layout->view('users/check_mobile', array('form' => $form, 'errors' => $errors));
        }
    }

    // 登陆到系统
    public function login() {
        $this->layout->view('users/login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */