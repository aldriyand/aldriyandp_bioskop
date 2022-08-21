<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sess_login') != true) {
            redirect(base_url() . 'auth/signin');
            exit;
        }
        $this->load->model('film_model');
    }

    public function index()
    {
        $data['movies'] = $this->film_model->get_list();
        $this->template->load('administrator/template', 'administrator/movies', $data);
    }

    public function add()
    {
        $this->template->load('administrator/template', 'administrator/movies_add');
    }

    public function create()
    {
        $config['upload_path'] = 'uploads/movies/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $result = $this->upload->data();

        $kd_film = $this->generate_kd_film($this->input->post('judul_film'));

        $data = array(
            'kd_film' => $kd_film,
            'judul_film' => $this->input->post('judul_film'),
            'genre' => $this->input->post('genre'),
            'durasi' => $this->input->post('durasi'),
            'rating' => $this->input->post('rating'),
            'tgl_launch' => $this->input->post('tgl_launch'),
            'synopsys' => $this->input->post('synopsys'),
            'image_path' => $result['file_name'],
            'produser' => $this->input->post('produser'),
            'sutradara' => $this->input->post('sutradara'),
            'produksi' => $this->input->post('produksi'),
            'cast' => $this->input->post('cast'),
            'is_playing' => $this->input->post('is_playing') == true ? 'Y' : 'N',
        );

        $this->film_model->insert($data);

        return redirect(base_url() . 'admin/movies');
    }

    public function edit($id)
    {
        $data['movie'] = $this->film_model->get_detail($id);
        $this->template->load('administrator/template', 'administrator/movies_edit', $data);
    }

    public function update()
    {
        $config['upload_path'] = 'uploads/movies/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $result = $this->upload->data();

        $data = array(
            'kd_film' => $this->generate_kd_film($this->input->post('judul_film')),
            'judul_film' => $this->input->post('judul_film'),
            'genre' => $this->input->post('genre'),
            'durasi' => $this->input->post('durasi'),
            'rating' => $this->input->post('rating'),
            'tgl_launch' => $this->input->post('tgl_launch'),
            'synopsys' => $this->input->post('synopsys'),
            'produser' => $this->input->post('produser'),
            'sutradara' => $this->input->post('sutradara'),
            'produksi' => $this->input->post('produksi'),
            'cast' => $this->input->post('cast'),
            'is_playing' => $this->input->post('is_playing') == true ? 'Y' : 'N',
        );

        if ($result['file_name'] != '') {
            $data['image_path'] = $result['file_name'];
        }

        $condition = array(
            'id' => $this->input->post('id')
        );

        $this->film_model->update($data, $condition);

        return redirect(base_url() . 'admin/movies');
    }

    public function delete($id)
    {
        $this->film_model->delete([
            'id' => $id
        ]);
        return redirect(base_url() . 'admin/movies');
    }

    public function generate_kd_film($judul_film)
    {
        $code = "";
        $seq = "0";
        $movie_count = $this->film_model->get_count();

        $movie_count = intval($movie_count) + 1;
        if (strlen(strval($movie_count)) == 1) {
            $seq = "00" . $movie_count;
        } elseif (strlen(strval($movie_count)) == 2) {
            $seq = "0" . $movie_count;
        } else {
            $seq = $movie_count;
        }

        $consonants = array(
            "b", "c", "d", "f", "g", "h", "j", "k", "l", "m",
            "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"
        );

        $vowels = array("a", "i", "u", "e", "o");

        $word_count = str_word_count($judul_film);
        if ($word_count > 1) {
            $count = 0;

            // Konsonan kata pertama
            $first_word = strtok($judul_film, " ");
            $first_word_chars = str_split(strtolower($first_word));
            foreach ($first_word_chars as $i) {
                if (in_array($i, $consonants)) {
                    $count++;
                    $code .= strtoupper($i);
                    break;
                }
            }

            // Konsonan kata terakhir
            $last_word_pos = strrpos($judul_film, " ") + 1;
            $last_word = substr($judul_film, $last_word_pos);
            $last_word_chars = str_split(strtolower($last_word));
            foreach ($last_word_chars as $i) {
                if (in_array($i, $consonants)) {
                    $count++;
                    $code .= strtoupper($i);
                    break;
                }
            }

            // Jika 0 konsonan, tambahkan vokal
            if ($count == 0) {
                foreach ($first_word_chars as $i) {
                    if (in_array($i, $vowels)) {
                        $count++;
                        $code .= strtoupper($i);
                        break;
                    }
                }
                foreach ($last_word_chars as $i) {
                    if (in_array($i, $vowels)) {
                        $count++;
                        $code .= strtoupper($i);
                        break;
                    }
                }
            }

            // Jika hanya 1 konsonan, tambahkan vokal
            if ($count == 1) {
                // foreach ($first_word_chars as $i) {
                //     if (in_array($i, $vowels)) {
                //         $code .= strtoupper($i);
                //         break;
                //     }
                // }
                foreach ($last_word_chars as $i) {
                    if (in_array($i, $vowels)) {
                        $code .= strtoupper($i);
                        break;
                    }
                }
            }

            $code .= $seq;
        } elseif ($word_count == 1) {
            $count = 0;
            $word_chars = str_split(strtolower($judul_film));
            foreach ($word_chars as $i) {
                if ($count == 2) {
                    break;
                }
                if (in_array($i, $consonants)) {
                    $count++;
                    $code .= strtoupper($i);
                }
            }

            // Jika 0 konsonan, tambahkan vokal
            if ($count == 0) {
                foreach ($word_chars as $i) {
                    if ($count == 2) {
                        break;
                    }
                    if (in_array($i, $vowels)) {
                        $count++;
                        $code .= strtoupper($i);
                    }
                }
            }

            // Jika hanya 1 konsonan, tambahkan vokal
            if ($count == 1) {
                foreach ($word_chars as $i) {
                    if (in_array($i, $vowels)) {
                        $code .= strtoupper($i);
                        break;
                    }
                }
            }

            $code .= $seq;
        }

        return $code;
    }
}
