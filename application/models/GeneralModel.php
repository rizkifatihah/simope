<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GeneralModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get_general($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  function get_general_group_by($table,$group_by)
  {
    $query = $this->db->query("SELECT * FROM $table GROUP BY $group_by");
    return $query->result();
  }

  function get_general_order_by($table,$by,$order)
  {
    return $query = $this->db->query("SELECT * FROM $table ORDER BY $by $order")->result();
  }

  function truncate_general($table)
  {
    return $this->db->query("TRUNCATE TABLE $table");
  }

  function count_general($table)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table")->row();
  }

  function count_by_id_general($table, $id, $val)
  {
    return $this->db->query("SELECT COUNT(*) as jumlah FROM $table WHERE $id = '$val'")->row();
  }

  function get_by_id_general($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->result();
  }

  function get_by_id_general_row($table, $id, $val)
  {
    $query = $this->db->where($id, $val)->get($table);
    return $query->row();
  }

  function create_general($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  function update_general($table, $id, $val, $data)
  {
    $this->db->where($id, $val);
    return $this->db->update($table, $data);
  }

  function delete_general($table, $id, $val)
  {
    $this->db->where($id, $val);
    return $this->db->delete($table);
  }

  function limit_general($table, $limit)
  {
    return $this->db->query("SELECT * FROM $table LIMIT $limit")->result();
  }

  function limit_general_order_by($table, $order_by, $order ,$limit)
  {
    return $this->db->query("SELECT * FROM $table ORDER BY $order_by $order LIMIT $limit")->result();
  }

  function list_pretest(){
    return $this->db->query("SELECT * FROM tb_pre_test pt,tb_hak_akses ha WHERE pt.id_hak_akses = ha.nama_hak_akses")->result();
  }

  function list_question_pretest($id){
    return $this->db->query("SELECT * FROM tb_pre_test pt,tb_question_pretest qpt WHERE pt.id_pre_test = qpt.id_pre_test AND qpt.id_pre_test='$id'")->result();
  }
  
  function list_answer_pretest($id){
    return $this->db->query("SELECT * FROM tb_answer_pretest ap,tb_question_pretest qpt WHERE ap.id_question_pretest = qpt.id_question_pretest AND qpt.id_question_pretest='$id'")->result();
  }

  function list_posttest(){
    return $this->db->query("SELECT * FROM tb_post_test pt,tb_hak_akses ha WHERE pt.id_hak_akses = ha.nama_hak_akses")->result();
  }

  function list_question_posttest($id){
    return $this->db->query("SELECT * FROM tb_post_test pt,tb_question_posttest qpt WHERE pt.id_post_test = qpt.id_post_test AND qpt.id_post_test='$id'")->result();
  }
  
  function list_answer_posttest($id){
    return $this->db->query("SELECT * FROM tb_answer_posttest ap,tb_question_posttest qpt WHERE ap.id_question_posttest = qpt.id_question_posttest AND qpt.id_question_posttest='$id'")->result();
  }

  function list_media_edukasi(){
    return $this->db->query("SELECT * FROM tb_media_edukasi me, tb_hak_akses ha WHERE me.hak_akses = ha.nama_hak_akses")->result();
  }

  function get_point_pre_test($id)
  {
    return $this->db->query("SELECT SUM(ap.point_answer) as jumlah FROM tb_answer_user_pretest aup , tb_answer_pretest ap, tb_question_pretest qp WHERE aup.id_question_pretest = qp.id_question_pretest AND aup.id_answer_test = ap.id_answer_pretest AND aup.id_user = '$id'")->row();
  }

  function get_point_post_test($id)
  {
    return $this->db->query("SELECT SUM(ap.point_answer) as jumlah FROM tb_answer_user_posttest aup , tb_answer_posttest ap, tb_question_posttest qp WHERE aup.id_question_posttest = qp.id_question_posttest AND aup.id_answer_test = ap.id_answer_posttest AND aup.id_user = '$id'")->row();
  }

  function get_responden_pretest()
  {
    return $this->db->query("SELECT * FROM tb_answer_user_pretest aup,tb_pengguna p WHERE aup.id_user = p.id_pengguna  GROUP BY aup.id_user")->result();
  }

  function get_responden_posttest()
  {
    return $this->db->query("SELECT * FROM tb_answer_user_posttest aup,tb_pengguna p WHERE aup.id_user = p.id_pengguna  GROUP BY aup.id_user")->result();
  }

}
