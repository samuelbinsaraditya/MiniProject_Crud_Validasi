<?php
class Feedback_model extends CI_Model
{
    private $_table = "feedback";

    // Fungsi Validasi [cite: 1429]
    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[32]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[32]'
            ],
            [
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'required'
            ]
        ];
    }

    // Fungsi untuk mengambil semua feedback
    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    // Fungsi untuk menyimpan feedback baru
    public function insert($feedback)
    {
        if(!$feedback){
            return;
        }
        return $this->db->insert($this->_table, $feedback);
    }

    // Fungsi untuk menghapus feedback
    public function delete($id)
    {
        if(!$id){
            return;
        }
        $this->db->delete($this->_table, ['id' => $id]);
    }

    // Fungsi untuk menghitung total feedback di Dashboard
    public function count(){
        return $this->db->count_all($this->_table);
    }
}