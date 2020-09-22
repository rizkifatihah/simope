<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */

	public $parent_modul = 5;
	public $title = 'Pengaturan';

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index(){
		$this->apps_info();
	}

	

	public function apps_info($param1='')
	{
		if(cekModul(9) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {
			$identitasAplikasi = array(
				'apps_name' => $this->input->post('apps_name'),
				'apps_version' => $this->input->post('apps_version'),
				'apps_code' => $this->input->post('apps_code'),
				'agency' => $this->input->post('agency'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'telephon' => $this->input->post('telephon'),
				'fax' => $this->input->post('fax'),
				'footer' => $this->input->post('footer'),
			);

			//---------------- UPDATE LOGO ---------------//
			$config['upload_path']          = 'assets/logo/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10000;


			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('logo'))
			{

			}
			else {
				$identitasAplikasi += array('logo' => $config['upload_path'].$this->upload->data('file_name'));
			}

			//---------------- UPDATE ICON ---------------//
			$config['upload_path']          = 'assets/logo/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10000;


			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('apps_icon'))
			{

			}
			else {
				$identitasAplikasi += array('apps_icon' => $config['upload_path'].$this->upload->data('file_name'));
			}


			$this->GeneralModel->update_general('tb_identitas','id_profile','1',$identitasAplikasi);
			$this->session->set_flashdata('notif','<div class="alert alert-success">Identitas Aplikasi Berhasil di Update</div>');
			redirect('panel/settings/apps_info');

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Identitas Aplikasi';
			$data['identitas'] = $this->GeneralModel->get_by_id_general('tb_identitas','id_profile','1');
			$data['content'] = 'panel/pengaturan/identitas/index';
			$this->load->view('panel/content',$data);
		}
	}


}
