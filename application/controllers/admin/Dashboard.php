<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
        $this->load->model('managerumum/m_dashboard');
	}

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $isi = [
            'pekerjaanMasuk'	=> $this->m_dashboard->getPmThn()
        ];
        $this->load->view('admin/dashboard', $isi);
    }
}
