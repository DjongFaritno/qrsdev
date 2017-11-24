<?php
// <!-- بسم الله الرحمن الرحیم -->
defined('BASEPATH') OR exit('No direct script access allowed');

class ScanBarang extends Fnz_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mscanbarang','model');
        // $this->load->view('vdashboard');
        
	}

	function index()
	{
		$data['title'] = 'FORM SCAN BARANG';
		$data['kategori'] = '';
		$data['tglnow'] = date('Y-m-d');
		$data['content'] = $this->load->view('vscanbarang',$data,TRUE);		

		$this->load->view('main',$data);
	}

	function load_grid()
	{
		$datenow		= date('y-m-d');
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$datenow);
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
			// <button type="button" class="btn btn-block btn-danger btn-xs">Danger</button>
			$act = '<a class="btn btn-danger btn-xs" title="HAPUS DATA" onclick="hapus_scanned(\''.$data[$i]->id.'\',\''.$data[$i]->qrcode.'\')">
						<i class="fa fa-trash"></i>';
			$no = $i +1;		
			$records["data"][] = array(

				$no,
				$data[$i]->qrcode,
  				$data[$i]->tgl,
  				$data[$i]->userid,
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

			if(isset($param->qrcode1)) $string_param .= " and qrcode LIKE '%".$param->qrcode1."%' ";
		}

		return $string_param;
	}

	function save_trans_qrs()
	{
		$qrcode1 			= $this->input->post('qrcode1');
		$kategori 			= $this->input->post('kategori');
		$date 				= date('y-m-d');
		//$user 			= $this->session->userdata('logged_in')['uid'];
		$userid 			= $this->session->userdata('logged_in')['username'];

		$data = array(
			'qrcode' 		=> $qrcode1,
			'kategori' 		=> $kategori,
			'tgl' 			=> $date,
			'userid' 		=> $userid,
		);			
		// save data santri
			 $this->model->_save_trans_qrs($data);
	}

	function cek_trans_qrs()
	{
		$qrcode1 			= $this->input->post('qrcode1');
    	$data = $this->model->_cek_qrcode($qrcode1);
		echo json_encode($data);
	}

	function del_trans_qrs($id)
	{
		$this->model->_del_trans_qrs($id);
	}

	function trans_print($tglnow)
	{
		$data['title'] 		= 'QRS | PRINT';
		$data['tglnow'] 	= $tglnow;
		$data['transqr']	= $this->model->_get_printdata($tglnow);
		$this->load->view('vprint',$data);		

		// $this->load->view('main',$data);
	}

}