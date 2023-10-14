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
		$data['karyawan'] = $this->m_model->get_data('karyawan')->result();
		$this->load->view('karyawan/dashboard', $data);
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

	// public function admin()
	// {
	// 	$this->load->view('karyawan/admin');
	// }

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

	public function rekap_mingguan() {
        $data['karyawan'] = $this->m_model->getAbsensiLast7Days();        
        $this->load->view('karyawan/rekap_mingguan', $data);
    }


}
?>