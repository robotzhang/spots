<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spot_model extends MY_Model
{
    var $table = 'spots';
    var $validation = array(
        array('field' => 'spot[name]', 'label' => '景点名称', 'rules' => 'trim|required|max_length[255]|min_length[4]'),
        array('field' => 'spot[introduce]', 'label' => '景点简介', 'rules' => 'required')
    );
}

/* End of file spot_model.php */
/* Location: ./application/models/spot_model.php */