<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model
{
    var $table = 'users';
    var $validation = array(
        array('field' => 'user[mobile]', 'label' => '手机号', 'rules' => 'trim|required|numeric|is_unique[users.mobile]'),
        array('field' => 'user[drive]', 'label' => '驾驶证号', 'rules' => 'required|alpha_numeric'),
        array('field' => 'user[password]', 'label' => '登录密码', 'rules' => 'required'),
        array('field' => 'user[repassword]', 'label' => '确认密码', 'rules' => 'matches[user[password]]')
    );
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */