<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_murid()
    {
        return $this->db->get('murid')->result();
    }

    public function get_murid_by_id($id)
    {
        return $this->db->get_where('murid', ['id' => $id])->row();
    }

    public function get_jawaban_by_murid_id($murid_id)
    {
        $this->db->select('jf.id_pertanyaan, jf.jawaban, jf.tanggal_pengisian, p.isi_pertanyaan');
        $this->db->from('jawaban_formulir jf');
        $this->db->join('pertanyaan p', 'jf.id_pertanyaan = p.id_pertanyaan', 'left');
        $this->db->where('jf.id_murid', $murid_id);
        return $this->db->get()->result();
    }

    public function insert_murid($data)
    {
        return $this->db->insert('murid', $data);
    }

    public function update_murid($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('murid', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('murid', ['id' => $id]);
    }


    public function get_formulir_siswa_by_id($id)
    {
        return $this->db->get_where('formulir_siswa', ['id' => $id])->row();
    }

public function insert_formulir_siswa($data) {
    // Create mapping from question ID to database column
    $field_mapping = [
        '2' => 'nama_lengkap',
        '3' => 'jenis_kelamin', 
        '4' => 'nisn',
        '5' => 'nik',
        '6' => 'kk',
        '7' => 'tempat_lahir',
        '8' => 'tanggal_lahir',
        '9' => 'no_akte',
        '10' => 'agama',
        '11' => 'alamat',
        '12' => 'desa',
        '13' => 'kecamatan',
        '14' => 'kabupaten',
        '15' => 'provinsi',
        '16' => 'kode_pos',
        '17' => 'tinggal_dengan',
        '18' => 'transportasi',
        '19' => 'anak_ke',
        '20' => 'kip_pkh',
        '21' => 'no_hp',
        '22' => 'nama_ayah',
        '23' => 'nik_ayah',
        '24' => 'lahir_ayah',
        '25' => 'pendidikan_ayah',
        '26' => 'pekerjaan_ayah',
        '27' => 'penghasilan_ayah',
        '28' => 'nama_ibu',
        '29' => 'nik_ibu',
        '30' => 'lahir_ibu',
        '31' => 'pendidikan_ibu',
        '32' => 'pekerjaan_ibu',
        '33' => 'penghasilan_ibu',
        '34' => 'nama_wali',
        '35' => 'nik_wali',
        '36' => 'lahir_wali',
        '37' => 'pendidikan_wali',
        '38' => 'pekerjaan_wali',
        '39' => 'penghasilan_wali',
        '40' => 'tinggi_badan',
        '41' => 'berat_badan',
        '42' => 'lingkar_kepala',
        '43' => 'jarak_ke_sekolah',
        '44' => 'waktu_tempuh',
        '45' => 'jumlah_saudara',
        '46' => 'hobi',
        '48' => 'cita_cita'
    ];
    
    // Prepare data for insertion
    $data_formulir = [];
    
    // Map form data to database columns
    foreach ($data as $question_id => $value) {
        if (isset($field_mapping[$question_id])) {
            $data_formulir[$field_mapping[$question_id]] = $value;
        }
    }
    
    // Insert data into formulir_siswa table
    return $this->db->insert('formulir_siswa', $data_formulir);
}

public function get_all_formulir_siswa() {
    return $this->db->get('formulir_siswa')->result();
}

/* Duplicate method removed: get_formulir_siswa_by_id($id) */
}