<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Insert satu baris data ke tabel formulir_siswa
     * $data: array dengan key = nama kolom tabel, value = data inputan
     */
    public function insert($data)
    {
        return $this->db->insert('formulir_siswa', $data);
    }

    /**
     * Update satu baris data di tabel formulir_siswa berdasarkan id
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('formulir_siswa', $data);
    }

    /**
     * Delete satu baris data di tabel formulir_siswa berdasarkan id
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('formulir_siswa');
    }

    /**
     * Ambil semua data dari tabel formulir_siswa
     */
    public function get_all()
    {
        return $this->db->get('formulir_siswa')->result();
    }

    /**
     * Ambil data berdasarkan id dari tabel formulir_siswa
     */
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get('formulir_siswa')->row();
    }

    /**
     * Ambil jumlah seluruh data di tabel formulir_siswa
     */
    public function count_all()
    {
        return $this->db->count_all('formulir_siswa');
    }
}
