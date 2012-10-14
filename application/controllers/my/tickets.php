<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->layout->setLayout('layout/my');
    }

    public function index() {
        $this->load->model('Ticket_model', 'ticket');
        $tickets = $this->ticket->find_by('user_id', current_user()->id);
        //
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->get(array(), $this->input->get('page'));
        $this->load->library('page', array('total' => $this->spot->last_query_number));
        foreach($spots as $spot) {
            $spot->tickets = array();
            foreach($tickets as $ticket) {
                if ($ticket->spot_id == $spot->id) {
                    $spot->tickets[] = $ticket;
                }
            }
        }
        $this->layout->view('my/tickets/index.php', array('spots' => $spots, 'pagination' => $this->page->create()));
    }
}

/* End of file my/tickets.php */
/* Location: ./application/controllers/my/tickets.php */