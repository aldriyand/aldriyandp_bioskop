<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedules extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }
        $this->load->model('tayangan_model');
        $this->load->model('bioskop_model');
        $this->load->model('film_model');
    }

    public function index()
    {
        $data['schedules'] = $this->tayangan_model->get_list();
        $this->template->load('administrator/template', 'administrator/schedules', $data);
    }

    public function add()
    {
        $data['movies'] = $this->film_model->get_list_where([ "is_playing" => "Y"]);
        $data['cinemas'] = $this->bioskop_model->get_list_where([ "is_active" => "Y"]);
        $this->template->load('administrator/template', 'administrator/schedules_add', $data);
    }

    public function create()
    {
        $cinema = $this->bioskop_model->get_detail($this->input->post('id_bioskop'));
        $movie = $this->film_model->get_detail($this->input->post('id_film'));

        $data = array(
            'kd_tayang' => $this->generate_kd_tayang($cinema->kd_bioskop, $this->input->post('tgl_tayang'), $movie->kd_film),
            'id_film' => $this->input->post('id_film'),
            'id_bioskop' => $this->input->post('id_bioskop'),
            'judul_film' => $movie->judul_film,
            'tgl_tayang' => $this->input->post('tgl_tayang'),
            'jumlah_kursi' => $this->input->post('jumlah_kursi'),
            'is_active' => 'Y',
        );

        $this->tayangan_model->insert($data);

        return redirect(base_url() . 'admin/schedules');
    }

    public function edit($id)
    {
        $data['movies'] = $this->film_model->get_list_where([ "is_playing" => "Y"]);
        $data['cinemas'] = $this->bioskop_model->get_list_where([ "is_active" => "Y"]);
        $data['schedule'] = $this->tayangan_model->get_detail($id);
        $this->template->load('administrator/template', 'administrator/schedules_edit', $data);
    }

    public function update()
    {
        $cinema = $this->bioskop_model->get_detail($this->input->post('id_bioskop'));
        $movie = $this->film_model->get_detail($this->input->post('id_film'));

        $data = array(
            'kd_tayang' => $this->generate_kd_tayang($cinema->kd_bioskop, $this->input->post('tgl_tayang'), $movie->kd_film),
            'id_film' => $this->input->post('id_film'),
            'id_bioskop' => $this->input->post('id_bioskop'),
            'judul_film' => $movie->judul_film,
            'tgl_tayang' => $this->input->post('tgl_tayang'),
            'jumlah_kursi' => $this->input->post('jumlah_kursi'),
            'is_active' => $this->input->post('is_active') == true ? 'Y' : 'N',
        );

        $condition = array(
            'id' => $this->input->post('id')
        );

        $this->tayangan_model->update($data, $condition);

        return redirect(base_url() . 'admin/schedules');
    }

    public function delete($id)
    {
        $this->tayangan_model->delete([
            'id' => $id
        ]);
        return redirect(base_url() . 'admin/schedules');
    }

    public function generate_kd_tayang($kd_bioskop, $tgl_tayang, $kd_film)
    {
        $sched_count = $this->tayangan_model->get_count();

        $sched_count = intval($sched_count) + 1;
        $seq = "0000" . strval($sched_count);
        $seq = substr($seq, strlen($seq) - 5);

        $tgl = strtotime($tgl_tayang);
        $tgl_tayang = date("dmYHi", $tgl);

        return $kd_bioskop . $tgl_tayang . $kd_film . $seq;
    }
}
