<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_profile()
  {
    $query = $this->db->where('id_profile', '1')->get('tb_identitas');
    return $query->row();
  }

  function get_table($uuid_outlet)
  {
    $query = $this->db->query("SELECT * FROM tb_table t, tb_room r WHERE t.id_room = r.id_room AND t.uuid_outlet = '$uuid_outlet'");
    return $query->result();
  }

  function get_table_by_id($table)
  {
    $query = $this->db->query("SELECT * FROM tb_table t, tb_room r WHERE t.id_room = r.id_room AND t.id_table = '$table'");
    return $query->result();
  }

}
