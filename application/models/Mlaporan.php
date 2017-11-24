<?php

class Mlaporan extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }

  
    function _get_printdata_pertanggal($pertanggal)
    {
       $data = array();
		$data=$this->db->query("SELECT  * FROM trans_qrs where tgl ='$pertanggal'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
    }

    function _get_printdata_perperiode($perperiode_awal,$perperiode_akhir)
    {
       $data = array();
		$data=$this->db->query("SELECT  * FROM trans_qrs where tgl between '$perperiode_awal' and '$perperiode_akhir'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
    }
    
}