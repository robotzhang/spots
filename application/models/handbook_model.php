<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handbook_model extends MY_Model
{
    var $table = 'handbooks';
    var $validation = array(
        array('field' => 'handbook[unique_id]', 'label' => '景区手册识别码', 'rules' => 'trim|required|is_unique[handbooks.unique_id]')
    );

    // 景点手册是否被使用
    public function can_used($unique_id) {
        if (empty($unique_id)) {
            $this->errors['unique_id'] = '请输入手册id';
            return false;
        }
        $handbook = current($this->find_by('unique_id', $unique_id));
        if (empty($handbook)) {
            $this->errors['unique_id'] = '非法的手册id';
            return false;
        }
        if ($handbook->is_used == 'Y') {
            $this->errors['unique_id'] = '景点手册id已经被使用';
            return false;
        }

        return true;
    }

    public function count($where=array()) {
        return $this->db->where($where)->count_all_results($this->table);
    }
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */