<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('film_model');
        $this->load->model('tayangan_model');
    }

    public function index($id)
    {
        $data['movie'] = $this->film_model->get_detail($id);
        $data['schedule'] = $this->tayangan_model->get_list_by_id_film($id);
        $this->template->load('main/template', 'main/movie_detail', $data);
    }
}
