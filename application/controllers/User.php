<?php
// <!-- بسم الله الرحمن الرحیم -->
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Ci_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('muser','model');
        // $this->load->view('vdashboard');
        
	}

	function index()
	{
		$data['title'] = 'FORM MASTER USER';
		$data['content'] = $this->load->view('vuser',$data,TRUE);		

		$this->load->view('main',$data);
	}

	function load_grid()
	{
		$privilege = $this->session->userdata('logged_in')['privilege'];
		$username = $this->session->userdata('logged_in')['username'];
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$privilege,$username);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		$fdate = 'd-m-Y';

		for($i = $iDisplayStart; $i < $end; $i++) {
			if($privilege != 'ADMIN')
			{
 					$act = '<a class="btn btn-warning btn-xs" title="EDIT PASSWORD" onclick="edit_user(\''.$data[$i]->id.'\',\''.$data[$i]->username.'\',\'pass\')">
                        <i class="fa fa-key"></i></a>
                    <a class="btn btn-info btn-xs" title="UBAH DATA" onclick="edit_user(\''.$data[$i]->id.'\',\''.$data[$i]->username.'\',\'user\')">
                        <i class="fa fa-edit"></i></a>';
			}
			else {
				 	$act = '<a class="btn btn-warning btn-xs" title="EDIT PASSWORD" onclick="edit_user(\''.$data[$i]->id.'\',\''.$data[$i]->username.'\',\'pass\')">
                        <i class="fa fa-key"></i></a>
                    <a class="btn btn-info btn-xs" title="UBAH DATA" onclick="edit_user(\''.$data[$i]->id.'\',\''.$data[$i]->username.'\',\'user\')">
                        <i class="fa fa-edit"></i></a> 
                    <a class="btn btn-danger btn-xs" title="HAPUS DATA" onclick="hapus_user(\''.$data[$i]->id.'\',\''.$data[$i]->username.'\')">
                        <i class="fa fa-trash"></i></a>';
			}
           
			$no = $i +1;		
			$records["data"][] = array(

				$no,
				$data[$i]->username,
  				$data[$i]->nama,
  				$data[$i]->privilege,
		      	$act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function build_param($param)
	{
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->qrcode1)) $string_param .= " and username LIKE '%".$param->username."%' ";
		}

		return $string_param;
	}

	function save_ms_user($status_data)
	{
		$privilege_session = $this->session->userdata('logged_in')['privilege'];
		$username 			= $this->input->post('user_id');
        $nama 			    = $this->input->post('nama');
		$password 			= $this->input->post('password');
		$passwordMD5 			= substr(md5($password),0,15);
		$privilege 			= $this->input->post('privilege');
		$daterec			= DATE('Y-m-d');
		//$user 			= $this->session->userdata('logged_in')['uid'];
		$userid 			= "ADMIN";
// var_dump($status_data);
// exit();
		
        if($status_data == 'SIMPAN')
        {
            $data = array(
			'username' 		=> $username,
			'nama' 		    => $nama,
			'password' 		=> $passwordMD5,
			'privilege' 	=> $privilege,
			'daterec' 		=> $daterec
            );			
            // save data santri
                 $this->model->_save_ms_user($data);
        }
        else 
        {
			if($password =='' && $privilege_session == 'ADMIN')
			{
				$data = array(
				// 'username' 		=> $username,
				'nama' 		    => $nama,
				'privilege' 	=> $privilege
				// 'password' 		=> $password
            	);	
			}else if($password =='' && $privilege_session != 'ADMIN')
			{
				$data = array(
				// 'username' 		=> $username,
				'nama' 		    => $nama,
				// 'privilege' 	=> $privilege
				// 'password' 		=> $password
            	);	
			}
			else {
				 $data = array(
				// 'username' 		=> $username,
				// 'nama' 		    => $nama,
				'password' 		=> $passwordMD5
				);	
			}
           		
            // update data santri
                 $this->model->_update_ms_user($data,$username);
        }
	}

	function cek_ms_user()
	{
        $username 			= $this->input->post('user_id');
    	$data = $this->model->_cek_ms_user($username);
		echo json_encode($data);
    }
    
	function get_ms_user($id)
	{
        $data = $this->model->_get_ms_user($id);
		echo json_encode($data);
	}

	function del_ms_user($id)
	{
		$this->model->_del_trms_users($id);
	}

	
}