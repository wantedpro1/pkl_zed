<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Garansi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_login');
        $this->load->model('teknisi/m_garansi');
	}

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $isi = [
            'content'   => 'teknisi/garansi/data_garansi',
            'data'		=> $this->db->get('garansi')->result()
        ];
        $this->load->view('teknisi/partial/dashboard', $isi);
    }

    public function detail_garansi($garansi_id)
    {
        $isi = [
            'content'   => 'teknisi/garansi/detail_garansi',
            'data'		=> $this->db->query("SELECT * FROM garansi WHERE garansi_id='$garansi_id'")->row_array()
        ];
        $this->load->view('teknisi/partial/dashboard', $isi);
    }

    public function tambah_garansi()
    {
        $isi = [
            'content'    => 'teknisi/garansi/tambah_garansi',
            'garansi_id' => $this->m_garansi->garansi_id()
        ];
        $this->load->view('teknisi/partial/dashboard', $isi);
    }

    public function simpan_garansi()
	{
		$this->form_validation->set_rules('garansi_no', 'No garansi', 'required|is_unique[garansi.garansi_no]|max_length[50]');
        $this->form_validation->set_rules('garansi_nama', 'Nama garansi', 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_jenis', 'Jenis garansi', 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_tanggal', 'Tanggal Upload garansi', 'max_length[255]');
		$this->form_validation->set_rules('garansi_keterangan', 'Keterangan', 'max_length[255]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'    => 'teknisi/garansi/tambah_garansi',
                'garansi_id' => $this->m_garansi->garansi_id()
            ];
            $this->load->view('teknisi/partial/dashboard', $isi);
        } else {
			$config['upload_path'] 		= './documents/'; 			        //path folder
			$config['allowed_types'] 	= 'pdf|doc|docx|ppt|pptx|zip|rar'; 	//type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] 	= TRUE; 						    //nama yang terupload nantinya
			$config['max_size'] 		= 10240;							//maksimal ukuran 10 MB

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if ($_FILES['garansi_file']['name']) {
				$this->upload->do_upload('garansi_file');
				$garansi_file = $this->upload->data('file_name');
			}

			$data = array (
				'garansi_id'            => $this->input->post('garansi_id'),
                'garansi_no' 		    => $this->input->post('garansi_no') ,
				'garansi_nama' 		    => $this->input->post('garansi_nama') ,
				'garansi_jenis' 	    => $this->input->post('garansi_jenis') ,
				'garansi_tanggal' 	    => $this->input->post('garansi_tanggal') ,
				'garansi_file'		    => $garansi_file,
                'garansi_keterangan' 	=> $this->input->post('garansi_keterangan') 
			);

			$this->db->insert('garansi', $data);
			$this->session->set_flashdata('flashdata','Data garansi berhasil ditambahkan');
			redirect('teknisi/garansi');
		}
    }

    public function edit_garansi($id)
    {
        $isi = [
            'content'   => 'teknisi/garansi/edit_garansi',
            'data'	    => $this->m_garansi->edit($id),
        ];
        $this->load->view('teknisi/partial/dashboard', $isi);
    }

    public function update_garansi()
	{
		$this->form_validation->set_rules('garansi_no', 'No garansi', 'required|max_length[50]');
        $this->form_validation->set_rules('garansi_nama', 'Nama garansi', 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_jenis', 'Jenis garansi', 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_tanggal', 'Tanggal Upload garansi', 'max_length[255]');
		$this->form_validation->set_rules('garansi_keterangan', 'Keterangan', 'max_length[255]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        $garansi_id = $this->input->post('garansi_id');
        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'   => 'teknisi/garansi/edit_garansi',
                'data'	    => $this->m_garansi->edit($garansi_id),
            ];
            $this->load->view('teknisi/partial/dashboard', $isi);
        } else {
			$config['upload_path'] 		= './documents/'; 			        //path folder
			$config['allowed_types'] 	= 'pdf|doc|docx|ppt|pptx|zip|rar'; 	//type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] 	= TRUE; 						    //nama yang terupload nantinya
			$config['max_size'] 		= 10240;							//maksimal ukuran 10 MB

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if ($_FILES['garansi_file']['name']) {
				$this->upload->do_upload('garansi_file');
				$garansi_file = $this->upload->data('file_name');
			}

            if (!$garansi_file) {
                $data = array (
                    'garansi_no' 		    => $this->input->post('garansi_no') ,
                    'garansi_nama' 		    => $this->input->post('garansi_nama') ,
                    'garansi_jenis' 	    => $this->input->post('garansi_jenis') ,
                    'garansi_tanggal' 	    => $this->input->post('garansi_tanggal') ,
                    'garansi_keterangan' 	=> $this->input->post('garansi_keterangan') 
                );
                
                $this->m_garansi->update($garansi_id, $data);
                $this->session->set_flashdata('flashdata','Data garansi berhasil diupdate');
                redirect('teknisi/garansi');
            } else {
                $data = array (
                    'garansi_no' 		    => $this->input->post('garansi_no') ,
                    'garansi_nama' 		    => $this->input->post('garansi_nama') ,
                    'garansi_jenis' 	    => $this->input->post('garansi_jenis') ,
                    'garansi_tanggal' 	    => $this->input->post('garansi_tanggal') ,
                    'garansi_file'		    => $garansi_file,
                    'garansi_keterangan' 	=> $this->input->post('garansi_keterangan') 
                );

                $this->m_garansi->update($garansi_id, $data);
                $this->session->set_flashdata('flashdata','Data garansi berhasil diupdate');
                redirect('teknisi/garansi');
            }
		}
    }

    public function hapus_garansi($id)
	{
		$this->m_garansi->hapus_garansi($id);
		$this->session->set_flashdata('flashdata','Data garansi berhasil dihapus');
		redirect('teknisi/garansi');
	}
}
