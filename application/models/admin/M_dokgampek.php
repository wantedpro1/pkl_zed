<?php 

class M_dokgampek Extends CI_Model{

	public function dokgampek_id()
    {
        $this->db->select('RIGHT(dokgampek.dokgampek_id,5) as kode', FALSE);
        $this->db->where('LEFT(dokgampek.dokgampek_id,2)','DK');
        $this->db->order_by('dokgampek_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('dokgampek');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "DK".$kodemax;
        return $kodejadi;
    }

    public function getdatajadser()
	{
		$query = $this->db->query("SELECT * FROM jadser WHERE jadser_status='0' ORDER BY jadser_id ASC");
        return $query->result();
	}

    public function edit($id)
	{
		$this->db->where('dokgampek_id', $id);
		return $this->db->get('dokgampek')->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('dokgampek_id', $id);
		$this->db->update('dokgampek', $data);
	}

	public function hapus_dokgampek($id)
	{
		$this->db->where('dokgampek_id', $id);
		$this->db->delete('dokgampek');
	}
} 