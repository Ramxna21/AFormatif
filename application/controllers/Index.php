<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation']);
        $this->load->helper('url');
        $this->load->model('Tipe_model'); // Memuat model Tipe_Model
        $this->load->model('pertanyaan_model'); // Memuat model Pertanyaan_Model
    }

    public function index()
    {
        // Ambil data dari model
        $data['items'] = $this->Tipe_model->gettipe();
        $data['data'] = $this->pertanyaan_model->getpertanyaan();
        $data['pesertadidik'] = $this->pertanyaan_model->getfilterpertanyaan(['nama_tipe_pertanyaan' => 'DATA PRIBADI PESERTA DIDIK']); // Ambil data peserta didik
        $data['ayahpeserta'] = $this->pertanyaan_model->getfilterpertanyaan(['nama_tipe_pertanyaan' => 'DATA AYAH KANDUNG']); // Ambil data ayah peserta didik
        $data['ibupeserta'] = $this->pertanyaan_model->getfilterpertanyaan(['nama_tipe_pertanyaan' => 'DATA IBU KANDUNG']); // Ambil data ibu peserta didik
        $data['walipeserta'] = $this->pertanyaan_model->getfilterpertanyaan(['nama_tipe_pertanyaan' => 'DATA WALI PESERTA DIDIK']); // Ambil data wali peserta didik
        $data['periodikpeserta'] = $this->pertanyaan_model->getfilterpertanyaan(['nama_tipe_pertanyaan' => 'DATA PERIODIK PESERTA DIDIK']); // Ambil data alamat peserta didik
        // Load view dan kirim data ke view
        $this->load->view('formulir', $data);
    }
}
