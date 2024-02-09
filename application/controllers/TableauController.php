<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TableauController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	  public function __construct()
	{
		parent::__construct();
		$this->load->model('Table_model','modelTable',TRUE);	
		$this->load->model('Create_model','modelCreate',TRUE);	
		$this->load->model('Read_model','modelRead',TRUE);	
	}
	 
	 
	public function pageTableau()
	{
		//$table="Equipement";
		//$data['liste']=$this->modelTable->takeAlls($table); 
		$idSemaine= $this->input->get('idSemaine');

		$table="semaine";
		$colonne="semaine";
		$data['semaine']=$this->modelTable->takeWhereAll($table,$colonne,$idSemaine); 
		$table="ViewDetail";
		$colonne="semaine";
		$data['detail']=$this->modelTable->takeWhereAll($table,$colonne,$idSemaine); 
		
		$this->load->view('Template/header');
		$this->load->view('tableau',$data);
		$this->load->view('Template/footer');
	}		
}
