<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }
        $this->load->model('Topic_model', 'topic');
        $this->layout->setLayout('layout/admin');
    }

    public function index()
    {
        $topics = $this->topic->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->topic->last_query_number));
        $this->layout->view('admin/topics/index', array('topics' => $topics, 'pagination' => $this->page->create()));
    }

    public function create()
    {
        if (empty($_POST)) {
            return $this->layout->view('admin/topics/form');
        }
        $topic = $this->input->post('topic');
        if (count($this->topic->find_by('name', $topic['name'])) > 0) {
            redirect(site_url('admin/topics/form'));
            return;
        }
        $this->topic->create($topic);
        redirect(site_url('admin/topics'));
    }

    public function edit()
    {
        $id = $this->input->get('id');
        $topic = current($this->topic->find_by('id', $id));
        return $this->layout->view('admin/topics/form', array('topic' => $topic));
    }

    public function update()
    {
        $topic = $this->input->post('topic');
        if ($this->topic->update($topic)) {
            redirect(site_url('admin/topics'));
        } else {
            $this->layout->view('admin/topics', array('errors' => '更新的过程中有错误发生'));
        }
    }

    public function delete()
    {
        $this->topic->delete($this->input->get('id'));
        redirect(site_url('admin/topics'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */