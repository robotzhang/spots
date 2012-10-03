<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner_model extends MY_Model
{
    var $table = 'partners';
    var $validation = array(
        array('field' => 'partner[name]', 'label' => '账号', 'rules' => 'trim|required|max_length[255]'),
        array('field' => 'partner[password]', 'label' => '密码', 'rules' => 'trim|required|min_length[6]')
    );

    public function repassword($id, $password_old, $password_new, $password_confirm) {
        $partner = current($this->find_by('id', $id));
        if (empty($partner)) {
            $this->errors['partner'] = '用户不存在';
            return false;
        }
        if (md5($password_old) != $partner->password) {
            $this->errors['password_old'] = '原密码不正确';
            return false;
        }
        if (empty($password_new)) {
            $this->errors['password_new'] = '新密码不能为空';
            return false;
        }
        if ($password_new != $password_confirm) {
            $this->errors['password_confirm'] = '新密码和确认密码不一致';
            return false;
        }
        $entity = array(
            'id' => $partner->id,
            'password' => md5($password_new)
        );
        return $this->update($entity, array(), false);
    }
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */