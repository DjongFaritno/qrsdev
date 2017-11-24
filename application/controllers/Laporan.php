<?php
// <!-- بسم الله الرحمن الرحیم -->
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Fnz_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mlaporan','model');
        // $this->load->view('vdashboard');
        
	}

	function index()
	{
		$data['title'] = 'FORM LAPORAN';
		$data['content'] = $this->load->view('vlaporan',$data,TRUE);		

		$this->load->view('main',$data);
	}


	function print_pertanggal($pertanggal)
	{
		$data['title'] 		= 'QRS | PRINT';
		$data['tglnow'] 	= $pertanggal;
		$data['transqr']	= $this->model->_get_printdata_pertanggal($pertanggal);
		$this->load->view('vprint',$data);		

		// $this->load->view('main',$data);
    }
    
	function print_perperiode($perperiode_awal,$perperiode_akhir)
	{
		$data['title'] 		= 'QRS | PRINT PERPERIODE';
		$data['tglawal'] 	= $perperiode_awal;
		$data['tglakhir'] 	= $perperiode_akhir;
		$data['transqr']	= $this->model->_get_printdata_perperiode($perperiode_awal,$perperiode_akhir);
		$this->load->view('vprint_periode',$data);		

		// $this->load->view('main',$data);
	}

}