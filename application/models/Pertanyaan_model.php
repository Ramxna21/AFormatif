<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model {

    private $table = 'pertanyaan';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getpertanyaan()  
    {
        return $this->db->join('tipe_pertanyaan', 'tipe_pertanyaan.id_tipe_pertanyaan = pertanyaan.id_tipe_pertanyaan', 'left')
                        ->get($this->table)
                        ->result();
    }

    public function insertpertanyaan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updatepertanyaan($id, $data)
    {
        return $this->db->where('id_pertanyaan', $id)
                        ->update($this->table, $data);
    }

    public function getpertanyaanbyid($id)
    {
        return $this->db->where('id_pertanyaan', $id)
                        ->get($this->table)
                        ->row();
    }

    public function deletepertanyaan($id)
    {
        return $this->db->where('id_pertanyaan', $id)
                        ->delete($this->table);
    }

    public function getfilterpertanyaan($where = [])
    {
        return $this->db->join('tipe_pertanyaan', 'tipe_pertanyaan.id_tipe_pertanyaan = pertanyaan.id_tipe_pertanyaan', 'left')
                        ->where($where)
                        ->get($this->table)
                        ->result();
    }

    public function get_by_tipe($id_tipe)
{
    return $this->db->get_where('pertanyaan', ['id_tipe_pertanyaan' => $id_tipe])->result();
}

}
?>