<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }

    public function index()
    {
        $data['order'] = $this->order_model->get_where(['id_user' => $this->session->userdata('sess_id')]);
        $this->template->load('main/template', 'main/my-tickets', $data);
    }
}
