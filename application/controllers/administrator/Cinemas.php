<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cinemas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }
        $this->load->model('bioskop_model');
    }

    public function index()
    {
        $data['cinemas'] = $this->bioskop_model->get_list();
        $this->template->load('administrator/template', 'administrator/cinemas', $data);
    }

    public function add()
    {
        $this->template->load('administrator/template', 'administrator/cinemas_add');
    }

    public function create()
    {
        $check = $this->bioskop_model->get_by_kd($this->input->post('kd_bioskop'));
        if ($check) {
            echo $this->session->set_flashdata('message', '<div class="text-danger"><center>Kode sudah ada.</center></div>');
            return redirect(base_url() . 'admin/cinemas/add');
        }

        $data = array(
            'kd_bioskop' => strtoupper($this->input->post('kd_bioskop')),
            'nama_bioskop' => $this->input->post('nama_bioskop'),
            'alamat_bioskop' => $this->input->post('alamat_bioskop'),
            'kota' => $this->input->post('kota'),
        );

        $this->bioskop_model->insert($data);

        return redirect(base_url() . 'admin/cinemas');
    }

    public function edit($id)
    {
        $data['cinema'] = $this->bioskop_model->get_detail($id);
        $this->template->load('administrator/template', 'administrator/cinemas_edit', $data);
    }

    public function update()
    {
        $data = array(
            'kd_bioskop' => strtoupper($this->input->post('kd_bioskop')),
            'nama_bioskop' => $this->input->post('nama_bioskop'),
            'alamat_bioskop' => $this->input->post('alamat_bioskop'),
            'kota' => $this->input->post('kota'),
        );

        $condition = array(
            'id' => $this->input->post('id')
        );

        $this->bioskop_model->update($data, $condition);

        return redirect(base_url() . 'admin/cinemas');
    }

    public function delete($id)
    {
        $this->bioskop_model->delete([
            'id' => $id
        ]);
        return redirect(base_url() . 'admin/cinemas');
    }
}
