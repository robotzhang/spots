<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->layout->setLayout('layout/my');
    }

    public function index() {
        redirect('my/tickets');
    }

    public function time_line() {
        // 验证用户手机是否验证，手册id是否存在
        if (current_user()->is_validation == 'N') {
            $this->load->model('Handbook_model', 'handbook');
            $handbook = current($this->handbook->find_by('user_id', current_user()->id));
            if (empty($handbook)) { // 手册id不存在，说明账号异常
                return show_error('非法的用户参数——未找到手册id，请联系客服' , 200, '抱歉，用户帐号错误');
            }
            return redirect(site_url(sprintf("users/check_mobile?mobile=%s&unique_id=%s") ,current_user()->mobile, $handbook->unique_id));
        }
        $this->load->model('Ticket_model', 'ticket');
        $this->load->model('Handbook_model', 'handbook');
        $handbook = current($this->handbook->get(array('user_id' => current_user()->id, 'is_used' => 'Y')));
        $tickets = $this->ticket->find_by('user_id', current_user()->id);
        $tickets = $this->ticket->set_spots($tickets);
        $this->layout->view('my/index.php', array('tickets' => $tickets, 'handbook' => $handbook));
    }
}

/* End of file admin/users.php */
/* Location: ./application/controllers/admin/users.php */