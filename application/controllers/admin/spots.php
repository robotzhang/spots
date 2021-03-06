<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spots extends CI_Controller {
    public function __construct() {
        parent::__construct();
        /*if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }*/
        $this->load->model('Spot_model', 'spot');
        $this->layout->setLayout('layout/admin');
    }
	public function index() {
        $spots = $this->spot->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->spot->last_query_number));
		$this->layout->view('admin/spots/index', array('spots' => $spots, 'pagination' => $this->page->create()));
	}

    public function create() {
        if (empty($_POST)) {
            return $this->layout->view('admin/spots/form');
        }

        $spot = $this->input->post('spot');
        $spot['image'] = $this->upload();
        if ($this->spot->create($spot)) {
            redirect('admin/spots/index');
        } else {
            $spot['errors'] = $this->spot->errors;
            return $this->layout->view('admin/spots/form', array('spot' => (object)$spot));
        }
    }

    public function edit($id) {
        $spot = current($this->spot->find_by('id', $id));
        $this->layout->view('admin/spots/form', array('spot' => $spot));
    }

    public function update() {
        $spot = $this->input->post('spot');
        $spot_image = $this->upload();
        if (!empty($spot_image)) {
            $spot['image'] = $spot_image;
        }
        if ($this->spot->update($spot)) {
            redirect('admin/spots/index');
        } else {
            $spot['errors'] = $this->spot->errors;
            return $this->layout->view('admin/spots/form', array('spot' => (object)$spot));
        }
    }

    public function delete($id) {
        $this->spot->delete($id);
        redirect('admin/spots/index');
    }

    private function upload() {
        $config['upload_path'] = getcwd().'./uploads/spots';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '4048';
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $data = $this->upload->data();
            return '/uploads/spots/'.$data['file_name'];
        } else {
            return '';
        }
    }

}

/* End of file admin/spots.php */
/* Location: ./application/controllers/admin/spots.php */