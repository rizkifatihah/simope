<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModulModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

    function get_modul($id)
  {
    $query = $this->db->query("SELECT * FROM tb_modul m WHERE m.id_parent_modul = '$id'");
    return $query->result();
  }

    function get_modul_by_id($id)
  {
    $query = $this->db->query("SELECT * FROM tb_modul m WHERE m.id_modul = '$id'");
    return $query->row();
  }

    function get_modul_with_parent(){
      return $this->db->query("SELECT * FROM tb_modul m, tb_parent_modul pm WHERE m.id_parent_modul = pm.id_parent_modul")->result();
    }

    function get_modul_with_parent_by_id($id){
      return $this->db->query("SELECT * FROM tb_modul m, tb_parent_modul pm WHERE m.id_modul = '$id' and m.id_parent_modul = pm.id_parent_modul")->row();
    }

}
