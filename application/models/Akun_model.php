<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

    private $table = 'akun';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getakun($username)
    {
        return $this->db->get_where('akun', ['username' => $username])->row();
    }
    
}
?>