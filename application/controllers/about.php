<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        redirect('about/company');
    }
    // 公司介绍
    public function company() {
        $this->layout->view('about/company');
    }
    // 活动介绍
    public function active() {
        $this->layout->view('about/active');
    }
    // 线路推荐
    public function lines() {
        $this->layout->view('about/lines');
    }
    // 路书
    public function books() {
        $this->layout->view('about/books');
    }
    // 旅行工具
    public function tools() {
        $this->layout->view('about/tools');
    }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */