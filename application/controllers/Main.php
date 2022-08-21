<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('film_model');
    }

    public function index()
    {
        $data['latest'] = $this->film_model->get_list_latest();
        $data['playing'] = $this->film_model->get_list_playing();

        $this->template->load('main/template', 'main/home', $data);
    }
}
