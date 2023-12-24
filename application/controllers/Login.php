<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function auth()
	{
		$user_username	     = $this->input->post('user_username');
		$user_password	     = $this->input->post('user_password');
        $data['user_active'] = '1';
		$cakun		         = $this->m_login->cekakun($user_username,$user_password);

		if($cakun->num_rows() > 0){
			$this->session->set_userdata('masuk',true);
			$xcakun  = $cakun->row_array();
            $user_id = $xcakun['user_id'];
			$user_nama = $xcakun['user_nama'];
            $this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('user_nama',$user_nama);

			if(($xcakun['user_role'] == 'Manager Umum')){
                $this->m_login->updateactive($user_id, $data);
				redirect('managerumum/dashboard');
			} elseif(($xcakun['user_role'] == 'Admin')){
                $this->m_login->updateactive($user_id, $data);
				redirect('admin/dashboard');
			} elseif(($xcakun['user_role'] == 'Teknisi')){
                $this->m_login->updateactive($user_id, $data);
				redirect('teknisi/dashboard');
			} else{
				$this->session->set_flashdata('flashdata','Username atau Password salah');
				redirect('login');
			}
		} else if (!$user_username || !$user_password) {
			$this->session->set_flashdata('flashdata','Username atau Password tidak boleh kosong');
			redirect('login');
		} else {
			$this->session->set_flashdata('flashdata','Akun belum terdaftar. Silahkan Hubungi Admin');
			redirect('login');
		}
    }

    public function forpass()
	{
        $this->load->view('forpass');
    }

	public function conf_forpass()
	{
        $this->form_validation->set_rules('user_email', 'Email', 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('user_username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('user_newpass', 'Password Baru', 'required|min_length[8]|max_length[50]');
		$this->form_validation->set_rules('user_confnewpass', 'Konfirmasi Password Baru', 'required|min_length[8]|max_length[50]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forpass');
        } else {
			$user_username  = $this->input->post('user_username');
			$user_email     = $this->input->post('user_email');
			$cek_user       = $this->m_login->cekforpass($user_username, $user_email);
			if ($cek_user->num_rows() > 0){
				$user_newpass 	  = $this->input->post('user_newpass');
				$user_confnewpass = $this->input->post('user_confnewpass');
				if (!$user_newpass || !$user_confnewpass){
					$this->session->set_flashdata('flashdata','Password Baru atau Konfirmasi Password tidak boleh kosong');
					redirect('login/forpass');
				} else {
					if ($user_newpass == $user_confnewpass) {
						$data['user_password'] = md5($user_newpass);
						$this->m_login->updatepass($user_username, $data);
						$this->session->set_flashdata('flashdata','Password berhasil diubah. Silahkan Login');
						redirect('login');
					}
					else if ($user_newpass != $user_confnewpass) {
						$this->session->set_flashdata('flashdata','Password Baru atau Konfirmasi Password tidak sama');
						redirect('login/forpass');
					} 
				}
			}
			else {
				$this->session->set_flashdata('flashdata','Username atau Email tidak ditemukan');
				redirect('login/forpass');
			}
		}
	}

    public function logout()
	{
        $user_id = $this->session->userdata('user_id');
        $data['user_active'] = '0';
        $this->m_login->updateactive($user_id, $data);
		$this->session->sess_destroy();
		redirect('login');
	}
}
