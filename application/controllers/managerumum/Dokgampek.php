<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokgampek extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('managerumum/m_dokgampek');
		$this->load->library('zip');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$isi = [
			'content'	=> 'managerumum/dokgampek/data_dokgampek',
			'data'		=> $this->db->get('dokgampek')->result()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}
	
	public function detail_dokgampek($dokgampek_id)
    {
        $isi = [
            'content'   => 'managerumum/dokgampek/detail_dokgampek',
            'data'		=> $this->db->query("SELECT * FROM dokgampek WHERE dokgampek_id='$dokgampek_id'")->row_array()
        ];
        $this->load->view('managerumum/partial/dashboard', $isi);
    }

	public function setuju_dokgampek($id)
	{
		$data['dokgampek_status'] = 1;
        $this->m_dokgampek->update($id, $data);
		$this->session->set_flashdata('flashdata','Dokumentasi Pekerjaan berhasil disetujui');
		redirect('managerumum/dokgampek');
	}

	public function tolak_dokgampek($id)
	{
		$data['dokgampek_status'] = 2;
        $this->m_dokgampek->update($id, $data);
		$this->session->set_flashdata('flashdata','Dokumentasi Pekerjaan berhasil ditolak');
		redirect('managerumum/dokgampek');
	}

	public function download_global()
	{
		$directory 		= './assets/dokumentasi/';
		$filename		= 'rekap_dokumentasi';

		$this->zip->read_dir($directory, FALSE);
		$this->zip->download($filename);
	
		redirect('managerumum/dokgampek');
	}

	public function download_dokgampek($id)
	{
		$data_dokgampek			= $this->db->query("SELECT * FROM dokgampek WHERE dokgampek_id='$id'")->row_array();

		$jadser_id				= $data_dokgampek['jadser_id'];
		$dokgampek_datecreate	= $data_dokgampek['dokgampek_datecreate'];
		$datecreate				= str_replace( ':', '.', $dokgampek_datecreate);
		$dokgampek_nama			= $data_dokgampek['dokgampek_nama'];

		$lokasi = $jadser_id.' '.$datecreate.' - '.$dokgampek_nama;
		$directory 		= './assets/dokumentasi/'.$lokasi.'/';  //path folder
		$filename		= $lokasi;

		$this->zip->read_dir($directory, FALSE);
		$this->zip->download($filename);
	
		redirect('managerumum/dokgampek');
	}

    public function tambah_dokgampek()
	{
		$isi = [
			'content'   	=> 'managerumum/dokgampek/tambah_dokgampek',
			'dokgampek_id'	=> $this->m_dokgampek->dokgampek_id(),
			'jadser'		=> $this->m_dokgampek->getdatajadser()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

	public function simpan_dokgampek()
	{
		$user_id    = $this->session->userdata('user_id');
		$data_user = $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array();

		$jadser_id				= $this->input->post('jadser_id');
		$data_jadser			= $this->db->query("SELECT * FROM jadser WHERE jadser_id='$jadser_id'")->row_array();

		$lokasi = $jadser_id.' '.date('Y-m-d H.i.s').' - '.$data_jadser['jadser_nama'];

		$config['upload_path'] 		= './assets/dokumentasi/'.$lokasi.'/';  //path folder
		$config['allowed_types'] 	= 'jpg|png|jpeg'; 						//type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] 	= FALSE; 								//nama yang terupload nantinya
		$config['max_size'] 		= 5120;

		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}

		// Inisiasi Upload
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		// Upload Dokumen
		if ($this->upload->do_upload('dokgampek_nopem')) {
			$dokgampek_nopem = $this->upload->data('file_name');
		} else {
			$dokgampek_nopem = '';
		}

		if ($this->upload->do_upload('dokgampek_fotpek1')) {
			$dokgampek_fotpek1 = $this->upload->data('file_name');
		} else {
			$dokgampek_fotpek1 = '';
		}

		if ($this->upload->do_upload('dokgampek_fotpek2')) {
			$dokgampek_fotpek2 = $this->upload->data('file_name');
		} else {
			$dokgampek_fotpek2 = '';
		}

		if ($this->upload->do_upload('dokgampek_fotpek3')) {
			$dokgampek_fotpek3 = $this->upload->data('file_name');
		} else {
			$dokgampek_fotpek3 = '';
		}

		if ($this->upload->do_upload('dokgampek_kargar')) {
			$dokgampek_kargar = $this->upload->data('file_name');
		} else {
			$dokgampek_kargar = '';
		}

		if ($this->upload->do_upload('dokgampek_nsu')) {
			$dokgampek_nsu = $this->upload->data('file_name');
		} else {
			$dokgampek_nsu = '';
		}

		if ($this->upload->do_upload('dokgampek_modun')) {
			$dokgampek_modun = $this->upload->data('file_name');
		} else {
			$dokgampek_modun = '';
		}

		if ($this->upload->do_upload('dokgampek_parbar')) {
			$dokgampek_parbar = $this->upload->data('file_name');
		} else {
			$dokgampek_parbar = '';
		}

		if ($this->upload->do_upload('dokgampek_doklai')) {
			$dokgampek_doklai = $this->upload->data('file_name');
		} else {
			$dokgampek_doklai = '';
		}
		
		// Masukkan Data
        $data = array (
			'dokgampek_id' 			=> $this->input->post('dokgampek_id') ,
			'jadser_id' 			=> $jadser_id ,
			'dokgampek_nama' 		=> $data_jadser['jadser_nama'],
			'dokgampek_nopem' 	    => $dokgampek_nopem ,
			'dokgampek_fotpek1' 	=> $dokgampek_fotpek1 ,
			'dokgampek_fotpek2' 	=> $dokgampek_fotpek2 ,
			'dokgampek_fotpek3' 	=> $dokgampek_fotpek3 ,
			'dokgampek_kargar' 		=> $dokgampek_kargar ,
			'dokgampek_nsu' 		=> $dokgampek_nsu ,
			'dokgampek_modun' 		=> $dokgampek_modun ,
			'dokgampek_parbar' 		=> $dokgampek_parbar ,
			'dokgampek_doklai' 		=> $dokgampek_doklai ,
			'dokgampek_datecreate' 	=> date('Y-m-d H:i:s') ,
			'dokgampek_createby'	=> $data_user['user_nama'],
			'dokgampek_status'  	=> '0'
		);
		$this->db->insert('dokgampek', $data);
		
		$this->session->set_flashdata('flashdata','Dokumentasi Pekerjaan berhasil ditambahkan');
		redirect('managerumum/dokgampek');
	}

	public function edit_dokgampek($id)
    {
        $isi = [
            'content'   => 'managerumum/dokgampek/edit_dokgampek',
            'data'	    => $this->m_dokgampek->edit($id)
        ];
        $this->load->view('managerumum/partial/dashboard', $isi);
    }

	public function update_dokgampek()
	{
		$jadser_id				= $this->input->post('jadser_id');
		$dokgampek_datecreate	= $this->input->post('dokgampek_datecreate');
		$datecreate				= str_replace( ':', '.', $dokgampek_datecreate);
		$dokgampek_nama			= $this->input->post('dokgampek_nama');
		$id						= $this->input->post('dokgampek_id');

		$lokasi = $jadser_id.' '.$datecreate.' - '.$dokgampek_nama;

		$config['upload_path'] 		= './assets/dokumentasi/'.$lokasi.'/';  //path folder
		$config['allowed_types'] 	= 'jpg|png|jpeg'; 						//type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] 	= FALSE; 								//nama yang terupload nantinya
		$config['max_size'] 		= 5120;

		// Inisiasi Upload
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		// Upload Dokumen
		if ($this->upload->do_upload('dokgampek_nopem')) {
			$data['dokgampek_nopem'] = $this->upload->data('file_name');
		} 

		if ($this->upload->do_upload('dokgampek_fotpek1')) {
			$data['dokgampek_fotpek1'] = $this->upload->data('file_name');
		}

		if ($this->upload->do_upload('dokgampek_fotpek2')) {
			$data['dokgampek_fotpek2'] = $this->upload->data('file_name');
		} 

		if ($this->upload->do_upload('dokgampek_fotpek3')) {
			$data['dokgampek_fotpek3'] = $this->upload->data('file_name');
		} 

		if ($this->upload->do_upload('dokgampek_kargar')) {
			$data['dokgampek_kargar'] = $this->upload->data('file_name');
		} 

		if ($this->upload->do_upload('dokgampek_nsu')) {
			$data['dokgampek_nsu'] = $this->upload->data('file_name');
		}

		if ($this->upload->do_upload('dokgampek_modun')) {
			$data['dokgampek_modun'] = $this->upload->data('file_name');
		}

		if ($this->upload->do_upload('dokgampek_parbar')) {
			$data['dokgampek_parbar'] = $this->upload->data('file_name');
		}

		if ($this->upload->do_upload('dokgampek_doklai')) {
			$data['dokgampek_doklai'] = $this->upload->data('file_name');
		}

		$this->m_dokgampek->update($id, $data);		
		$this->session->set_flashdata('flashdata','Dokumentasi Pekerjaan berhasil diupdate');
		redirect('managerumum/dokgampek');
	}

	public function hapus_dokgampek($id)
	{
		$this->m_dokgampek->hapus_dokgampek($id);
		$this->session->set_flashdata('flashdata','Dokumentasi Pekerjaan berhasil dihapus');
		redirect('managerumum/dokgampek');
	}
}