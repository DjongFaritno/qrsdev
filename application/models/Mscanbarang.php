<?php

class Mscanbarang extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }

    function get_list_data($param,$sortby=0,$sorttype='desc',$datenow)
	{
		

		$cols = array('id','qrcode','date','userid');

            $sql = "SELECT * FROM trans_qrs where tgl ='$datenow'";		
		
				

		if($param!=null){

			$sql .= $param;
			
		}
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

		// echo $sql;
		// exit();
		
		return $this->db->query($sql)->result();
    }
    
    function _cek_qrcode($qrcode1)
    {
        $data = array();
        $data=$this->db->query("SELECT * from trans_qrs where qrcode='$qrcode1'")->row_array();
        return $data;
    }
        
    function _save_trans_qrs($data)
    {
        $this->db->insert('trans_qrs',$data);
    }
    function _del_trans_qrs($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('trans_qrs');
    }

    function _get_printdata($tglnow)
    {
       $data = array();
		$data=$this->db->query("SELECT  * FROM trans_qrs where tgl ='$tglnow'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
    }
    
}