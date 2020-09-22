<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AksesModulModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

  public function get_pengguna_by_id($id){
    return $this->db->query("SELECT * FROM tb_pengguna WHERE id_pengguna = '$id'")->row();
  }

}
