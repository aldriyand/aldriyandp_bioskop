<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('film_model');
        $this->load->model('tayangan_model');
        $this->load->model('bioskop_model');
    }

    public function index($id)
    {
        $kota = $this->input->get('kota') ?? '';

        $data['movie'] = $this->film_model->get_detail($id);
        $data['cinema'] = $this->bioskop_model->get_list_where(['kota' => $kota]);
        $data['schedule'] = $this->tayangan_model->get_list_where(['f.id' => $id, 'b.kota' => $kota]);
        $this->template->load('main/template', 'main/movie_detail', $data);
    }
}
