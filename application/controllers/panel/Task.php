<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	/**
		*created by https://medandigitalinnovation.com
		*Estimate 2019
	 */

	public $parent_modul = 2;
	public $title = 'List Task';

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index(){
		$this->requestTask();
	}

	public function requestTask($param1='',$param2='')
	{
		if(cekModul(10) == FALSE) redirect('auth/access_denied');
		if($this->session->userdata('hak_akses') == 'staff'){
			if ($param1=='Decline') {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Decline';
				$data['requestTask'] = $this->GeneralModel->requestTaskId('Decline',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Waiting';
				$data['requestTask'] = $this->GeneralModel->requestTaskId('Waiting',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
		}else{
			if ($param1=='Decline') {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Decline';
				$data['requestTask'] = $this->GeneralModel->requestTask('Decline');
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Waiting';
				$data['requestTask'] = $this->GeneralModel->requestTask('Waiting');
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
		}
        
	}

	public function detailRequestTask($param1='')
	{
		$data['title'] = $this->title;
		$data['subtitle'] = 'Rencana Kerja';
		$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/requestTask/detail';
		$this->load->view('panel/content',$data);
	} 

	public function confirmRequestTask($param1='')
	{
		if(cekModul(13) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_persetujuan' => 'Approve',
			'waktu_persetujuan' => date("Y-m-d"),
			'status_rencana_kerja' => 'On Progress',
			'waktu_rencana_kerja' => date("Y-m-d"),
			'status_detail_pekerjaan' => 'On Progress',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil diterima</div>');
			redirect('panel/task/requestTask');
		}
	} 

	public function declineRequestTask($param1='')
	{
		if(cekModul(14) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_persetujuan' => 'Decline',
			'waktu_persetujuan' => date("Y-m-d"),
			'status_rencana_kerja' => 'Failed',
			'waktu_rencana_kerja' => date("Y-m-d"),
			'status_detail_pekerjaan' => 'Failed',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditolak</div>');
			redirect('panel/task/requestTask');
		}
	} 

	public function createRequestTask($param1='',$param2='')
	{
		if(cekModul(11) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_create') {

			$dataTask = array(
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'kategori_kerja' => $this->input->post('kategori_kerja'),
				'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
				'detail_pekerjaan' => $this->input->post('detail_pekerjaan'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'keterangan_pekerjaan' => $this->input->post('keterangan_pekerjaan'),
				'created_by' => $this->session->userdata('id_pengguna'),
			);

			if ($this->GeneralModel->create_general('tb_tasklist',$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Rencana Kerja';
			$data['content'] = 'panel/task/requestTask/create';
			$this->load->view('panel/content',$data);
		}
	}

	public function updateRequestTask($param1='',$param2='')
	{
		if(cekModul(12) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {

			$dataTask = array(
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'kategori_kerja' => $this->input->post('kategori_kerja'),
				'detail_pekerjaan' => $this->input->post('detail_pekerjaan'),
				'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'keterangan_pekerjaan' => $this->input->post('keterangan_pekerjaan'),
				'created_by' => $this->session->userdata('id_pengguna'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Rencana Kerja';
			$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/requestTask/update';
			$this->load->view('panel/content',$data);
		}
	}

	public function historyTask($param1='',$param2='')
	{
		if(cekModul(15) == FALSE) redirect('auth/access_denied');
		if($this->session->userdata('hak_akses') == 'staff'){
       		$data['title'] = $this->title;
            $data['subtitle'] = 'Riwayat Pekerjaan';
            $data['task'] = $this->GeneralModel->requestTaskId('Approve',$this->session->userdata('id_pengguna'));
			$data['content'] = 'panel/task/historyTask/index';
			$this->load->view('panel/content',$data);
		}else{
			$data['title'] = $this->title;
            $data['subtitle'] = 'Riwayat Pekerjaan';
            $data['task'] = $this->GeneralModel->requestTask('Approve');
			$data['content'] = 'panel/task/historyTask/index';
			$this->load->view('panel/content',$data);
		}
	}

	public function detailHistoryTask($param1='')
	{
		$data['title'] = $this->title;
		$data['subtitle'] = 'Riwayat Pekerjaan';
		$data['task'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/historyTask/detail';
		$this->load->view('panel/content',$data);
	} 

	public function detailTask($param1='')
	{
		if(cekModul(16) == FALSE) redirect('auth/access_denied');
		$data['title'] = $this->title;
		$data['id'] = $param1;
		$data['subtitle'] = 'Riwayat Pekerjaan';
		$data['task'] = $this->GeneralModel->get_by_id_general('tb_detail_task','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/historyTask/detailTask';
		$this->load->view('panel/content',$data);	
	}

	public function createTask($param1='',$param2='')
	{
		if(cekModul(17) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_create') {

			$dataTask = array(
				'nama_detail_task' => $this->input->post('nama_detail_task'),
				'id_tasklist' => my_simple_crypt($param2,'d'),
				'created_by' => $this->session->userdata('id_pengguna'),
			);

			$config['upload_path']          = 'assets/backend/berkas';
			$config['allowed_types']        = '*';
			$config['max_size']             = 1000000;


			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file_detail_task'))
			{
			
			}
			else {
				$dataTask += array('file_detail_task' => $config['upload_path'].$this->upload->data('file_name'));
			}

			if ($this->GeneralModel->create_general('tb_detail_task',$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Berkas Pekerjaan berhasil ditambahkan</div>');
				redirect('panel/task/detailTask/'.$param2.'');
			}

		}else {
			$data['title'] = $this->title;
			$data['id'] = $param1;
			$data['subtitle'] = 'Riwayat Pekerjaan';
			$data['content'] = 'panel/task/historyTask/createTask';
			$this->load->view('panel/content',$data);
		}
	}

	public function finishTask($param1='')
	{
		if(cekModul(18) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_rencana_kerja' => 'Complete',
			'waktu_rencana_kerja' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil diterima</div>');
			redirect('panel/task/historyTask');
		}
	}
	
	public function finishhistoryTask($param1='')
	{
		if(cekModul(19) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_detail_pekerjaan' => 'Complete',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Detail Pekerjaan berhasil diterima</div>');
			redirect('panel/task/historyTask');
		}
	}

	public function failedhistoryTask($param1='')
	{
		if(cekModul(20) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_detail_pekerjaan' => 'Failed',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Detail Pekerjaan berhasil ditolak</div>');
			redirect('panel/task/historyTask');
		}
	}

	public function rateTask($param1='',$param2='')
	{
		if(cekModul(21) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_score') {

			$dataTask = array(
				'rating_pekerjaan' => $this->input->post('rating_pekerjaan'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Riwayat Pekerjaan';
			$data['rate'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/historyTask/rate';
			$this->load->view('panel/content',$data);
		}
	}
	

}
