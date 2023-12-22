<?php 

class M_jadser Extends CI_Model{

	public function jadser_id()
    {
        $this->db->select('RIGHT(jadser.jadser_id,5) as kode', FALSE);
        $this->db->where('LEFT(jadser.jadser_id,2)','JD');
        $this->db->order_by('jadser_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('jadser');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "JD".$kodemax;
        return $kodejadi;
    }

    public function getdatajenpek()
	{
		$query = $this->db->query("SELECT * FROM jenpek ORDER BY jenpek_id ASC");
        return $query->result();
	}

    public function edit($id)
	{
		$this->db->where('jadser_id', $id);
		return $this->db->get('jadser')->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('jadser_id', $id);
		$this->db->update('jadser', $data);
	}

	public function hapus_jadser($id)
	{
		$this->db->where('jadser_id', $id);
		$this->db->delete('jadser');
	}
} 