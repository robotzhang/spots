<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner_model extends MY_Model
{
    var $table = 'partners';
    var $validation = array(
        array('field' => 'partner[name]', 'label' => '账号', 'rules' => 'trim|required|max_length[255]'),
        array('field' => 'partner[password]', 'label' => '密码', 'rules' => 'trim|required|min_length[6]')
    );
}

/* End of file topic_model.php */
/* Location: ./application/models/topic_model.php */