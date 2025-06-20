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

    public function get_all_formulir_siswa()
    {
        return $this->db->get('formulir_siswa')->result();
    }

    public function get_formulir_siswa_by_id($id)
    {
        return $this->db->get_where('formulir_siswa', ['id' => $id])->row();
    }

    public function insert_formulir_siswa($data)
    {
        return $this->db->insert('formulir_siswa', $data);
    }
}
