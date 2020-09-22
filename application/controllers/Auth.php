<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */
	public function __construct()
  {
			parent::__construct();
  }

	public function index()
	{
		$this->load->view('login');
	}

  public function login($param1='',$param2=''){
		if ($param1=='do_login') {
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			$auth = $this->AuthModel->getAccountLogin($username,$password);
			if ($auth) {
				foreach ($auth as $key) {
					$loginSession = array(
						'id_pengguna' => $key->id_pengguna,
						'nama_lengkap' => $key->nama_lengkap,
						'fotopengguna' => $key->fotopengguna,
						'email' => $key->email,
						'hak_akses' => $key->hak_akses,
						'LoggedIN' => TRUE
					);
				}
				$activity_status = array(
					'activity_status' => 'online',
					'last_login' => date('Y-m-d H:i:s')
				);
				$this->session->set_userdata($loginSession);
				$onlineStatus = $this->GeneralModel->update_general('tb_pengguna','username',$username,$activity_status);
				redirect('panel/dashboard');
			}else {
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Username atau Password yang anda masukkan salah!</div>');
				redirect('/auth/login');
			}
		}else {
			$this->load->view('login');
		}
  }

	public function logout()
	{
		$this->session->set_userdata('login', 0);
		$this->session->sess_destroy();
    	$this->session->set_flashdata('logout_notification', 'logged_out');
		redirect(base_url(),'refresh');
	}

	public function access_denied(){
		$data['appsProfile'] = $this->SettingsModel->get_profile();
		$data['title'] = '401';
		$this->load->view('errors/panel/unauthorized_access',$data);
	}

	public function validation_username(){
		$username = $this->input->post('username');
		$session_username = $this->session->userdata('username');
		$exists = $this->UsersModel->getUsername($username);
		$count = count($exists);
		if($count > 0 AND $username != $session_username ){
			echo "<h5 class='text-danger'> Username Tidak Tersedia </h5>";
		}else{
			echo "<h5 class='text-success'> Username Tersedia </h5>";
		}
	}

}
