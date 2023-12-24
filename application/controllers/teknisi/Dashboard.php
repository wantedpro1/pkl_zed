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
        $user_id = $this->session->userdata('user_id');
        $this->load->view('teknisi/dashboard');
    }
}
