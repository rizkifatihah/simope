<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */

	public $parent_modul = 1;

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['content'] = 'panel/dashboard/index';
		$this->load->view('panel/content',$data);
	}

}
