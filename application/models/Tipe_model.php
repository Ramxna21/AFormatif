<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_model extends CI_Model {

    private $table = 'tipe_pertanyaan';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function gettipe()  
    {
        return $this->db->get($this->table)->result();
    }

    
}
?>