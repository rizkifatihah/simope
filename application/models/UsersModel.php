<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

    function get_users()
  {
    return $this->db->query("SELECT * FROM tb_pengguna p  WHERE p.status='actived'")->result();
  }

  function get_users_deleted()
  {
    return $this->db->query("SELECT * FROM tb_pengguna p  WHERE p.status='deleted'")->result();
  }

  function get_users_by_id($id)
  {
    return $this->db->query("SELECT * FROM tb_pengguna p  WHERE p.id_pengguna='$id'")->row();
  }

  function getLevelPenggunaById($id){
    return $this->db->query("SELECT * FROM tb_hak_akses WHERE id_hak_akses = '$id'")->row();
  }

  function getUsername($username){
    return $this->db->query("SELECT * FROM tb_pengguna WHERE username = '$username'")->result();
  }

  function getUsernameByid($id){
    return $this->db->query("SELECT username FROM tb_pengguna WHERE id_pengguna = '$id'")->row();
  }

}
