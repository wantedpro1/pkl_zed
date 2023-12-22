<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('managerumum/m_teknisi');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$isi = [
			'content'	=> 'managerumum/teknisi/data_teknisi',
			'data'		=> $this->db->query("SELECT * FROM user WHERE user_role='Teknisi'")->result()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

    public function tambah_teknisi()
	{
		$isi = [
			'content'   => 'managerumum/teknisi/tambah_teknisi',
			'user_id'	=> $this->m_teknisi->user_id()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

	public function simpan_teknisi()
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
                'content'   => 'managerumum/teknisi/tambah_teknisi',
                'user_id'	=> $this->m_teknisi->user_id()
            ];
            $this->load->view('managerumum/partial/dashboard', $isi);
        } else {
            $data = array (
                'user_id' 		    => $this->input->post('user_id'),
                'user_nama' 		=> $this->input->post('user_nama') ,
                'user_email' 	    => $this->input->post('user_email') ,
                'user_username' 	=> $this->input->post('user_username') ,
                'user_password' 	=> md5($this->input->post('user_password')) ,
                'user_role' 		=> 'Teknisi' ,
                'user_active'		=> '0',
                'user_datecreate'   => $this->input->post('user_datecreate')
            );
            $this->db->insert('user', $data);
            
            $this->session->set_flashdata('flashdata','Data Teknisi berhasil ditambahkan');
            redirect('managerumum/teknisi');
        }
	}

	public function edit_teknisi($id)
	{
		$isi = [
			'content'   => 'managerumum/teknisi/edit_teknisi',
			'data'		=> $this->m_teknisi->edit($id)
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

	public function update_teknisi()
	{
        $this->form_validation->set_rules('user_nama', 'Nama', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('user_email', 'Email', 'min_length[1]|max_length[255]');
		$this->form_validation->set_rules('user_username', 'Username', 'required|min_length[6]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

		$id = $this->input->post('user_id');
        if ($this->form_validation->run() == FALSE) {
            $isi = [
				'content'   => 'managerumum/teknisi/edit_teknisi',
				'data'		=> $this->m_teknisi->edit($id)
			];
            $this->load->view('managerumum/partial/dashboard', $isi);
        } else {

			if ($cek_username->num_rows() == 0) {
                $data = array (
                    'user_nama' 		=> $this->input->post('user_nama') ,
                    'user_email' 	    => $this->input->post('user_email') ,
                    'user_username' 	=> $this->input->post('user_username')
                );
			    $this->m_teknisi->update($user_id, $data);
                
                $this->session->set_flashdata('flashdata','Data Teknisi berhasil diupdate');
                redirect('managerumum/teknisi');

            } else if (($cek_username->num_rows() == 1) && ($user_username == $user_usernameold)) {
                $data = array (
                    'user_nama' 		=> $this->input->post('user_nama') ,
                    'user_email' 	    => $this->input->post('user_email')
                );
			    $this->m_teknisi->updateprofil($user_id, $data);
                
                $this->session->set_flashdata('flashdata','Data Teknisi berhasil diupdate');
                redirect('managerumum/teknisi');

            } else {
                $this->session->set_flashdata('flashdata','Username telah terdaftar sebelumnya');
			    $isi = [
					'content'   => 'managerumum/teknisi/edit_teknisi',
					'data'		=> $this->m_teknisi->edit($id)
				];
				$this->load->view('managerumum/partial/dashboard', $isi);
            }
        }
	}

	public function hapus_teknisi($id)
	{
		$this->m_teknisi->hapus_teknisi($id);
		$this->session->set_flashdata('flashdata','Data Teknisi berhasil dihapus');
		redirect('managerumum/teknisi');
	}
}