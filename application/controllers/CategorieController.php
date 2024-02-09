<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategorieController extends CI_Controller {

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
	 
	 
	public function pageAjout()
	{
		$table="Equipement";
		$data['liste']=$this->modelTable->takeAlls($table); 
		
		
		
		$this->load->view('Template/header');
		$this->load->view('AjoutCategorie',$data);
		$this->load->view('Template/footer');
	}	
	public function enregistrer()
	{		
		$idEquipement= $this->input->post('equipement');
		$designation= $this->input->post('designation');
		$nom= $this->input->post('nom');
		$emplacement= $this->input->post('emplacement');
		
		$data = array(
			'idEquipement' => $idEquipement,
			'designation' => $designation,
			'nom' => $nom,
			'emplacement' => $emplacement
		);
												
		$table="sousensemble";
		$this->modelCreate->create($table,$data);
	
		$this->pageAjout();
	}	
	
	public function ListeSousEnsemble()
	{
		$idEquipement= $this->input->get('idEquipement');
		$table="sousensemble";
		$colonne="idEquipement";
		$data['liste']=$this->modelRead->get_ID($table,$colonne,$idEquipement);
		
		
		
		$this->load->view('Template/header');
		$this->load->view('ListeSousEnsemble',$data);
		$this->load->view('Template/footer');
	}
}
