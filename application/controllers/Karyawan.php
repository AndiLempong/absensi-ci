<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	public function index()
	{
		$this->load->view('karyawan/index');
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

}
?>