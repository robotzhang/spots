<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| 利用codeigniter的钩子系统实现的权限系统 基于url控制
| @author 黑暗人魔
| @date 2011/07/08
| @contact QQ:445679586 Email:cqurobot@163.com
| -------------------------------------------------------------------
*/
class Role
{
	private $CI;
	function __construct()
	{
		$this->CI = & get_instance();
	}
	
	public function filter()
	{
        $admin = $this->CI->session->userdata('admin');
        $partner = $this->CI->session->userdata('partner');
		$controller = $this->CI->uri->segment(1);
        $action = $this->CI->uri->segment(2);

		if ($controller == 'admin' && $action != 'login') {
			if (!$admin) {
				redirect('admin/login');
				exit();
			}
		}
        if ($controller == 'partners' && empty($partner) && $action != 'login') {
            redirect('partners/login');
            exit();
        }
	}
	
}


/* End of file GFW.php */
/* Location: ./application/config/GFW.php */