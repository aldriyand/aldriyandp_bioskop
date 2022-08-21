<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sess_login') != true) {
            redirect('auth/signin');
            exit;
        }
    }

    public function index()
    {
        $this->template->load('administrator/template', 'administrator/dashboard');
    }
}
