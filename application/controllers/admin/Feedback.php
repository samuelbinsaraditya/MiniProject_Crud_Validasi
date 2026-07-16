<?php
class Feedback extends CI_Controller
{
    public function index()
    {
        $this->load->model('feedback_model');
        $data['feedbacks'] = $this->feedback_model->get();
        if(count($data['feedbacks']) <= 0){
            $this->load->view('admin/feedback_empty');
        } else {
            $this->load->view('admin/feedback_list', $data);
        }
    }

    public function delete($id = null)
    {
        // Jika tidak ada ID yang dipilih, tampilkan error 404
        if (!$id) {
            show_404();
        }

        // Load model dan jalankan fungsi hapus berdasarkan ID
        $this->load->model('feedback_model');
        $this->feedback_model->delete($id);

        // Tampilkan pesan sukses dan kembalikan ke halaman list feedback
        $this->session->set_flashdata('message', 'Feedback berhasil dihapus');
        redirect('admin/feedback');
    }
}
