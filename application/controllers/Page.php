<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function index()
    {
        // (Ini adalah method untuk halaman utama/home Anda)
        // Sesuaikan dengan kode Anda sebelumnya jika ada
        $this->load->view('home'); 
    }

    public function about()
    {
        // (Ini adalah method untuk halaman about Anda)
        $this->load->view('about');
    }

    // Ini adalah kode yang baru saja Anda kirimkan (Sudah Benar)
    public function contact()
    {
        $data['meta'] = [
            'title' => 'Contact Us',
        ];

        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            $this->load->model('feedback_model');
            
            $rules = $this->feedback_model->rules();
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('contact', $data);
            }
            
            $feedback = [
                'id' => uniqid('', true),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message')
            ];
            
            $feedback_saved = $this->feedback_model->insert($feedback);
            
            if ($feedback_saved) {
                return $this->load->view('contact_thanks');
            }
        }
        
        $this->load->view('contact', $data);
    }
}