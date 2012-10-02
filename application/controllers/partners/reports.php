<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }


    public function index() {
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->find_by('partner_id', current_partner()->id);

        $this->load->model('Ticket_model', 'ticket');
        $spots = $this->ticket->count_for_spots($spots);
        $this->layout->view('partners/reports/index', array('spots' => $spots));
    }
}

/* End of file partners/reports.php */
/* Location: ./application/controllers/partners/reports.php */