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
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin?src=movie_detail&book=yes&movie_id=' . $id);
            exit;
        }

        $data['schedule'] = $this->tayangan_model->get_detail($id);
        $data['movie'] = $this->film_model->get_detail($data['schedule']->id_film);
        $data['cinema'] = $this->bioskop_model->get_detail($data['schedule']->id_bioskop);
        $data['order'] = $this->order_model->get_detail($id);
        $this->template->load('main/template', 'main/book_ticket', $data);
    }

    public function process()
    {
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin?src=movie_detail&book=yes&movie_id=' . $this->input->post('id'));
            exit;
        }

        $nomor_kursi = $this->input->post('nomor_kursi');
        $arr_kursi = explode(',', $nomor_kursi);
        $id_tayang = $this->input->post('id_tayang');
        $arr_kursi_booked = [];

        foreach ($arr_kursi as $v) {
            $check = $this->db->select("1")
                ->from("orders")
                ->where("id_tayang", $id_tayang)
                ->like("nomor_kursi", $v)
                ->get()
                ->row();

            if ($check) {
                array_push($arr_kursi_booked, $v);
            }
        }

        if (count($arr_kursi_booked) > 0) {
            $msg = "Maaf, kursi " . join(", ", $arr_kursi_booked) . " tidak tersedia";
            $json = [
                "code" => 2,
                "msg" => $msg
            ];
            echo json_encode($json);
            return;
        }

        $order_count = $this->order_model->get_count() + 1;

        $kd_order = strtotime('now') . '00' . $this->session->userdata('sess_id') . $order_count;
        $data = array(
            'kd_order' => $kd_order,
            'id_tayang' => $id_tayang,
            'id_user' => $this->session->userdata('sess_id'),
            'nomor_kursi' => $nomor_kursi,
            'status' => 'PENDING',
            'total' => $this->input->post('total')
        );

        $this->order_model->insert($data);

        $data2 = [
            "code" => 1,
            "msg" => "SUCCESS",
            "data" => [
                "kd_order" => $kd_order
            ]
        ];

        echo json_encode($data2);
    }

    public function pay($kd_order)
    {
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }

        $order = $this->order_model->get_by_kd($kd_order);

        $data['order'] = $order;

        $this->template->load('main/template', 'main/pay', $data);
    }

    public function update_status($id)
    {
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }

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
