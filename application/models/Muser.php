<?php

class Muser extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }

    function get_list_data($param,$sortby=0,$sorttype='desc',$privilege,$username)
	{
		

        $cols = array('id','username','nama','privilege');
        if($privilege == 'ADMIN')
        {
            $sql = "SELECT * FROM ms_user";	
        }
        else {
            $sql = "SELECT * FROM ms_user where username='$username'";	
        }

            	
		
				

		if($param!=null){

			$sql .= $param;
			
		}
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

		// echo $sql;
		// exit();
		
		return $this->db->query($sql)->result();
    }
    
    function _cek_ms_user($username)
    {
        $data = array();
        $data=$this->db->query("SELECT * from ms_user where username='$username'")->row_array();
        return $data;
    }

    function _get_ms_user($id)
    {
        $data = array();
        $data=$this->db->query("SELECT * from ms_user where id='$id'")->row_array();
        return $data;
    }
        
    function _save_ms_user($data)
    {
        $this->db->insert('ms_user',$data);
    }

    function _update_ms_user($data,$username)
    {
        // var_dump($data);
        // exit();
        $this->db->where('username',$username);
        $this->db->update('ms_user',$data);
    }

    function _del_trms_users($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('ms_user');
    }

    
    
}