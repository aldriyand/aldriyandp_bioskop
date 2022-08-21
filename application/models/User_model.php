<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table_name = "users";

    public function get_user($email, $password)
    {
        return $this->db
            ->where('email', $email)
            ->where('password', $password)
            ->get($this->table_name)
            ->row();
    }

    public function create($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
}
