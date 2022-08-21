<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('film_model');
        $this->load->model('order_model');
        $this->load->model('tayangan_model');
        $this->load->model('bioskop_model');
    }

    public function index($id)
    {
        $data['schedule'] = $this->tayangan_model->get_detail($id);
        $data['movie'] = $this->film_model->get_detail($data['schedule']->id_film);
        $data['cinema'] = $this->bioskop_model->get_detail($data['schedule']->id_bioskop);
        $data['order'] = $this->order_model->get_detail($id);
        $this->template->load('main/template', 'main/book_ticket', $data);
    }

    public function process()
    {
        $order_count = $this->order_model->get_count() + 1;

        $kd_order = strtotime('now') . '00' . $this->session->userdata('sess_id') . $order_count;
        $data = array(
            'kd_order' => $kd_order,
            'id_tayang' => $this->input->post('id'),
            'id_user' => $this->session->userdata('sess_id'),
            'nomor_kursi' => $this->input->post('nomor_kursi'),
            'status' => 'PENDING',
            'total' => $this->input->post('total')
        );

        $this->order_model->insert($data);

        $order = $this->order_model->get_by_kd($kd_order);

        $data2['order'] = $order;
        $this->template->load('main/template', 'main/pay', $data2);
    }

    public function update_status($id)
    {
        $data = array(
            'status' => 'PAID'
        );

        $condition = array(
            'id' => $id
        );

        $this->order_model->update($data, $condition);

        return redirect(base_url() . 'my-tickets');
    }
}
