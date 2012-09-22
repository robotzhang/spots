<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!is_admin()) {
            return redirect(site_url('login?url='.current_url()));
        }
        $this->load->model('Movie_model', 'movie');
        $this->layout->setLayout('layout/admin');
    }

    public function index()
    {
        $movies = $this->movie->get(array(), $this->input->get('page'), 20);
        $this->load->library('page', array('total' => $this->movie->last_query_number));
        $this->layout->view('admin/movies/index', array('movies' => $movies, 'pagination' => $this->page->create()));
    }

    public function create()
    {
        if (empty($_POST)) {
            return $this->layout->view('admin/movies/form');
        }
        $movie = $this->input->post('movie');
        if (count($this->movie->find_by('douban_id', $movie['douban_id'])) > 0) {
            $this->session->set_flashdata('info', 'id：'.$movie['douban_id'].'已经爬取');
            redirect(site_url('admin/movies'));
            return;
        }
        $this->movie->create($movie);
        redirect(site_url('admin/movies'));
    }

	public function spider() {
        if (empty($_GET['id'])) {
            return $this->layout->view('admin/movies/spider_form');
        }
        if (count($this->movie->find_by('douban_id', $_GET['id'])) > 0) {
            $this->session->set_flashdata('info', sprintf("%d 已经爬取,因为豆瓣请求数的限制，请不要重复爬取", $_GET['id']));
            redirect(site_url('admin/movies/spider'));
            return;
        }
        $this->load->helper('douban');
        $url = sprintf("http://api.douban.com/movie/subject/%d?alt=json", $_GET['id']);
        $data = array('movie' => parse_douban_movie_to_array( json_decode(file_get_contents($url)) ));
        $this->layout->view('admin/movies/spider', $data);
	}

    public function edit()
    {
        $id = $this->input->get('id');
        $movie = current($this->movie->find_by('id', $id));
        return $this->layout->view('admin/movies/form', array('movie' => $movie));
    }

    public function update()
    {
        $movie = $this->input->post('movie');
        if ($this->movie->update($movie)) {
            redirect(site_url('admin/movies'));
        } else {
            $this->layout->view('admin/movies', array('errors' => '更新的过程中有错误发生'));
        }
    }

    public function delete()
    {
        $this->movie->delete($this->input->get('id'));
        redirect(site_url('admin/movies'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */