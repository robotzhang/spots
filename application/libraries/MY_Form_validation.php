<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*----------------------------------------------------
 | 自定义表单验证类，比如唯一验证，是否存在验证，扩展了ci系统的表单验证
 | @author robot(黑暗人魔)
 | @date 2011/07/04
 | @use 和ci中使用form_validation一样
 ----------------------------------------------------*/
 
class MY_Form_validation extends CI_Form_validation 
{
    var $CI;
	function __construct($rules = array()){
		parent::__construct($rules);
        $this->CI =  &get_instance();
	}

    /**
     * 验证手机号码
     */
    public function mobile($value) {
        if(preg_match("/^1\d{10}$/", $value)){
            return true;
        }else{
            $this->CI->form_validation->set_message('mobile', '%s不正确');
            return false;
        }
    }

    /**
     * 验证身份证, 15位和18位带x的
     */
    public function card($value) {
        if (preg_match("/^(?:\d{15}|\d{18}|\d{17}X)$/i", $value)){
            return true;
        } else{
            $this->CI->form_validation->set_message('card', '%s不正确');
            return false;
        }
    }
	
	/**
	 * 验证是否存在
	 * @param $value 要验证的值
	 * @param $params 参数列表例如：unique[User.email] [表名.属性名]
	 * @return 存在则返回TRUE  不存在则返回FALSE
	 */
 	public function exist($value, $params)
	{
		$CI = &get_instance();
		$CI->load->database();
		$CI->form_validation->set_message('exist', '%s不存在.');
		
		list($table, $field) = explode(".", $params, 2);
		$query = $CI->db->select($field)->from($table)->where($field, $value)->limit(1)->get();
		
		return $query->row() ? TRUE : FALSE;
	}
	
	/**
	 * 验证是否唯一
	 * @param $value 要验证的值
	 * @param $params 参数列表例如：unique[User.email] [表名.属性名]
	 * @return 存在则返回FALSE  不存在则返回TRUE
	 */
	function unique($value, $params) {
        $CI =& get_instance();  
        $CI->load->database();  
        $CI->form_validation->set_message('unique', '%s已被使用.');  

        list($table, $field) = explode(".", $params, 2);
        $query = $CI->db->select($field)->from($table)->where($field, $value)->limit(1)->get();  

        if ($query->row()) {  
            return FALSE;  
        } else {  
            return TRUE;  
        }  
	}

    /*CI不支持$_POST[user[repassword]]的match，重新以便支持*/
    function matches($str, $field) {
        if (strpos($field,'[') !== FALSE) {
            $field_arr = explode('[', str_replace(']', '', $field));
            if (!isset($_POST[$field_arr[0]])) {
                return FALSE;
            }
            $field_val = $this->get_arr_field_val($field_arr, $_POST[$field_arr[0]]);
            return ($str !== $field_val) ? FALSE : TRUE;
        }
        if (!isset($_POST[$field])) {
            return FALSE;
        }
        $field = $_POST[$field];
        return ($str !== $field) ? FALSE : TRUE;
    }

    function get_arr_field_val($arr, $post_val) {
        for ($i = 0; $i < count($arr); $i++) {
            if (isset($arr[$i + 1])) {
                if (isset ($post_val[$arr[$i + 1]])) {
                    $post_val = $post_val[$arr[$i + 1]];
                }
            }
        }
        return $post_val;
    }

}

/* End of file MY_Form_validation.php */
/* Location: ./application/core/MY_Form_validation.php */