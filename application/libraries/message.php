<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 发送短信类
 * @author 黑暗人魔
 * @date 2010-10-30 中秋节
 * */
class Message
{
    var $CI;// CI系统库
	function __construct() {
		$this->CI = & get_instance();// 不是在controller中可以通过这种方法获取CI的实例
	}

	/**
	 * 发送信息到手机中
	 * @param $phone 发送的手机号码，目前支持一个手机号
     * @param $message 要发送的消息
	 * @return 发送成功返回 TRUE 否则返回出错信息
	 */
	public function mobile($phone, $message)
	{
		$url = sprintf("http://sdkhttp.eucp.b2m.cn/sdkproxy/asynsendsms.action?cdkey=3SDK-VBF-0130-KEYOO&password=621924&phone=%s&message=%s",
		    $phone,
		    $message
		);
		
		$response = file_get_contents($url);
		if (strpos('<error>0</error>', $response) !== FALSE) {
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file remind.php */
/* Location: ./application/libraries/remind.php */