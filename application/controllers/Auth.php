<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function signin()
    {
        $src = $this->input->get('src') ?? '';
        $movie_id = $this->input->get('movie_id') ?? '';
        $book = $this->input->get('book') ?? '';

        if (isset($_POST['submit'])) {
            $email = $this->db->escape_str($this->input->post('email', true));
            $password = $this->input->post('password', true);

            $user = $this->user_model->get_user($email, $password);

            if ($user) {
                $sess = [
                    'sess_login' => true,
                    'sess_id' => $user->id,
                    'sess_email' => $user->email,
                    'sess_level' => $user->level
                ];
                $this->session->set_userdata($sess);

                if ($user->level == 'admin') {
                    redirect(base_url() . 'administrator/dashboard', 'refresh');
                    exit;
                }
                if ($src == 'movie_detail') {
                    if ($book == 'yes') {
                        redirect(base_url() . 'book-ticket/' . $movie_id);
                        exit;
                    }
                    redirect(base_url() . 'movie/' . $movie_id, 'refresh');
                    exit;
                }
                redirect(base_url(), 'refresh');
                exit;
            }
            echo $this->session->set_flashdata('message', '<div class="text-danger"><center>User not found.</center></div>');
        }

        if ($this->session->userdata('sess_login')) {
            if ($this->session->userdata('sess_level') == 'admin') {
                redirect('administrator/dashboard', 'refresh');
            }
            if ($src == 'movie_detail') {
                if ($book == 'yes') {
                    redirect('book-ticket/' . $movie_id, 'refresh');
                }
                redirect('movie/' . $movie_id, 'refresh');
            }
            redirect('/', 'refresh');
        }

        $data['src'] = $src;
        $data['movie_id'] = $movie_id;
        $data['book'] = $book;
        $this->load->view('auth/login', $data);
    }

    public function signup()
    {
        if (isset($_POST['submit'])) {
            $email = $this->db->escape_str($this->input->post('email'));
            $password = $this->input->post('password');

            $user = $this->user_model->get_user($email, $password);
            if ($user) {
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Email sudah digunakan.</center></div>');
                redirect('auth/signup');
            }

            $data = array(
                'email' => $email,
                'password' => $password,
                'level' => 'user'
            );
            $user = $this->user_model->create($data);
            $user = $this->user_model->get_user($email, $password);

            $sess = [
                'sess_login' => true,
                'sess_id' => $user->id,
                'sess_email' => $user->email,
                'sess_level' => $user->level
            ];
            $this->session->set_userdata($sess);
            if ($user->level == 'admin') {
                redirect('administrator/dashboard', 'refresh');
            }
            redirect('/', 'refresh');
        }

        $data['src'] = !empty($this->input->get('src')) ? $this->input->get('src') : '';
        $data['movie_id'] = !empty($this->input->get('movie')) ? $this->input->get('movie') : '';
        $this->load->view('auth/register', $data);
    }

    public function signout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}
