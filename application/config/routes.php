<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['my'] = "my/my";
$route['rooms/(:num)'] = "rooms/show/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */