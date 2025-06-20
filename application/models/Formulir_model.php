<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database library sudah diload
    }

    // Fungsi untuk menyimpan data peserta didik
    public function insert_peserta_didik($data) {
        return $this->db->insert('peserta_didik', $data);
    }

    // Fungsi untuk menyimpan data ayah kandung
    public function insert_ayah_kandung($data) {
        return $this->db->insert('ayah_kandung', $data);
    }

    // Fungsi untuk menyimpan data ibu kandung
    public function insert_ibu_kandung($data) {
        return $this->db->insert('ibu_kandung', $data);
    }

    // Fungsi untuk menyimpan data wali peserta
    public function insert_wali_peserta($data) {
        return $this->db->insert('wali_peserta', $data);
    }

    // Fungsi untuk menyimpan data periodik peserta
    public function insert_periodik_peserta($data) {
        return $this->db->insert('periodik_peserta', $data);
    }

    // Anda juga bisa menambahkan fungsi untuk mendapatkan id terakhir yang di-insert
    // Jika Anda perlu menghubungkan data (misal: id_peserta_didik di tabel ayah)
    public function get_last_insert_id() {
        return $this->db->insert_id();
    }
}