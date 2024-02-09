<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traitement extends CI_Controller {

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
	public function index()
	{
		$this->load->view('Template/header');
		$this->load->view('blank');
		$this->load->view('Template/footer');
	}	
	public function pageParSemaine()
	{
		
		$colonne="semaine";
		$table="semaine";
		$order="semaine";
		$data['liste']=$this->modelTable->selectDistinct($table,$colonne,$order); 
		
		$this->load->view('Template/header');
		$this->load->view('listeMaintenance',$data);
		$this->load->view('Template/footer');
	}	
	public function pageListeDeux()
	{
		$table="equipement";
		$data['liste']=$this->modelTable->takeAlls($table);
		
		$data['moisAvecSemaine']=$this->getMoisAvecSemaine();
		$this->load->view('Template/header');
		$this->load->view('ListeDeux',$data);
		$this->load->view('Template/footer');
	}
	public function getMoisAvecSemaine()
	{
		return [
		'Janvier' => 5
		,'Fevrier' => 4
		,'Mars' => 4
		,'Avril' => 5
		,'Mai' => 4
		,'Juin' => 5
		,'Juillet' => 4
		,'Aout' => 4
		,'Septembre' => 5
		,'Octobre' => 4
		,'Novembre' => 4
		,'Decembre' => 5]; 
		
	}
	
	public function enregistrer()
	{
		$maintenance= $this->input->post('maintenance');
		//var_dump($maintenance);
		$table="Equipement";
		$data['liste']=$this->modelTable->takeAlls($table); 
		$nbrEquipement=count($data['liste']);
		
		
		
		$nbrParDecoupeTotal=0;
		for($i=1;$i<$nbrEquipement+1;$i++)
		{	
				
			if(empty($maintenance[$i])){ continue;}
			//var_dump($maintenance[$i]);	
				$table="sousensemble";
				$nom="idEquipement";
				$idEquipement=$i;
				
				$liste=$this->modelTable->takeWhereAll($table,$nom,$idEquipement);
			
					//var_dump($liste);
					$nbrTotalSousENSEMBLE=count($liste);
					//var_dump("nbr sous ensemble total :".$nbrTotalSousENSEMBLE);
				
				$semaineArray=array();
				
			for($semaine=1;$semaine<53;$semaine++)
				{
					
					if(empty($maintenance[$i][$semaine])){ continue;}
					
				//	var_dump("semaine : ".$maintenance[$i][$semaine]);	
					//
					$semaineArray[]=$maintenance[$i][$semaine];
					$nbrDecoupe=count($semaineArray);
					
					
					
				}	
			//var_dump("nbr Decoupement :".$nbrDecoupe);
				//var_dump("semaine :" .$semaineArray);
				if($nbrTotalSousENSEMBLE==0){ var_dump("nbr Par decoupe est 0 ");	break;			}
				else
				{
						$nbrParDecoupe=floor($nbrTotalSousENSEMBLE/$nbrDecoupe);
						$nbrResteSousEnsemble=$nbrTotalSousENSEMBLE%$nbrDecoupe;
						var_dump($nbrParDecoupe);
						//et le dernier coupage doit avoir le reste 
						if($nbrResteSousEnsemble == 0){
							
							$nbrParDecoupe=$nbrParDecoupe+$nbrResteSousEnsemble;
							var_dump($nbrParDecoupe);
						}
						if($nbrParDecoupe == 0){
							$nbrParDecoupe=$nbrParDecoupe+1;
						}
					
					//var_dump("nbr Par decoupe ".$nbrParDecoupe);
					$point_Deaprt=0;	
			for($r=0;$r<$nbrDecoupe+1;$r++) {		
						
												
												 foreach($semaineArray as $semaineArrays) {
							
								$table="sousensemble";
								$id="idEquipement";
								$valeur=$idEquipement;
								$listelimit=$this->modelTable->takeRechercheLimit($table,$id,$valeur,$point_Deaprt,$nbrParDecoupe);
								
								$point_Deaprt=$point_Deaprt+$nbrParDecoupe;
								//$nbrParDecoupe+=$nbrParDecoupe;
								//var_dump($listelimit);
							/*	if(count($listelimit)<$nbrParDecoupe)
											{
												var_dump($listelimit);
													//continue;
											}
						*/
						
							/*	for($semaines=0;$semaines<$nbrDecoupe;$semaines++)
										{	*/
									
									
						 foreach($listelimit as $sousEnsemble) {
												$idSousEnsemble=$sousEnsemble['idSousEnsemble'];
													$data = array(
														'idSousEnsemble' => $idSousEnsemble,
														'semaine' => $semaineArrays,

													);
												
												
													$table="semaine";
													$this->modelCreate->create($table,$data);
												 }
										} 
										
							/*	} */
					}		
				}	
							
				}			
		
			
		$this->pageParSemaine();
	}
	public function pageListe()
	{
		/*
		$nom="fin";
		$table="viewEquipement";
		$column="idEquipement";
		$value=1;
		$nbrFin=$this->modelTable->takeColonne($nom,$table,$column,$value);
		$nom="debut";
		$table="viewEquipement";
		$column="idEquipement";
		$value=1;
		$nbrDebut=$this->modelTable->takeColonne($nom,$table,$column,$value);
		$table="SousEnsemble";
		$column="idSousEnsemble";
		$debut=$nbrDebut[0]['debut'];
		$fin=$nbrFin[0]['fin'];
		$column2="idEquipement";
		$value=1;
		$data['liste']=$this->modelTable->boucle($table,$column,$debut,$fin,$column2,$value);
		 */
		$this->load->view('Template/header');
		$this->load->view('Liste');
		$this->load->view('Template/footer');
	}
	public function insertion()
	{
				//select nbrTotalSousENSEMBLE
		$nom="idEquipement";
		$table="sousensemble";
		$colonne="idEquipement";
		$value=1;
		$nbrTotalSousENSEMBLE=$this->modelTable->takeMaxWhereID($nom,$table,$column,$value);
		
		//select nbr MAINTENANCE
		$nom="nbrMaintenance";
		$table="equipement";
		$colonne="idEquipement";
		$value=1;
		$nbrMaintenance=$this->modelTable->takeMaxWhereID($nom,$table,$column,$value);
		
		//CALCULE AFFICHE =nbrTotalSousENSEMBLE/ nbr MAINTENANCE
		$Affiche=$nbrTotalSousENSEMBLE/$nbrMaintenance;
		
		
		
		//Condition
		if(($nbrTotalSousENSEMBLE%$Affiche) !== 0)
		{
			//select semaine
			$nom="idEquipement";
			$table="equipement";
			$colonne="idEquipement";
			$value=1;
			$idEquipement=$this->modelTable->takeMaxWhereID($nom,$table,$column,$value);
			$semaine=$idEquipement;
		}
		else 
		{
			//select semaine max +1
			
		}
		
		$this->load->view('Template/header');
		$this->load->view('blank');
		$this->load->view('Template/footer');
	}
	public function bou()
	{
		
		
		
		$this->load->view('Template/header');
		$this->load->view('blank');
		$this->load->view('Template/footer');
	}
	/* mety
	public function enregistrer()
	{
		$maintenance= $this->input->post('maintenance');
		var_dump($maintenance);
		
				
				$table="sousensemble";
				$nom="idEquipement";
			
		//isany equipement =6
		for($i=1;$i<6;$i++)
		{
			for($sem=1;$sem<53;$sem++)
			{				
				
				if(empty($maintenance[$i])) {continue; }
				else {
					$idEquipement=$i;
					if(empty($maintenance[$i][$sem])) { continue; }
					else 
					{ 
						echo "equipement ".$idEquipement ." et semaines: " .$sem; 
						$data['liste']=$this->modelTable->takeWhereAll($table,$nom,$idEquipement);
							
							
						if(empty($data['liste'])){ echo "saut"; continue;}
						else {
								//var_dump($data['liste']);
								$nbrTotalSousENSEMBLE=count($data['liste']);
								var_dump( "total SousEnsemble: ".$nbrTotalSousENSEMBLE);
								$nbrDecoupe=count($maintenance[$i]);
								var_dump("total Frequence: ".$nbrDecoupe);
								$nbrParDecoupe=$nbrTotalSousENSEMBLE/$nbrDecoupe;
								if($nbrTotalSousENSEMBLE%$nbrDecoupe !==0){$nbrParDecoupe=(int)$nbrParDecoupe+1; var_dump("total ParDecoupe: ".$nbrParDecoupe);}
								else{
									var_dump("total ParDecoupe: ".$nbrParDecoupe);							
								}
								$point_Deaprt=0;
								
								while(true){
									$table="sousensemble";
									$id="idEquipement";
									$valeur=$idEquipement;
									$liste=$this->modelTable->takeRechercheLimit($table,$id,$valeur,$point_Deaprt,$nbrParDecoupe);
									$point_Deaprt+=$nbrParDecoupe;
									//var_dump($liste);
									
									
									
									if(count($liste)<$nbrParDecoupe)
									{
											break;
									}
									
									
												var_dump($liste);
											
											/*
													$idSousEnsemble=$liste[$e]['idSousEnsemble'];
													
													$data = array(
														'idSousEnsemble' => $idSousEnsemble,
														'semaine' => $sem

													);
												
												
													$table="semaine";
													$this->modelCreate->create($table,$data);
												*/
												
											
											
						/*				
								}
						}
					}
					
				}
			}				
		}
		
	}
	*/
}
