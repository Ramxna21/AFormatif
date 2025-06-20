<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);
        $this->load->helper('url');
        $this->load->model('Tipe_model');
        $this->load->model('pertanyaan_model');
        $this->load->model('Murid_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function dashboard()
    {
        $data['content'] = $this->load->view('admin/dashboard', [], true);
        $this->load->view('admin/template_admin', $data);
    }

public function read_murid()
{
    $list_murid = $this->Murid_model->get_all_murid();

    // Debug: log the list_murid data structure
    log_message('debug', 'List Murid Data: ' . print_r($list_murid, true));

    // Ensure status_penerimaan property exists for each murid object
    foreach ($list_murid as $m) {
        if (!isset($m->status_penerimaan)) {
            $m->status_penerimaan = 'Belum Diterima';
        }
    }

    $data['list_murid'] = $list_murid;
    $data['content'] = $this->load->view('admin/read_murid', $data, true);
    $this->load->view('admin/template_admin', $data);
}
public function delete_murid($id = null)
{
    if ($id === null) {
        $this->session->set_flashdata('error', 'ID murid tidak ditemukan.');
        redirect('admin/read_murid');
        return;
    }

    $murid = $this->Murid_model->get_murid_by_id($id); // Pastikan method ini ada

    if (!$murid) {
        $this->session->set_flashdata('error', 'Data murid tidak ditemukan.');
    } else {
        $this->Murid_model->delete($id); // Pastikan method delete($id) ada di Murid_model
        $this->session->set_flashdata('success', 'Data murid berhasil dihapus.');
    }

    redirect('admin/read_murid');
}


    public function read_formulir()
    {
        $data['murid'] = $this->Murid_model->get_all_formulir_siswa();
        $data['content'] = $this->load->view('admin/read_formulir', $data, true);
        $this->load->view('admin/template_admin', $data);
    }

    public function read_formulir_detail($id = null)
    {
        if ($id === null) {
            $this->session->set_flashdata('error', 'ID formulir siswa tidak ditemukan. Silakan pilih formulir dari daftar.');
            redirect('admin/read_formulir');
            return;
        }

        $data['formulir_siswa_detail'] = $this->Murid_model->get_formulir_siswa_by_id($id);

        if (!$data['formulir_siswa_detail']) {
            $this->session->set_flashdata('error', 'Formulir siswa dengan ID tersebut tidak ditemukan.');
            redirect('admin/read_formulir');
            return;
        }

        $data['content'] = $this->load->view('admin/read_formulir_detail', $data, true);
        $this->load->view('admin/template_admin', $data);
    }

    public function read_pertanyaan()
    {
        $data['items'] = $this->Tipe_model->gettipe();
        $data['data'] = $this->pertanyaan_model->getpertanyaan();
        $data['content'] = $this->load->view('admin/read_pertanyaan', $data, true);
        $this->load->view('admin/template_admin', $data);
    }

// Duplicate action_create_murid() removed to fix redeclaration error.


    public function action_edit_pertanyaan($id)
    {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', 'Validasi gagal. Mohon periksa input Anda.');
        } else {
            $pertanyaan = $this->input->post('pertanyaan', true);
            $jenis = $this->input->post('jenis', true);
            $tipe = $this->input->post('tipe', true);

            $data = [
                'isi_pertanyaan' => $pertanyaan,
                'jenis_jawaban_pertanyaan' => $jenis,
                'id_tipe_pertanyaan' => $tipe
            ];

            $this->pertanyaan_model->updatepertanyaan($id, $data);
            $this->session->set_flashdata('success', 'Data pertanyaan berhasil diupdate.');
        }
        redirect('admin/read_pertanyaan');
    }

    public function action_delete_pertanyaan($id)
    {
        if (!$id || !$this->pertanyaan_model->getpertanyaanbyid($id)) {
            $this->session->set_flashdata('error', 'Data pertanyaan tidak ditemukan.');
        } else {
            $this->pertanyaan_model->deletepertanyaan($id);
            $this->session->set_flashdata('success', 'Data pertanyaan berhasil dihapus.');
        }
        redirect('admin/read_pertanyaan');
    }

    public function create_formulir_siswa()
    {
        $data['pesertadidik'] = $this->pertanyaan_model->getpertanyaan_by_kategori('pesertadidik');
        $data['ayahpeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('ayahpeserta');
        $data['ibupeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('ibupeserta');
        $data['walipeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('walipeserta');
        $data['periodikpeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('periodikpeserta');
        $data['content'] = $this->load->view('admin/create_formulir_siswa', $data, true);
        $this->load->view('admin/template_admin', $data);
    }

   public function action_create_formulir_siswa()
{
    $data_formulir = $this->input->post(NULL, TRUE);
    $data_formulir['created_at'] = date('Y-m-d H:i:s');

    $insert_success = $this->Murid_model->insert_formulir_siswa($data_formulir);

    if ($insert_success) {
        $this->session->set_flashdata('success', 'Formulir berhasil disimpan!');
        redirect('admin/simpan_formulir_sukses');
    } else {
        $this->session->set_flashdata('error', 'Gagal menyimpan formulir pendaftaran. Silakan coba lagi.');
        redirect('admin/create_formulir_siswa');
    }


        $data['pesertadidik'] = $this->pertanyaan_model->getpertanyaan_by_kategori('pesertadidik');
        $data['ayahpeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('ayahpeserta');
        $data['ibupeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('ibupeserta');
        $data['walipeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('walipeserta');
        $data['periodikpeserta'] = $this->pertanyaan_model->getpertanyaan_by_kategori('periodikpeserta');
        $data['content'] = $this->load->view('admin/create_formulir_siswa', $data, true);
        $this->load->view('admin/template_admin', $data);
    }

    public function simpan_formulir_sukses()
    {
        $this->session->set_flashdata('success', 'Formulir berhasil disimpan!');
        $data['content'] = $this->load->view('formulir/sukses', [], true);
        $this->load->view('admin/template_aadmin', $data);
    }
  public function action_create_murid()
{
    // Validation rules for required fields
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required|trim');
    $this->form_validation->set_rules('no_handphone', 'No. Handphone', 'required|trim');

    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('error', 'Validasi gagal. Mohon periksa input yang wajib diisi.');
        redirect('admin/read_murid');
        return;
    }

    // Prepare data according to database structure
    $data = [
        'nama_lengkap' => $this->input->post('nama_lengkap', true),
        'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
        'nisn' => $this->input->post('nisn', true),
        'nik' => $this->input->post('nik', true),
        'no_kk' => $this->input->post('no_kk', true),
        'tempat_lahir' => $this->input->post('tempat_lahir', true),
        'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
        'no_akte_kelahiran' => $this->input->post('no_akte_kelahiran', true),
        'agama' => $this->input->post('agama', true),
        'alamat_rumah' => $this->input->post('alamat_rumah', true),
        'desa_kelurahan' => $this->input->post('desa_kelurahan', true),
        'kecamatan' => $this->input->post('kecamatan', true),
        'kabupaten' => $this->input->post('kabupaten', true),
        'provinsi' => $this->input->post('provinsi', true),
        'kode_pos' => $this->input->post('kode_pos', true),
        'tinggal_dengan' => $this->input->post('tinggal_dengan', true),
        'mode_transportasi' => $this->input->post('mode_transportasi', true),
        'anak_keberapa' => $this->input->post('anak_keberapa', true),
        'punya_kip_pk' => $this->input->post('punya_kip_pk', true),
        'no_handphone' => $this->input->post('no_handphone', true)
    ];

    // Remove empty values to avoid inserting empty strings
    $data = array_filter($data, function($value) {
        return $value !== '' && $value !== null;
    });

    // Convert empty anak_keberapa to null if it exists but is empty
    if (isset($data['anak_keberapa']) && $data['anak_keberapa'] === '') {
        $data['anak_keberapa'] = null;
    }

    // Convert empty tanggal_lahir to null
    if (isset($data['tanggal_lahir']) && $data['tanggal_lahir'] === '') {
        $data['tanggal_lahir'] = null;
    }

    if ($this->db->insert('murid', $data)) {
        $this->session->set_flashdata('success', 'Data murid berhasil ditambahkan');
    } else {
        $this->session->set_flashdata('error', 'Gagal menambahkan data murid');
    }
    
    redirect('admin/read_murid');
}
}