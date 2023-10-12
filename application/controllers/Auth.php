<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}
	public function index()
	{
		$this->load->view('auth/login');
	}


	public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email,];
        $query = $this->m_model->getwhere('admin', $data);
        $result = $query->row_array();

        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'email' => $result['email'],
                'username' => $result['username'],
                'role' => $result['role'],
                'id' => $result['id'],
            ];
            $this->session->set_userdata($data);
            if ($this->session->userdata('role') == 'admin') {
                redirect(base_url('admin/dashboard'));
            }elseif ($this->session->userdata('role') == 'karyawan') {
            redirect(base_url('karyawan/karyawan'))  ;
            } else {
                redirect(base_url('absensi/login'));
            }
        } else {
            redirect(base_url('karyawan/index'));
        }
    }

	public function aksi_register()
	{
	$data = [
		'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password'),
		'nama_depan' => $this->input->post('nama_depan'),
		'nama_belakang' => $this->input->post('nama_belakang'),
	];

	$this->m_model->register( $data);
	redirect(base_url('absensi/login'));
	}

	public function aksi_register_admin()
	{
	$data = [
		'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password'),
		'nama_depan' => $this->input->post('nama_depan'),
		'nama_belakang' => $this->input->post('nama_belakang'),
	];

	$this->m_model->register($data);
	redirect(base_url('absensi/login'));
	}
	public function aksi_register_karyawan()
	{
	$data = [
		'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password'),
		'nama_depan' => $this->input->post('nama_depan'),
		'nama_belakang' => $this->input->post('nama_belakang'),
	];

	$this->m_model->register_karyawan($data);
	redirect(base_url('absensi/login'));
	}

}