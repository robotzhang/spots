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
            $ticket_saled = current($this->ticket->find_by('id', $this->ticket->db->insert_id()));
            $this->load->model('User_model', 'user');
            $ticket_saled->user = current($this->user->find_by('id', $ticket_saled->user_id));
            $this->session->set_flashdata('message', '门票成功售出.');
            $this->session->set_flashdata('ticket_saled', $ticket_saled);
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