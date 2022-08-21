<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tayangan_model extends CI_Model
{
    protected $table_name = "tayangan";

    public function get_detail($id)
    {
        return $this->db->where('id', $id)
            ->get($this->table_name)
            ->row();
    }

    public function get_list()
    {
        return $this->db->select('t.id, t.id_bioskop, t.id_film, t.kd_tayang, t.judul_film, b.nama_bioskop, t.tgl_tayang, t.jumlah_kursi, t.is_active, t.ticket_price')
            ->from($this->table_name . ' t')
            ->join('film f', 't.id_film = f.id')
            ->join('bioskop b', 't.id_bioskop = b.id')
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
