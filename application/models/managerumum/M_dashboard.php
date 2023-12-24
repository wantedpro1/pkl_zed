<?php 

class M_dashboard Extends CI_Model{

	public function getPmThn()
    {
        $PekerjaanMasuk = $this->db->query("SELECT jadser_datecreate FROM jadser WHERE DATE(jadser_datecreate) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();      

        return $PekerjaanMasuk;
    }

    public function getPsThn()
    {
        $PekerjaanSelesai = $this->db->query("SELECT jadser_datecreate FROM jadser WHERE jadser_status = '1' AND DATE(jadser_datecreate) BETWEEN CONCAT(YEAR(CURDATE())-1, " . '\'-\'' . ", MONTH(CURDATE())-1, " . '\'-\'' . ", DAY(CURDATE())) AND CONCAT(YEAR(CURDATE()), " . '\'-\'' . ", MONTH(CURDATE()), " . '\'-\'' . ", DAY(CURDATE()))")->result_array();      

        return $PekerjaanSelesai;
    }

} 