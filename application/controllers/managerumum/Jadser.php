<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadser extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('managerumum/m_jadser');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$isi = [
			'content'	=> 'managerumum/jadser/data_jadser',
			'data'		=> $this->db->get('jadser')->result()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

    public function detail_jadser($jadser_id)
    {
        $isi = [
            'content'   => 'managerumum/jadser/detail_jadser',
            'data'		=> $this->db->query("SELECT * FROM jadser WHERE jadser_id='$jadser_id'")->row_array()
        ];
        $this->load->view('managerumum/partial/dashboard', $isi);
    }

    public function selesai_jadser($id)
	{
		$data['jadser_status'] = 1;
        $this->m_jadser->update($id, $data);
		$this->session->set_flashdata('flashdata','Jadwal Service berhasil diselesaikan');
		redirect('managerumum/jadser');
	}

    public function batal_jadser($id)
	{
		$data['jadser_status'] = 2;
        $this->m_jadser->update($id, $data);
		$this->session->set_flashdata('flashdata','Jadwal Service berhasil dibatalkan');
		redirect('managerumum/jadser');
	}


    public function tambah_jadser()
	{
		$isi = [
			'content'   => 'managerumum/jadser/tambah_jadser',
			'jadser_id'	=> $this->m_jadser->jadser_id(),
            'jenpek'	=> $this->m_jadser->getdatajenpek()
		];
		$this->load->view('managerumum/partial/dashboard', $isi);
	}

	public function simpan_jadser()
	{
        $this->form_validation->set_rules('jadser_nama', 'Nama Pelanggan', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_notelp', 'No Telepon', 'is_natural|min_length[10]|max_length[14]');
        $this->form_validation->set_rules('jadser_alamat', 'Alamat Pengguna', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_rules('jadser_jenpek', 'Jenis Pekerjaan', 'required');
		$this->form_validation->set_rules('jadser_merk', 'Merk Barang', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_jenbar', 'Jenis Barang', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_desker', 'Deskripsi Kerusakan', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_rules('jadser_nsu', 'Nomor Seri Unit', 'max_length[255]');
        $this->form_validation->set_rules('jadser_modun', 'Model Unit', 'max_length[255]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
        $this->form_validation->set_message('is_natural', '*{field} harus berupa angka.');

        $user_id    = $this->session->userdata('user_id');
		$data_user = $this->db->query("SELECT * FROM user WHERE user_id='$user_id'")->row_array();

        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'   => 'managerumum/jadser/tambah_jadser',
                'jadser_id'	=> $this->m_jadser->jadser_id(),
                'jenpek'	=> $this->m_jadser->getdatajenpek()
            ];
            $this->load->view('managerumum/partial/dashboard', $isi);
        } else {
            $data = array (
                'jadser_id' 		=> $this->input->post('jadser_id'),
                'jadser_nama' 		=> $this->input->post('jadser_nama') ,
                'jadser_notelp' 	=> $this->input->post('jadser_notelp') ,
                'jadser_alamat' 	=> $this->input->post('jadser_alamat') ,
                'jadser_jenpek' 	=> $this->input->post('jadser_jenpek') ,
                'jadser_merk' 	    => $this->input->post('jadser_merk') ,
                'jadser_jenbar' 	=> $this->input->post('jadser_jenbar'),
                'jadser_desker' 	=> $this->input->post('jadser_desker') ,
                'jadser_nsu' 	    => $this->input->post('jadser_nsu') ,
                'jadser_modun' 	    => $this->input->post('jadser_modun') ,
                'jadser_datecreate' => date('Y-m-d H:i:s'),
                'jadser_createby'   => $data_user['user_nama'],
                'jadser_status' 	=> '0'
            );
            $this->db->insert('jadser', $data);
            
            $this->session->set_flashdata('flashdata','Jadwal Service berhasil ditambahkan');
            redirect('managerumum/jadser');
        }
	}

    public function edit_jadser($id)
    {
        $isi = [
            'content'   => 'managerumum/jadser/edit_jadser',
            'data'	    => $this->m_jadser->edit($id),
            'jenpek'	=> $this->m_jadser->getdatajenpek()
        ];
        $this->load->view('managerumum/partial/dashboard', $isi);
    }

    public function update_jadser()
	{
		$this->form_validation->set_rules('jadser_nama', 'Nama Pelanggan', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_notelp', 'No Telepon', 'is_natural|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('jadser_alamat', 'Alamat Pengguna', 'required|min_length[1]|max_length[1000]');
		$this->form_validation->set_rules('jadser_merk', 'Merk Barang', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_jenbar', 'Jenis Barang', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('jadser_desker', 'Deskripsi Kerusakan', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_rules('jadser_nsu', 'Nomor Seri Unit', 'max_length[255]');
        $this->form_validation->set_rules('jadser_modun', 'Model Unit', 'max_length[255]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
        $this->form_validation->set_message('is_natural', '*{field} harus berupa angka.');

        $id = $this->input->post('jadser_id');
        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'   => 'managerumum/jadser/edit_jadser',
                'data'	    => $this->m_jadser->edit($id),
                'jenpek'	=> $this->m_jadser->getdatajenpek()
            ];
            $this->load->view('managerumum/partial/dashboard', $isi);
        } else {
			$data = array (
                'jadser_nama' 		=> $this->input->post('jadser_nama') ,
                'jadser_notelp' 	=> $this->input->post('jadser_notelp') ,
                'jadser_alamat' 	=> $this->input->post('jadser_alamat') ,
                'jadser_merk' 	    => $this->input->post('jadser_merk') ,
                'jadser_jenbar' 	=> $this->input->post('jadser_jenbar'),
                'jadser_desker' 	=> $this->input->post('jadser_desker') ,
                'jadser_nsu' 	    => $this->input->post('jadser_nsu') ,
                'jadser_modun' 	    => $this->input->post('jadser_modun') ,
            );

            $this->m_jadser->update($id, $data);
            $this->session->set_flashdata('flashdata','Jadwal Service berhasil diubah');
            redirect('managerumum/jadser');
		}
    }

	public function hapus_jadser($id)
	{
		$this->m_jadser->hapus_jadser($id);
		$this->session->set_flashdata('flashdata','Jadwal Service berhasil dihapus');
		redirect('managerumum/jadser');
	}
}