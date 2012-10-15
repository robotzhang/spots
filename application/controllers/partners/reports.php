<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }


    public function index() {
        redirect('partners/reports/day');
    }

    public function all() {
        $this->get_report_data(null, null);
    }

    public function day($day=0) {
        $time_start = date('Y-m-d 00:00:00');
        $time_end = date('Y-m-d 23:59:59');
        $this->get_report_data($time_start, $time_end);
    }

    public function week($week=0) {
        $time_start = date('Y-m-d 00:00:00', mktime() - (date("w")-1) * 86400);
        $time_end = date('Y-m-d 23:59:59');
        $this->get_report_data($time_start, $time_end);
    }

    public function month($month=0) {
        $time_start = date('Y-m-1 00:00:00');
        $time_end = date('Y-m-d 23:59:59');
        $this->get_report_data($time_start, $time_end);
    }

    // 导出报表
    public function export() {
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->find_by('partner_id', current_partner()->id);
        $this->load->model('Ticket_model', 'ticket');
        $spots = $this->ticket->count_for_spots($spots);
        $tickets = $this->ticket->get_tickets($spots[0]->id);
        $output = $this->load->view('partners/reports/export',array('spots' => $spots, 'tickets' => $tickets), true);
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="report.csv"');
        echo $output;
    }

    private function get_report_data($time_start, $time_end) {
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->find_by('partner_id', current_partner()->id);
        $this->load->model('Ticket_model', 'ticket');
        $spots = $this->ticket->count_for_spots($spots, $time_start, $time_end);
        // 获取门票信息
        $page = $this->input->get('page');
        $tickets = $this->ticket->get_tickets($spots[0]->id, $time_start, $time_end, (is_numeric($page) ? $page : 1));
        $this->load->library('page', array('total' => empty($spots[0]->ticket_counts) ? 0 : $spots[0]->ticket_counts));
        $this->layout->view('partners/reports/index', array(
            'spots' => $spots,
            'tickets' => $tickets,
            'pagination' => $this->page->create(),
            'time_start' => $time_start,
            'time_end' => $time_end
        ));
    }
}

/* End of file partners/reports.php */
/* Location: ./application/controllers/partners/reports.php */