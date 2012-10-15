<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('layout/partners');
    }

	public function sale() {
        if (empty($_POST)) {
            return $this->layout->view('partners/tickets/sale', array('spots' => $this->get_spots()));
        }
        $this->load->model('Ticket_model', 'ticket');
        $ticket = $this->input->post('ticket');
        if ($this->ticket->create($ticket)) {
            $this->session->set_flashdata('message', '门票成功售出.');
            redirect('partners/tickets/sale');
        } else {
            $data = array(
                'spots' => $this->get_spots(),
                'ticket' => $ticket,
                'mobile' => $this->input->post('mobile'),
                'errors' => $this->ticket->errors
            );
            return $this->layout->view('partners/tickets/sale', $data);
        }
    }

    private function get_spots() {
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->find_by('partner_id', current_partner()->id);
        return $spots;
    }
}

/* End of file admin/admin.php */
/* Location: ./application/controllers/admin/admin.php */