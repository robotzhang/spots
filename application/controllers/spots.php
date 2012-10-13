<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spots extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Spot_model', 'spot');
    }

    public function index() {
        $provinces = $this->spot->provinces();
        $province = urldecode($this->input->get('province'));
        $province = empty($province) ? $provinces[0]->name : $province;
        $spots = $this->spot->get(array('province' => $province), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->spot->last_query_number));
        $this->layout->view('spots/index', array('spots' => $spots, 'provinces' => $provinces,'pagination' => $this->page->create()));
    }

    public function show($id) {
        $spot = current($this->spot->find_by('id', $id));
        $this->layout->view('spots/show', array('spot' => $spot, 'spots' => $this->spot->top10()));
    }
}

/* End of file spots.php */
/* Location: ./application/controllers/spots.php */