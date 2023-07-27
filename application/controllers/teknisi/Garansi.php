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
		$this->form_validation->set_rules('garansi_nowo', 'No. WO', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nofaktur', 'No. Faktur', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nama', 'Nama Konsumen', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('garansi_alamat', 'Alamat', 'required|min_length[1]|max_length[1000]');
		$this->form_validation->set_rules('garansi_kota', 'Kota', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('garansi_telepon', 'No. Telepon', 'required|numeric|min_length[1]|max_length[14]');
		$this->form_validation->set_rules('garansi_keluhan', 'Keluhan', 'min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_produk', 'Produk', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nobukkun', 'No. Bukti Kunjungan', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_noseri', 'No. Seri', 'min_length[1]|max_length[50]');
        $this->form_validation->set_rules('garansi_aktivser', 'Aktivitas Service', 'min_length[1]|max_length[1000]');
        $this->form_validation->set_rules('garansi_partno', 'No. Spare Part', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_ongkostransport', 'Ongkos Transport', 'required|min_length[3]|max_length[9]');
        $this->form_validation->set_rules('garansi_ongkoskerja', 'Ongkos Kerja', 'required|min_length[3]|max_length[9]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
        $this->form_validation->set_message('numeric', '*{field} hanya boleh di isi dengan angka.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'    => 'teknisi/garansi/tambah_garansi',
                'garansi_id' => $this->m_garansi->garansi_id()
            ];
            $this->load->view('teknisi/partial/dashboard', $isi);
        } else {
			$data = array (
				'garansi_id'                => $this->input->post('garansi_id') ,
                'garansi_tgllaporan'        => $this->input->post('garansi_tgllaporan') ,
				'garansi_tglkunjungan' 		=> $this->input->post('garansi_tglkunjungan') ,
				'garansi_tglperbaikan' 	    => $this->input->post('garansi_tglperbaikan') ,
				'garansi_tglselesai' 	    => $this->input->post('garansi_tglselesai') ,
				'garansi_nowo'		        => $this->input->post('garansi_nowo') ,
                'garansi_nofaktur' 	        => $this->input->post('garansi_nofaktur') ,

                'garansi_nama'              => $this->input->post('garansi_nama') ,
                'garansi_alamat'            => $this->input->post('garansi_alamat') ,
				'garansi_kota' 		        => $this->input->post('garansi_kota') ,
				'garansi_telepon' 	        => $this->input->post('garansi_telepon') ,
				'garansi_keluhan' 	        => $this->input->post('garansi_keluhan') ,
				'garansi_produk'		    => $this->input->post('garansi_produk') ,
                'garansi_tglbeli' 	        => $this->input->post('garansi_tglbeli') ,

                'garansi_nobukkun'          => $this->input->post('garansi_nobukkun') ,
                'garansi_bl'                => $this->input->post('garansi_bl') ,
				'garansi_noseri' 		    => $this->input->post('garansi_noseri') ,
				'garansi_aktivser' 	        => $this->input->post('garansi_aktivser') ,
				'garansi_partno' 	        => $this->input->post('garansi_partno') ,
				'garansi_ongkostransport'	=> $this->input->post('garansi_ongkostransport') ,
                'garansi_ongkoskerja' 	    => $this->input->post('garansi_ongkoskerja') 
			);

            $data['garansi_totalongkos'] = $data['garansi_ongkostransport'] + $data['garansi_ongkoskerja'];

			$this->db->insert('garansi', $data);
			$this->session->set_flashdata('flashdata','Data Garansi berhasil ditambahkan');
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
		$this->form_validation->set_rules('garansi_nowo', 'No. WO', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nofaktur', 'No. Faktur', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nama', 'Nama Konsumen', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('garansi_alamat', 'Alamat', 'required|min_length[1]|max_length[1000]');
		$this->form_validation->set_rules('garansi_kota', 'Kota', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('garansi_telepon', 'No. Telepon', 'required|numeric|min_length[1]|max_length[14]');
		$this->form_validation->set_rules('garansi_keluhan', 'Keluhan', 'min_length[1]|max_length[255]');
		$this->form_validation->set_rules('garansi_produk', 'Produk', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_nobukkun', 'No. Bukti Kunjungan', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_noseri', 'No. Seri', 'min_length[1]|max_length[50]');
        $this->form_validation->set_rules('garansi_aktivser', 'Aktivitas Service', 'min_length[1]|max_length[1000]');
        $this->form_validation->set_rules('garansi_partno', 'No. Spare Part', 'min_length[1]|max_length[20]');
        $this->form_validation->set_rules('garansi_ongkostransport', 'Ongkos Transport', 'required|min_length[3]|max_length[9]');
        $this->form_validation->set_rules('garansi_ongkoskerja', 'Ongkos Kerja', 'required|min_length[3]|max_length[9]');

		$this->form_validation->set_message('required', '*{field} masih kosong. Silahkan diisi.');
		$this->form_validation->set_message('max_length', '*{field} tidak boleh lebih dari {param} karakter.');
		$this->form_validation->set_message('min_length', '*{field} setidaknya harus memiliki {param} karakter.');
        $this->form_validation->set_message('numeric', '*{field} hanya boleh di isi dengan angka.');
		$this->form_validation->set_message('is_unique', '*{field} sudah ada.');

        $id = $this->input->post('garansi_id');
        if ($this->form_validation->run() == FALSE) {
            $isi = [
                'content'   => 'teknisi/garansi/edit_garansi',
                'data'	    => $this->m_garansi->edit($id),
            ];
            $this->load->view('teknisi/partial/dashboard', $isi);
        } else {
			$data = array (
				'garansi_id'                => $this->input->post('garansi_id') ,
                'garansi_tgllaporan'        => $this->input->post('garansi_tgllaporan') ,
				'garansi_tglkunjungan' 		=> $this->input->post('garansi_tglkunjungan') ,
				'garansi_tglperbaikan' 	    => $this->input->post('garansi_tglperbaikan') ,
				'garansi_tglselesai' 	    => $this->input->post('garansi_tglselesai') ,
				'garansi_nowo'		        => $this->input->post('garansi_nowo') ,
                'garansi_nofaktur' 	        => $this->input->post('garansi_nofaktur') ,

                'garansi_nama'              => $this->input->post('garansi_nama') ,
                'garansi_alamat'            => $this->input->post('garansi_alamat') ,
				'garansi_kota' 		        => $this->input->post('garansi_kota') ,
				'garansi_telepon' 	        => $this->input->post('garansi_telepon') ,
				'garansi_keluhan' 	        => $this->input->post('garansi_keluhan') ,
				'garansi_produk'		    => $this->input->post('garansi_produk') ,
                'garansi_tglbeli' 	        => $this->input->post('garansi_tglbeli') ,

                'garansi_nobukkun'          => $this->input->post('garansi_nobukkun') ,
                'garansi_bl'                => $this->input->post('garansi_bl') ,
				'garansi_noseri' 		    => $this->input->post('garansi_noseri') ,
				'garansi_aktivser' 	        => $this->input->post('garansi_aktivser') ,
				'garansi_partno' 	        => $this->input->post('garansi_partno') ,
				'garansi_ongkostransport'	=> $this->input->post('garansi_ongkostransport') ,
                'garansi_ongkoskerja' 	    => $this->input->post('garansi_ongkoskerja') 
			);

            $data['garansi_totalongkos'] = $data['garansi_ongkostransport'] + $data['garansi_ongkoskerja'];

            $this->m_garansi->update($id, $data);
            $this->session->set_flashdata('flashdata','Data Garansi berhasil diupdate');
            redirect('teknisi/garansi');
		}
    }

    public function hapus_garansi($id)
	{
		$this->m_garansi->hapus_garansi($id);
		$this->session->set_flashdata('flashdata','Data garansi berhasil dihapus');
		redirect('teknisi/garansi');
	}
}
