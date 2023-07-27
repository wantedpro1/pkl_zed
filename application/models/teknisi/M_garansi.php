<?php 

class M_garansi Extends CI_Model{

	public function garansi_id()
    {
        $this->db->select('RIGHT(garansi.garansi_id,5) as kode', FALSE);
        $this->db->where('LEFT(garansi.garansi_id,2)','AD');
        $this->db->order_by('garansi_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('garansi');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "GRN".$kodemax;
        return $kodejadi;
    }

    public function edit($id)
	{
		$this->db->where('garansi_id', $id);
		return $this->db->get('garansi')->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('garansi_id', $id);
		$this->db->update('garansi', $data);
	}

	public function hapus_garansi($id)
	{
		$this->db->where('garansi_id', $id);
		$this->db->delete('garansi');
	}
} 