<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model
{
    var $table = 'users';
    var $validation = array(
        array('field' => 'user[mobile]', 'label' => '手机号', 'rules' => 'trim|required|numeric|mobile|is_unique[users.mobile]'),
        array('field' => 'user[drive]', 'label' => '驾驶证号', 'rules' => 'required|alpha_numeric|card'),
        array('field' => 'user[password]', 'label' => '登录密码', 'rules' => 'required'),
        array('field' => 'user[repassword]', 'label' => '确认密码', 'rules' => 'matches[user[password]]')
    );

    public function create($entity) {
        if ($this->validation($entity, 'add') === true) {
            $entity['password'] = md5($entity['password']);
            unset($entity['repassword']);
        }
        return parent::create($entity);
    }

    public function set_handbook($users) {
        $ids = array();
        foreach ($users as $user) {
            $ids[] = $user->id;
        }
        $ids = array_unique($ids);
        $this->load->model('Handbook_model', 'handbook');
        $handbooks = $this->handbook->db->where_in('user_id', join(',', $ids))->get($this->handbook->table)->result();
        foreach ($handbooks as $handbook) {
            foreach ($users as $user) {
                if ($handbook->user_id == $user->id) {
                    $user->handbook = $handbook;
                    break;
                }
            }
        }
        return $users;
    }
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */