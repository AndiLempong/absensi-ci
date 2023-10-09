<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

    // Login Nya
	public function login()
	{
		$this->load->view('absensi/login');
	}

	// Register Nya
	public function register()
	{
		$this->load->view('absensi/register');
	}

    public function sidebar()
    {
        $this->load->view('components/sidebar');
    }

}