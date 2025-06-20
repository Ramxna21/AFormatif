<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Formulir_model');
        $this->load->model('Murid_model');
        $this->load->model('Pertanyaan_model');
        $this->load->model('Tipe_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
    }

    public function index()
    {
        $this->load->view('admin_dashboard');
    }

    public function daftar_siswa()
    {
        $data['list'] = $this->Formulir_model->get_all();
        $this->load->view('daftar_siswa', $data);
    }

    public function create_formulir_siswa()
    {
        $data['pertanyaan'] = $this->Pertanyaan_model->get_all();
        $this->load->view('create_formulir_siswa', $data);
    }

    public function action_create_formulir_siswa()
    {
        // Mapping id_pertanyaan ke nama kolom tabel
        $idToField = [
            2  => 'nama_lengkap',
            3  => 'jenis_kelamin',
            4  => 'nisn',
            5  => 'nik',
            6  => 'kk',
            7  => 'tempat_lahir',
            8  => 'tanggal_lahir',
            9  => 'no_akte',
            10 => 'agama',
            11 => 'alamat',
            12 => 'desa',
            13 => 'kecamatan',
            14 => 'kabupaten',
            15 => 'provinsi',
            16 => 'kode_pos',
            17 => 'tinggal_dengan',
            18 => 'transportasi',
            19 => 'anak_ke',
            20 => 'kip_pkh',
            21 => 'no_hp',
            22 => 'nama_ayah',
            23 => 'nik_ayah',
            24 => 'lahir_ayah',
            25 => 'pendidikan_ayah',
            26 => 'pekerjaan_ayah',
            27 => 'penghasilan_ayah',
            28 => 'nama_ibu',
            29 => 'nik_ibu',
            30 => 'lahir_ibu',
            31 => 'pendidikan_ibu',
            32 => 'pekerjaan_ibu',
            33 => 'penghasilan_ibu',
            34 => 'nama_wali',
            35 => 'nik_wali',
            36 => 'lahir_wali',
            37 => 'pendidikan_wali',
            38 => 'pekerjaan_wali',
            39 => 'penghasilan_wali',
            40 => 'tinggi_badan',
            41 => 'berat_badan',
            42 => 'lingkar_kepala',
            43 => 'jarak_ke_sekolah',
            44 => 'waktu_tempuh',
            45 => 'jumlah_saudara',
            46 => 'hobi',
            48 => 'cita_cita',
        ];

        $input = $this->input->post(); // Semua input dari form POST
        $data = [];
        foreach ($idToField as $id => $field) {
            $data[$field] = isset($input[(string)$id]) ? $input[(string)$id] : null;
        }
        $data['created_at'] = date('Y-m-d H:i:s');

        // Hanya kirim $data hasil mapping ke model
        $this->Formulir_model->insert($data);

        $this->session->set_flashdata('success', 'Data siswa berhasil disimpan.');
        redirect('admin/daftar_siswa');
    }

    public function edit_siswa($id = null)
    {
        if (!$id) redirect('admin/daftar_siswa');

        $data['siswa'] = $this->Formulir_model->get_by_id($id);
        $data['pertanyaan'] = $this->Pertanyaan_model->get_all();
        $this->load->view('edit_formulir_siswa', $data);
    }

    public function update_siswa($id)
    {
        $idToField = [
            2  => 'nama_lengkap',
            3  => 'jenis_kelamin',
            4  => 'nisn',
            5  => 'nik',
            6  => 'kk',
            7  => 'tempat_lahir',
            8  => 'tanggal_lahir',
            9  => 'no_akte',
            10 => 'agama',
            11 => 'alamat',
            12 => 'desa',
            13 => 'kecamatan',
            14 => 'kabupaten',
            15 => 'provinsi',
            16 => 'kode_pos',
            17 => 'tinggal_dengan',
            18 => 'transportasi',
            19 => 'anak_ke',
            20 => 'kip_pkh',
            21 => 'no_hp',
            22 => 'nama_ayah',
            23 => 'nik_ayah',
            24 => 'lahir_ayah',
            25 => 'pendidikan_ayah',
            26 => 'pekerjaan_ayah',
            27 => 'penghasilan_ayah',
            28 => 'nama_ibu',
            29 => 'nik_ibu',
            30 => 'lahir_ibu',
            31 => 'pendidikan_ibu',
            32 => 'pekerjaan_ibu',
            33 => 'penghasilan_ibu',
            34 => 'nama_wali',
            35 => 'nik_wali',
            36 => 'lahir_wali',
            37 => 'pendidikan_wali',
            38 => 'pekerjaan_wali',
            39 => 'penghasilan_wali',
            40 => 'tinggi_badan',
            41 => 'berat_badan',
            42 => 'lingkar_kepala',
            43 => 'jarak_ke_sekolah',
            44 => 'waktu_tempuh',
            45 => 'jumlah_saudara',
            46 => 'hobi',
            48 => 'cita_cita',
        ];

        $input = $this->input->post();
        $data = [];
        foreach ($idToField as $idq => $field) {
            $data[$field] = isset($input[(string)$idq]) ? $input[(string)$idq] : null;
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->Formulir_model->update($id, $data);

        $this->session->set_flashdata('success', 'Data siswa berhasil diupdate.');
        redirect('admin/daftar_siswa');
    }

    public function hapus_siswa($id)
    {
        $this->Formulir_model->delete($id);
        $this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
        redirect('admin/daftar_siswa');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}