<?php
class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
    }

    public function show($slug = null) {
        if (!$slug) {
            show_404();
        }

        $data['article'] = $this->article_model->find_by_slug($slug);

        if (!$data['article']) {
            show_404();
        }

        $this->load->view('article_show', $data);
    }
}