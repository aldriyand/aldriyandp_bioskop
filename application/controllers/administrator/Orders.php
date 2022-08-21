<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }
        $this->load->model('order_model');
    }

    public function index()
    {
        $data['orders'] = $this->order_model->get_list_all();
        $this->template->load('administrator/template', 'administrator/orders', $data);
    }

    public function add()
    {
        $this->template->load('administrator/template', 'administrator/orders_add');
    }

    public function edit($id)
    {
        $data['order'] = $this->order_model->get_detail($id);
        $this->template->load('administrator/template', 'administrator/orders_edit', $data);
    }

    public function verify($id)
    {
        $data = array(
            'status' => 'VERIFIED',
        );

        $condition = array(
            'id' => $id
        );

        $this->order_model->update($data, $condition);

        return redirect(base_url() . 'admin/orders');
    }

    public function delete($id)
    {
        $this->order_model->delete([
            'id' => $id
        ]);
        return redirect(base_url() . 'admin/orders');
    }
}
