<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('superadmin/m_admin');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$isi = [
			'content'	=> 'superadmin/admin/data_admin',
			'data'		=> $this->db->query("SELECT * FROM user WHERE user_role='Admin'")->result()
		];
		$this->load->view('superadmin/partial/dashboard', $isi);
	}

    public function tambah_admin()
	{
		$isi = [
			'content'   => 'superadmin/admin/tambah_admin',
			'user_id'	=> $this->m_admin->user_id()
		];
		$this->load->view('superadmin/partial/dashboard', $isi);
	}

	public function simpan_admin()
	{
        $this->form_validation->set_rules('user_nama', 'Nama', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('user_email', 'Email', 'is_unique[user.user_email]|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('user_username', 'Username', 'required|is_unique[user.user_username]|min_length[6]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[6]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'   => 'superadmin/admin/tambah_admin',
                'user_id'	=> $this->m_admin->user_id()
            ];
            $this->load->view('superadmin/partial/dashboard', $isi);
        } else {
            $data = array (
                'user_id' 		    => $this->input->post('user_id'),
                'user_nama' 		=> $this->input->post('user_nama') ,
                'user_email' 	    => $this->input->post('user_email') ,
                'user_username' 	=> $this->input->post('user_username') ,
                'user_password' 	=> md5($this->input->post('user_password')) ,
                'user_role' 		=> 'Admin' ,
                'user_active'		=> '0',
                'user_datecreate'   => $this->input->post('user_datecreate')
            );
            $this->db->insert('user', $data);
            
            $this->session->set_flashdata('flashdata','Data Admin berhasil ditambahkan');
            redirect('superadmin/admin');
        }
	}

	public function hapus_admin($id)
	{
		$this->m_admin->hapus_admin($id);
		$this->session->set_flashdata('flashdata','Data Admin berhasil dihapus');
		redirect('superadmin/admin');
	}
}