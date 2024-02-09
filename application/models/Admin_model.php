<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
		$this->load->Model('Table_model');
    }
	
	//SUPPRIMER DELETE
	 public function delete() {
		$param=$this->input->get_post('id');
		$sql = "update categorie set status = 'expired' where id='".$param."'";
		$result = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            echo'<p class="alert alert-success alert-dismissible" 
			role="alert"><button type="button" class="close" data-dismiss="alert" 
			aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Felicitations ! </strong>suppression reussi</p>';
        } else {
            echo'<p class="alert alert-danger alert-dismissible" 
			role="alert"><button type="button" class="close" data-dismiss="alert" 
			aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Desolé! </strong>erreur interne.</p>';
        }
        exit; 
	}
	public function deleteArtiste($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idArtiste='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function deleteLogistique($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idLogistique='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function deleteSono($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idSono='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function deleteDepense($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idDepense='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function deleteIDReference($table,$id,$idNom) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where $idNom='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
//SUPPRIMER DELETE II
	
public function deleteLieu($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idLieu='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}
public function deleteCom($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idCom='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}	
public function deleteTrasnsport($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idTransport='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}	
	
public function deleteSponsort($table,$id) {
		//$param=$this->input->get_post('id');
		$sql = "update $table set status = 'desactive' where idSponsort='".$id."'";
		$result = $this->db->query($sql);
		return $result;
	}	
	//AJOUT INSERT
	public function ajout($dat,$a,$data)
	{
		$sql = "insert into heureSupplementaire(idPointage,idHeureSup,heure,montant) values(%s,%s,%s,0)";
		$sql = sprintf($sql,
			$this->db->escape($dat),
			$this->db->escape($a),
			$this->db->escape($data));
		$this->db->query($sql);
	}
		public function ajoutUneColonne($table,$colonne,$nom)
	{
		
			$sql="insert into $table ($colonne ,status) values ('".$nom."','actif')";	
			 // var_dump($sql);
			$this->db->query($sql);
	}
	public function ajoutDeuxColonne($table,$colonne,$colonne2,$nom,$nom2)
	{
		
			$sql="insert into $table ($colonne,$colonne2,status) values ('".$nom."','".$nom2."','actif')";	
			 // var_dump($sql);
			$this->db->query($sql);
	}
	
	public function ajoutTroisColonne($table,$colonne,$colonne2,$colonne3,$idLaptop,$quantite,$date)
	{
		
			$sql="insert into $table ($colonne,$colonne2,$colonne3,status) values ('".$idLaptop."','".$quantite."','".$date."','actif')";	
			 // var_dump($sql);
			$this->db->query($sql);
	}
	public function ajoutQuatreColonne($table,$colonne,$colonne2,$colonne3,$colonne4,$valeur,$valeur2,$valeur3,$valeur4)
	{
		
			$sql="insert into $table ($colonne,$colonne2,$colonne3,$colonne4,status) values ('".$valeur."','".$valeur2."','".$valeur3."','".$valeur4."','actif')";	
			 // var_dump($sql);
			$this->db->query($sql);
	}
	public function ajoutLapt($Marque,$Reference,$Processeur,$Ram,$Ecran,$DisqueDur,$prixA,$prixV)
	{
			
			$sql="insert into laptop (status,idMarque ,idReference ,idProcesseur ,Ram  ,Ecran ,DisqueDur,prixAchat,prixVente)
			select 'actif',m.idMarque,r.idReference,p.idProcesseur,".$Ram.",".$Ecran.",".$DisqueDur.",".$prixA.",".$prixV."
			FROM marque m,reference r,processeur p
			WHERE m.nom='".$Marque."' AND r.nom='".$Reference."' AND p.nom='".$Processeur."'"; 
			 // var_dump($sql);
			 $this->db->query($sql);
	}
	//UPDATE MODIFIER
	public function MODIFIER($dat,$a,$data)
	{
		$sql = "update pointage set heureFerie=%s,heureNormal=%s where id=%s";

			$sql = sprintf($sql,
					$this->db->escape($data['hjf']),
					$this->db->escape($data['hn']),
					$this->db->escape($data['id']));
										
			$this->db->query($sql);
	}	
	//Modif
	public function modifArtiste($id,$nom,$autre)
	{
		$sql = "update Artiste set nom=%s,tarifParHeure=%s where idArtiste=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}
	public function modifSono($id,$nom,$autre)
	{
		$sql = "update Sonorisation s
		join typeEvent t on t.idType=s.idType
		set t.nom=%s,s.tarifParHeure=%s where idSono=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}
	public function modifLogistique($id,$nom,$autre)
	{
		$sql = "update logistique l 
		join typeEvent t on t.idType=l.idType
		set nom=%s,tarifParJour=%s where idLogistique=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}
	public function modifDepense($id,$idSponsort,$idTransport,$idCom,$idLieu)
	{
		$sql = "update Depenses set idSponsort=%s,idTransport=%s,idCom=%s,idLieu=%s where idDepense=%s";
	 $sql=sprintf($sql,$this->db->escape($idSponsort),$this->db->escape($idTransport),$this->db->escape($idCom),$this->db->escape($idLieu),$this->db->escape($id)); 								
		
		// var_dump($sql);
		$this->db->query($sql);
	}
	public function modifLaptop($idLaptop,$Marque,$Reference,$Processeur,$Ram,$Ecran,$DisqueDur)
	{
		
		$sql="
		update laptop l
		JOIN  marque m ON l.idMarque=m.idMarque
		JOIN  reference r ON l.idReference=r.idReference
		JOIN  processeur p ON l.idProcesseur=p.idProcesseur
		set l.idlaptop=%s,m.nom=%s,r.nom=%s,p.nom=%s,l.Ram=%s,l.Ecran=%s,l.DisqueDur=%s
		WHERE l.idLaptop=%s";
         $sql=sprintf($sql,$this->db->escape($idLaptop),$this->db->escape($Marque),$this->db->escape($Reference),$this->db->escape($Processeur),$this->db->escape($Ram),$this->db->escape($Ecran),$this->db->escape($DisqueDur),$this->db->escape($idLaptop)); 
        
		// var_dump($sql);
		$query= $this->db->query($sql);
	} 
	
	//UPDATE MODIFIER II
	
public function modifLieu($id,$endroit,$autre,$autre2)
	{
		$sql = "update Lieu set Endroit=%s,nombreDePlace=%s ,prix=%s  where idLieu=%s";
	 $sql=sprintf($sql,$this->db->escape($endroit),$this->db->escape($autre),$this->db->escape($autre2),$this->db->escape($id)); 								
		$this->db->query($sql);
	}
	
public function modifCom($id,$nom,$autre)
	{
		$sql = "update Communication set nom=%s,prix=%s where idCom=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}	
	
public function modifTrasnport($id,$nom,$autre)
	{
		$sql = "update Transport set moyenDeTransport=%s,prix=%s where idTransport=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}	
	
public function modifSponsort($id,$nom,$autre)
	{
		$sql = "update Sponsoring set nom=%s,prix=%s where idSponsort=%s";
	 $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($autre),$this->db->escape($id)); 								
		$this->db->query($sql);
	}

	//SELECT GET
	public function getP($id) 
	{
		$sql = "select * from pointage where id =%s ";
		$sql = sprintf($sql,$this->db->escape($id));
		$result = $this->db->query($sql);
		$row = $result->_fetch_assoc();
		return $row;
	}	
	public function get_Produit()
	{
		$this->db->select('*');
		$this->db->from('D_produit');
		$query=$this->db->get();
		return $result =$query->result();
	}
	public function get($table,$status) 
	{
		$this->load->database();
		$query=$this->db->select('*')
				->where(['status' => $status])
				->get($table);
				return $query->result();
	}	
public function getSansStat($table) 
	{
		$this->load->database();
		$query=$this->db->select('*')
				->get($table);
				return $query->result();
	}	
	public function getID($table,$id) 
	{
		$this->load->database();
		$query=$this->db->select('*')
				->where(['idLaptop' => $id])
				->get($table);
				return $query->result();
	}	
	
	public function getIDReference($table,$id,$nom) 
	{
		$this->load->database();
		$query=$this->db->select('*')
				->where([$nom => $id])
				->get($table);
				return $query->result();
	}
	/*public function getEndroit($table,$id,$nom) 
	{
		$this->load->database();
		$query=$this->db->select('idEndroit')
				->where([$nom => $id])
				->get($table);
				return $query->result();
	} */
	public function getIDEndroit($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT idEndroit FROM $table WHERE nom = '$id'");
		return $result =$query->result();
	}
	
	public function getIDS($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT idSponsort FROM $table WHERE nom = '$id'");
		return $result =$query->result();
	}
	
	public function getIDT($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT idTransport FROM $table WHERE moyenDeTransport = '$id'");
		return $result =$query->result();
	}
	
	public function getIDCom($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT idCom FROM $table WHERE nom = '$id'");
		return $result =$query->result();
	}
	
	public function getIDLieu($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT idLieu FROM $table WHERE nom = '$id'");
		return $result =$query->result();
	}
	public function getEndroit($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT nom FROM $table WHERE idEndroit = '$id'");
		return $result =$query->result();
	}
	
	public function getS($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT nom FROM $table WHERE idSponsort = '$id'");
		return $result =$query->result();
	}
	
	public function getT($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT moyenDeTransport FROM $table WHERE idTransport = '$id'");
		return $result =$query->result();
	}
	
	public function getCom($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT nom FROM $table WHERE idCom = '$id'");
		return $result =$query->result();
	}
	
	public function getLieu($table,$id) 
	{
		$this->db->cache_off();
		$query = $this->db->query("SELECT nom FROM $table WHERE idLieu = '$id'");
		return $result =$query->result();
	}
	/*
	public function getEndroit($table,$id) 
	{
		$sql = "select idEndroit from  $table where idEndroit =%s ";
		$sql = sprintf($sql,$this->db->escape($table),$this->db->escape($id));
		$result = $this->db->query($sql);
		$row = $result->_fetch_assoc();
		return $row;
	}	*/
	//PAGINATION
	
	public function count_data() 
	{
				return $this->db->count_all('marque');
	}	
	public function get_data($limit,$offset) 
	{
				 $this->db->limit($limit,$offset);
				 $query =  $this->db->get('marque');
				/* $query=$this->db->select('*')
							->where(['status' => $status])
							->get('marque'); */
				 return  $query -> result();
	}

//////////UPLOAD///////////
	function checkProduit($DateEnregistrer){
            $sql="select * from  typeActes where dateAjout='$DateEnregistrer';";
            $query= $this->db->query($sql);
            return $query->row_array();
        }
		function import_csv($file_path){
            $file=fopen($file_path,'r');
			while(($line=fgetcsv(file)) !== FALSE){
				$data=array(
					'date'=>$line[0],
					'montant'=>$line[1]
					);
					$this->db->insert('typeActes',$data);
			}
				fclose($file);
        }
	function checkDate($date,$id){
            $sql="select * from  typeActes where idActes='$id';";
            $query= $this->db->query($sql);
            return $query->row_array();
        }
			
}
