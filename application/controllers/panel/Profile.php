<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE) redirect('auth/logout');
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$data['subtitle'] = 'Profile';
		$data['content'] = 'panel/profile/index';
		$data['profile'] = $this->GeneralModel->get_by_id_general('tb_pengguna','id_pengguna',$this->session->userdata('id_pengguna'));
		$this->load->view('panel/content',$data);
	}

	public function edit_profile(){
		$dataPengguna = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'suku' => $this->input->post('suku'),
			'rencana_pernikahan' => $this->input->post('rencana_pernikahan'),
			'agama' => $this->input->post('agama'),
			'anak_ke' => $this->input->post('anak_ke'),
			'pendidikan' => $this->input->post('pendidikan'),
			'tempat_persiapan_prakonsepsi' => $this->input->post('tempat_persiapan_prakonsepsi'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'status_perkawinan' => $this->input->post('status_perkawinan'),
			'jumlah_anak' => $this->input->post('jumlah_anak'),
			'info_1' => $this->input->post('info_1'),
			'info_2' => $this->input->post('info_2'),
			'sumber_info' => $this->input->post('sumber_info'),
			'sumber_info_remaja' => $this->input->post('sumber_info_remaja'),
			'sumber_info_catin' => $this->input->post('sumber_info_catin'),
			'no_telp' => $this->input->post('no_telp'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
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

		if ($this->GeneralModel->update_general('tb_pengguna','id_pengguna',$this->session->userdata('id_pengguna'),$dataPengguna) == TRUE) {
			$this->session->set_userdata($dataPengguna);
			$this->session->set_flashdata('notif','<div class="alert alert-success">Profile Berhasil di perbarui</div>');
			redirect('panel/profile');
		}

	}

}
