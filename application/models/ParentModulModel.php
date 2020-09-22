<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentModulModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

    function get_parent_modul()
  {
    $query = $this->db->query('SELECT * FROM tb_parent_modul pm ORDER BY pm.urutan ASC');
    return $query->result();
  }

    function get_parent_modul_by_id($id_parent_modul)
  {
    $query = $this->db->query("SELECT * FROM tb_parent_modul pm WHERE pm.id_parent_modul = '$id_parent_modul' ORDER BY pm.urutan ASC");
    return $query->row();
  }

}
