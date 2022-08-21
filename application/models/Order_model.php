<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    protected $table_name = "orders";

    public function get_detail($id)
    {
        return $this->db->where('id', $id)
            ->get($this->table_name)
            ->row();
    }

    public function get_by_kd($kd)
    {
        return $this->db->where('kd_order', $kd)
            ->get($this->table_name)
            ->row();
    }

    public function get_where($condition)
    {
        return $this->db->where($condition)
            ->get($this->table_name)
            ->result();
    }

    public function get_list()
    {
        return $this->db->get($this->table_name)
            ->result();
    }

    public function get_list_all()
    {
        return $this->db->select('t.id, t.kd_order, t.nomor_kursi, t.status, t.total, y.judul_film, b.nama_bioskop')
            ->from($this->table_name . ' t')
            ->join('tayangan y', 't.id_tayang = y.id')
            ->join('film f', 'y.id_film = f.id')
            ->join('bioskop b', 'y.id_bioskop = b.id')
            ->get()
            ->result();
    }

    public function get_count()
    {
        return $this->db->count_all($this->table_name);
    }

    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }

    public function update($data, $condition)
    {
        $this->db->update($this->table_name, $data, $condition);
    }

    public function delete($condition)
    {
        return $this->db->delete($this->table_name, $condition);
    }
}
