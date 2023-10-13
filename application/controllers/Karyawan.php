<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	public function dashboard()
	{
		$this->load->view('karyawan/dashboard');
	}

	public function izin()
	{
		$this->load->view('karyawan/izin');
	}
	public function absensi()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/absensi', $data);
	}

	public function profil()
	{
		$this->load->view('karyawan/profil');
	}

	public function edit_profil()
	{
		$this->load->view('karyawan/edit_profil');
	}

	public function history()
	{
		$this->load->view('karyawan/history');
	}


}
?>