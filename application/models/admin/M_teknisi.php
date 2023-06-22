<?php 

class M_teknisi Extends CI_Model{

	public function user_id()
    {
        $this->db->select('RIGHT(user.user_id,5) as kode', FALSE);
        $this->db->where('LEFT(user.user_id,2)','TK');
        $this->db->order_by('user_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "TK".$kodemax;
        return $kodejadi;
    }

    public function edit($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('user')->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
	}

	public function hapus_teknisi($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}
} 