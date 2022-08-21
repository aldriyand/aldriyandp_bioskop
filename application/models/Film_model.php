<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film_model extends CI_Model
{
    protected $table_name = "film";

    public function get_detail($id)
    {
        return $this->db->where('id', $id)
            ->get($this->table_name)
            ->row();
    }

    public function get_list()
    {
        return $this->db->get($this->table_name)
            ->result();
    }

    public function get_list_latest()
    {
        return $this->db->where('is_playing', 'Y')
            ->order_by('tgl_launch', 'desc')
            ->get($this->table_name, 3)
            ->result();
    }

    public function get_list_playing()
    {
        return $this->db->where('is_playing', 'Y')
            ->order_by('tgl_launch', 'desc')
            ->get($this->table_name)
            ->result();
    }

    public function get_list_where($condition)
    {
        return $this->db->where($condition)
            ->get($this->table_name)
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
