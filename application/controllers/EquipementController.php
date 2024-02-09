<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EquipementController extends CI_Controller {

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
		$this->load->model('Delete_model','modelDelete',TRUE);	
		$this->load->model('Update_model','modelUpdate',TRUE);		
	}
	 
	public function pageAjout()
	{		
		$this->load->view('Template/header');
		$this->load->view('AjoutEquipement');
		$this->load->view('Template/footer');
	}		
	
	public function enregistrer()
	{		
		$nom= $this->input->post('nom');
		$reference= $this->input->post('reference');
		$nbrMaintenance=1;
		$data = array(
			'nom' => $nom,
			'reference' => $reference,
			'nbrMaintenance' => $nbrMaintenance
		);
												
		$table="equipement";
		$this->modelCreate->create($table,$data);
	
		$this->pageAjout();
	}
	
	
	public function pageListe()
	{	
		$table="equipement";
		$data['liste']=$this->modelRead->get_all($table);
	
		$this->load->view('Template/header');
		$this->load->view('ListeEquipement',$data);
		$this->load->view('Template/footer');
	}
	public function pageModif()
	{		
		$idEquipement= $this->input->get('idEquipementModif');
		$table="equipement";
		$colonne="idEquipement";
		$data['liste']=$this->modelRead->get_IDRow($table,$colonne,$idEquipement);
		
		$this->load->view('Template/header');
		$this->load->view('ModifEquipement',$data);
		$this->load->view('Template/footer');
	}
	public function ModifEquipement()
	{	
		$idEquipementModif= $this->input->post('idEquipement');			
		$nom= $this->input->post('nom');
		$reference= $this->input->post('reference');
		$table="equipement";
		$colonne="idEquipement";
		$nbrMaintenance=1;
		
		$data = array(
			'nom' => $nom,
			'reference' => $reference,
			'nbrMaintenance' => $nbrMaintenance
		);
	
		$data['liste']=$this->modelUpdate->update($table,$colonne,$idEquipementModif, $data);
		$valeur="Update succes";
		$this->session->set_flashdata('afficherSuccesUpdate',$valeur);
		
		$this->pageListe();
	}
	public function SupprEquipement()
	{	
		$idEquipementSupp= $this->input->get('idEquipementSupp');
		$table="equipement";
		$colonne="idEquipement";
		$data['liste']=$this->modelDelete->delete($table,$colonne,$idEquipementSupp);
		$valeur="delete succes";
		$this->session->set_flashdata('afficherSuccesDelete',$valeur);
		
		$this->pageListe();
	}
}
