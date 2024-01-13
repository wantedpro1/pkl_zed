<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('managerumum/m_profil');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$isi = [
			'content'	=> 'managerumum/profil/detail_profil',
			'data'		=> $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

    public function settings()
	{
		$user_id = $this->session->userdata('user_id');
		$isi = [
			'content'	=> 'managerumum/profil/setting_profil',
			'data'		=> $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

	public function update_profil()
	{
		$this->form_validation->set_rules('user_nama', 'Nama Lengkap', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('user_email', 'Email', 'min_length[1]|max_length[255]');
		$this->form_validation->set_rules('user_username', 'Username', 'required|min_length[8]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');

		$user_id = $this->session->userdata('user_id');

        if ($this->form_validation->run() == FALSE) {
			$isi = [
				'content'	=> 'managerumum/profil/setting_profil',
				'data'		=> $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array()
			];
			$this->load->view('managerumum/partial/dashboard', $isi);
        } else {
            $user_usernameold = $this->input->post('user_usernameold');
            $user_username    = $this->input->post('user_username');
            $cek_username     = $this->m_profil->cekusername($user_username);
			
			$config['upload_path'] 		= './assets/profil/';   //path folder
			$config['allowed_types'] 	= 'jpg|png|jpeg'; 	    //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] 	= TRUE; 				//nama yang terupload nantinya
			$config['max_size'] 		= 5120;

			// Inisiasi Upload
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

            if ($cek_username->num_rows() == 0) {
                $data = array (
                    'user_nama' 		=> $this->input->post('user_nama') ,
                    'user_email' 	    => $this->input->post('user_email') ,
                    'user_username' 	=> $this->input->post('user_username') 
                );
                if ($this->upload->do_upload('user_picture')) {
                    $data['user_picture'] = $this->upload->data('file_name');
                } 
			    $this->m_profil->updateprofil($user_id, $data);
                
                $this->session->set_flashdata('flashdata','Data Pengguna berhasil diupdate');
                redirect('managerumum/dashboard');

            } else if (($cek_username->num_rows() == 1) && ($user_username == $user_usernameold)) {
                $data = array (
                    'user_nama' 		=> $this->input->post('user_nama') ,
                    'user_email' 	    => $this->input->post('user_email') 
                );
                if ($this->upload->do_upload('user_picture')) {
                    $data['user_picture'] = $this->upload->data('file_name');
                } 
			    $this->m_profil->updateprofil($user_id, $data);
                
                $this->session->set_flashdata('flashdata','Data Pengguna berhasil diupdate');
                redirect('managerumum/dashboard');

            } else {
                $this->session->set_flashdata('flashdata','Username telah terdaftar sebelumnya');
			    redirect('managerumum/profil/settings');
            }
        }
    }

    public function update_password()
	{
		$this->form_validation->set_rules('user_passwordold', 'Password Lama', 'required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('user_passwordnew', 'Password Baru', 'required|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('user_passwordconfnew', 'Konfirmasi Password Baru', 'required|max_length[30]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');

		$user_id = $this->session->userdata('user_id');

        if ($this->form_validation->run() == FALSE) {
            $isi = [
				'content'	=> 'managerumum/profil/setting_profil',
				'data'		=> $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array()
			];
			$this->load->view('managerumum/partial/dashboard', $isi);
        } else {
            $user_username 		  = $this->input->post('user_username');
            $user_password 		  = $this->input->post('user_password');
            $user_passwordold	  = md5($this->input->post('user_passwordold'));
            $user_passwordnew 	  = $this->input->post('user_passwordnew');
            $user_passwordconfnew = $this->input->post('user_passwordconfnew');

            if ($user_password == $user_passwordold) {
                if ($user_passwordnew == $user_passwordconfnew) {
                    $data = [
                        'user_password' => md5($user_passwordnew)
                    ];
                    $this->m_profil->updatepassword($user_username, $data);
                    $this->session->set_flashdata('flashdata','Password Berhasil Diganti');
                    redirect('managerumum/dashboard');
                }
                else {
                    $this->session->set_flashdata('flashdata','Password Baru atau Konfirmasi Password tidak sama');
                    redirect('managerumum/profil/settings');
                }
            }
            else {
                $this->session->set_flashdata('flashdata','Password Lama tidak sesuai');
                redirect('managerumum/profil/settings');
            }
        }
    }
}