<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    function __construct()
  {
    parent::__construct();
  }

  function getAccountLogin($nip,$password){
    return $this->db->query("SELECT * FROM tb_pengguna p WHERE
                             p.nip = '$nip' and p.password = '$password' and status = 'actived'")->result();
  }

  function getUserParentModul($hak_akses){
    return $this->db->query("SELECT ha.parent_modul_akses FROM tb_hak_akses ha where ha.nama_hak_akses = '$hak_akses'")->row();
  }

  function getUserModul($hak_akses){
    return $this->db->query("SELECT ha.modul_akses FROM tb_hak_akses ha where ha.nama_hak_akses = '$hak_akses'")->row();
  }

  function cekToken($user_id,$token){
    return $this->db->query("SELECT * FROM tb_pengguna p where p.id_pengguna = '$user_id' and p.token_auth = '$token'")->row();
  }

  public function getLoginByMail($no_agenda,$id_pengguna){
    return $this->db->query("SELECT * FROM tb_send_mail WHERE no_agenda = '$no_agenda' and id_pengguna = '$id_pengguna'")->result();
  }

  public function updateLoginByMail($no_agenda,$id_pengguna,$dataEmail){
    $this->db->where('no_agenda', $no_agenda);
    $this->db->where('id_pengguna', $id_pengguna);
    return $this->db->update('tb_send_mail', $dataEmail);
  }

}
