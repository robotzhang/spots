<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Cart extends CI_Cart {
    function __construct() {
        parent::__construct();
        $this->product_name_rules = '\d\D'; // hack CI的购物车不支持中文的问题
    }
}
/* End of file MY_Cart.php */
/* Location: ./application/libraries/MY_Cart.php */