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
            return $this->layout->view('users/activation_form');
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
                $this->send_code($user['mobile']);
                // 进入第二步，输入手机码
                return redirect(site_url(sprintf("users/check_mobile?mobile=%s&unique_id=%s", $user['mobile'], $handbook['unique_id'])));
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
        if ($this->input->post('code') != $this->session->userdata($form['mobile'].'_code')) {
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
            set_current_user(current($this->user->find_by('mobile', $form['mobile'])));
            $this->session->unset_userdata($form['mobile'].'_code');
            redirect(site_url('my')); // 跳到我的主页
        } else {
            return $this->layout->view('users/check_mobile', array('form' => $form, 'errors' => $errors));
        }
    }

    // 重新发送验证码
    public function resend() {
        $mobile = $this->input->post('mobile');
        $code = $this->session->userdata($mobile.'_code');
        if (empty($code)) { // 原来的验证码是空，说明是非法请求
            echo json_encode(array('success' => false, 'message' => '非法的请求！'));
            return false;
        }
        $this->send_code($mobile);
        echo json_encode(array('success' => true, 'message' => '验证码已重新发送！'));
    }

    // 登陆到系统
    public function login() {
        if (empty($_POST)) {
            return $this->layout->view('users/login');
        }
        $user = $this->input->post('user');
        $users = $this->user->get(array('mobile' => $user['mobile'], 'password' => md5($user['password'])));
        if (count($users) > 0) {
            set_current_user(current($users));
            redirect('my');
        } else {
            return $this->layout->view('users/login', array('user' => $user, 'errors' => array('用户名或密码错误')));
        }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect('login');
    }

    // 发送验证码
    private function send_code($mobile) {
        $code =  rand(1001, 9999);
        $this->session->set_userdata($mobile.'_code', $code);
        $this->load->library('message');
        $this->message->mobile($mobile, '您好!您在chinazjy.org上的激活码为'.$code.'.请尽快完成激活');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */