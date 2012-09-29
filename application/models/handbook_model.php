<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handbook_model extends MY_Model
{
    var $table = 'handbooks';
    var $validation = array(
        array('field' => 'handbook[unique_id]', 'label' => '景区手册识别码', 'rules' => 'trim|required|is_unique[handbooks.unique_id]')
    );

    // 景点手册是否被使用
    public function is_used($unique_id) {
        $handbooks = $this->get(array(
            'unique_id' => $unique_id,
            'is_used' => 'N'
        ));
        return count($handbooks) > 0 ? false : true;
    }
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */