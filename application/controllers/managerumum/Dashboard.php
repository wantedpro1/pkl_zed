<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $isi = [
            'm_login'    => $this->load->model('m_login'),
        ];
        $this->load->view('managerumum/dashboard', $isi);
    }
}
