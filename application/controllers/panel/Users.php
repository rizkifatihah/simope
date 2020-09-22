<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */

	public $parent_modul = 4;
	public $title = 'Manajemen Pengguna';

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index(){
		$this->list();
	}

	public function list($param1='')
	{
		if(cekModul(5) == FALSE) redirect('auth/access_denied');
		if ($param1=='deleted') {
			$data['title'] = $this->title;
			$data['subtitle'] = 'List Pengguna';
			$data['status'] = 'Non aktif';
			$data['users'] = $this->UsersModel->get_users_deleted();
			$data['content'] = 'panel/manajemen_pengguna/pengguna/index';
			$this->load->view('panel/content',$data);
		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'List Pengguna';
			$data['status'] = 'Aktif';
			$data['users'] = $this->UsersModel->get_users();
			$data['content'] = 'panel/manajemen_pengguna/pengguna/index';
			$this->load->view('panel/content',$data);
		}
	}

	public function detail_user($param1='')
	{
			$data['title'] = 'KUISIONER DATA';
			$data['subtitle'] = 'List Pengguna';
			$data['status'] = 'Aktif';
			$data['users'] = $this->GeneralModel->get_by_id_general_row('tb_pengguna','id_pengguna',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/manajemen_pengguna/pengguna/detail';
			$this->load->view('panel/content',$data);
	}

	public function create($param1='',$param2=''){
		if(cekModul(6) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_create') {

			$dataPengguna = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'hak_akses' => $this->input->post('nama_hak_akses'),
				'jenkel' => $this->input->post('jenkel'),
			);

			if (!empty($this->input->post('password'))) {
				$dataPengguna += array('password' => sha1($this->input->post('password')));
			}

			$config['upload_path']          = 'assets/backend/app-assets/images/user/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10000;


			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fotopengguna'))
			{

			}
			else {
				$dataPengguna += array('fotopengguna' => $config['upload_path'].$this->upload->data('file_name'));
			}

			if ($this->GeneralModel->create_general('tb_pengguna',$dataPengguna) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna berhasil ditambahkan</div>');
				redirect('panel/users/list');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'List Pengguna';
			$data['hak_akses'] = $this->GeneralModel->get_general('tb_hak_akses');
			$data['content'] = 'panel/manajemen_pengguna/pengguna/create';
			$this->load->view('panel/content',$data);
		}
	}

	public function update($param1='',$param2=''){
		if(cekModul(7) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {
			$dataPengguna = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'suku' => $this->input->post('suku'),
				'rencana_pernikahan' => $this->input->post('rencana_pernikahan'),
				'agama' => $this->input->post('agama'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status_perkawinan' => $this->input->post('status_perkawinan'),
				'jumlah_anak' => $this->input->post('jumlah_anak'),
				'info_1' => $this->input->post('info_1'),
				'info_2' => $this->input->post('info_2'),
				'sumber_info' => $this->input->post('sumber_info'),
				'no_telp' => $this->input->post('no_telp'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'hak_akses' => $this->input->post('nama_hak_akses'),
				'jenkel' => $this->input->post('jenkel'),
			);

			if (!empty($this->input->post('password'))) {
				$dataPengguna += array('password' => sha1($this->input->post('password')));
			}

			$config['upload_path']          = 'assets/backend/app-assets/images/user/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10000;


			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fotopengguna'))
			{

			}
			else {
				$dataPengguna += array('fotopengguna' => $config['upload_path'].$this->upload->data('file_name'));
			}

			if ($this->GeneralModel->update_general('tb_pengguna','id_pengguna',my_simple_crypt($param2,'d'),$dataPengguna) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna berhasil ditambahkan</div>');
				redirect('panel/users/list');
			}
		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'List Pengguna';
			$data['users'] = $this->UsersModel->get_users_by_id(my_simple_crypt($param1,'d'));
			$data['hak_akses'] = $this->GeneralModel->get_general('tb_hak_akses');
			$data['content'] = 'panel/manajemen_pengguna/pengguna/update';
			$this->load->view('panel/content',$data);
		}
	}

	public function delete(){
		if(cekModul(8) == FALSE) redirect('auth/access_denied');
		$id = $this->input->get('id');
		$updatePengguna = array('status' => 'deleted');
		if($this->GeneralModel->update_general('tb_pengguna','id_pengguna',my_simple_crypt($id,'d'),$updatePengguna) == TRUE){
			$dataPengguna = $this->GeneralModel->get_by_id_general('tb_pengguna','id_pengguna',my_simple_crypt($id,'d'));
			foreach ($dataPengguna as $key) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna '.$key->nama_lengkap.' berhasil di nonaktifkan</div>');
			}
			redirect('panel/users/list');
		}
	}

	public function activate(){
		if(cekModul(29) == FALSE) redirect('auth/access_denied');
		$id = $this->input->get('id');
		$updatePengguna = array('status' => 'actived');
		if($this->GeneralModel->update_general('tb_pengguna','id_pengguna',my_simple_crypt($id,'d'),$updatePengguna) == TRUE){
			$dataPengguna = $this->GeneralModel->get_by_id_general('tb_pengguna','id_pengguna',my_simple_crypt($id,'d'));
			foreach ($dataPengguna as $key) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Data pengguna '.$key->nama_lengkap.' berhasil di aktifkan</div>');
			}
			redirect('panel/users/list/deleted');
		}
	}

	public function detail(){
		$id = $this->input->get('id');

		$pengguna = $this->UsersModel->get_users_by_id(my_simple_crypt($id,'d'));
		if ($pengguna == TRUE) {
			echo json_encode($pengguna,JSON_PRETTY_PRINT);
		}else {
			echo "";
		}
	}

	public function rbac_list(){
		if(cekModul(1) == FALSE) redirect('auth/access_denied');
		$data['title'] = $this->title;
		$data['subtitle'] = 'Hak Akses';
		$data['rbac'] = $this->GeneralModel->get_general('tb_hak_akses');
		$data['content'] = 'panel/manajemen_pengguna/hak_akses/index';
		$this->load->view('panel/content',$data);
	}

	public function create_rbac($param1='',$param2=''){
		if(cekModul(2) == FALSE) redirect('auth/access_denied');
			if ($param1=='do_create') {
				$parent_modul = $this->input->post('parent_modul_akses');
				$nama_hak_akses = $this->input->post('nama_hak_akses');
				$parent_modul = array_unique($parent_modul);
				$parent_modul = array_values(array_unique($parent_modul));

				$parent_modul = array(
					"parent_modul" => $parent_modul,
				);
				$parent_modul = json_encode($parent_modul,JSON_PRETTY_PRINT);

				echo "<br/><br/><br/><br/><br/>";

				$modul = $this->input->post('modul_akses');
				$modul = array(
					"modul" => $modul,
				);

				$modul = json_encode($modul,JSON_PRETTY_PRINT);

				$data = array(
					'nama_hak_akses' => $nama_hak_akses,
					'modul_akses' => $modul,
					'parent_modul_akses' => $parent_modul,
				);

				if($this->GeneralModel->create_general('tb_hak_akses',$data) ==  TRUE){
					$this->session->set_flashdata('notif','<div class="alert alert-success">Data hak akses berhasil di tambahkan</div>');
					redirect('panel/users/rbac_list');
				}else {
					$this->session->set_flashdata('notif','<div class="alert alert-danger">Data hak akses gagal di tambahkan</div>');
					redirect('panel/users/rbac_list');
				}
			}else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Hak Akses';
				$data['parentModul'] = $this->ParentModulModel->get_parent_modul();
				$data['content'] = 'panel/manajemen_pengguna/hak_akses/create';
				$this->load->view('panel/content',$data);
			}
	}

	public function update_rbac($param1='',$param2=''){
		if(cekModul(3) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {
			$id = my_simple_crypt($param2,'d');
			$parent_modul = $this->input->post('parent_modul_akses');
			$nama_hak_akses = $this->input->post('nama_hak_akses');
			$parent_modul = array_unique($parent_modul);
			$parent_modul = array_values(array_unique($parent_modul));

			$parent_modul = array(
				"parent_modul" => $parent_modul,
			);
			$parent_modul = json_encode($parent_modul,JSON_PRETTY_PRINT);

			echo "<br/><br/><br/><br/><br/>";

			$modul = $this->input->post('modul_akses');
			$modul = array(
				"modul" => $modul,
			);

			$modul = json_encode($modul,JSON_PRETTY_PRINT);

			$data = array(
				'nama_hak_akses' => $nama_hak_akses,
				'modul_akses' => $modul,
				'parent_modul_akses' => $parent_modul,
			);

			if($this->GeneralModel->update_general('tb_hak_akses','id_hak_akses',$id,$data) ==  TRUE){
				$this->session->set_flashdata('notif','<div class="alert alert-success">Data hak akses berhasil di update</div>');
				redirect('panel/users/rbac_list');
			}else {
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Data hak akses gagal di update</div>');
				redirect('panel/users/rbac_list');
			}
		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Hak Akses';
			$data['id'] = $param1;
			$data['parentModul'] = $this->ParentModulModel->get_parent_modul();
			$data['hakAkses'] = $this->UsersModel->getLevelPenggunaById(my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/manajemen_pengguna/hak_akses/update';
			$this->load->view('panel/content',$data);
		}
	}

	public function delete_rbac($id){
		$this->GeneralModel->delete_general('tb_hak_akses','id_hak_akses',my_simple_crypt($id,'d'));
		$this->session->set_flashdata('notif','<div class="alert alert-success">Hak Akses Berhasil dihapus</div>');
		redirect('panel/users/rbac_list');
	}

}
