<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Africa/Nairobi');
class Table_model extends CI_Model {

 public function vider_table($table) 
	{		
		$this->db->empty_table($table); 
		//return "Donnees de la table supprimer avec succes.";
	}
   public function selectDistinct($table,$colonne,$order) 
	{
		$sql = "select distinct($colonne) from  " .$table. " order by ".$order  ;
		$result = $this->db->query($sql); 
		return $result =$result->result_array();
	}
    public function takeAll($table) 
	{
		$sql = "select * from  ".$table;
		$result = $this->db->query($sql); 
		$rep = array();
		while($row = $result->_fetch_assoc()){
		  $rep[] = $row;
		} 
		return $rep;
	}
	 public function takeAlls($table) 
	{
		$sql = "select * from  ".$table;
		$result = $this->db->query($sql); 
		return $result =$result->result_array();
	}
	public function takeWhereAll($table,$column,$value) 
	{
		$sql = "select * from ".$table. " where ".$column."='".$value."'";
		//var_dump($sql);
		$result = $this->db->query($sql);
		return $result =$result->result_array();
	}
	
	public function takeRechercheLimit($table,$id,$valeur,$point_Deaprt,$nbrParDecoupe)
	{ 
		$sql = "select * from ".$table. " where ".$id."=".$valeur." LIMIT ".$point_Deaprt." , ".$nbrParDecoupe." ";
		//var_dump($sql);
		$result = $this->db->query($sql);
		return $result =$result->result_array();
	}
	public function boucle($table,$column,$debut,$fin,$column2,$value) 
	{ 
		$sql = "select * from ".$table. " where ".$column." BETWEEN ".$debut." and ".$fin." and ".$column2."='".$value."'";
		$result = $this->db->query($sql);
		return $result =$result->result_array();
	}
	public function takeColonne($nom,$table,$column,$value) 
	{
		$sql = "select $nom from ".$table. " where ".$column."='".$value."'";
		$result = $this->db->query($sql);
		return $result =$result->result_array();
	}
	public function countNombre($table) 
	{
		$sql = "select count(*) as nb from ".$table;
		$result = $this->db->query($sql);
		$row = $result->_fetch_assoc();
		return $row['nb'];
	}
	public function takeWhere($table,$column,$value) 
	{
		$sql = "select * from ".$table. " where ".$column."='".$value."'";
		$result = $this->db->query($sql);
		return $result =$result->result();
	}
	public function takeWhereTwo($table,$column,$value,$column2,$value2) 
	{
		$sql = "select * from ".$table. " where ".$column."='".$value."' && ".$column2."='".$value2."' ";
		$result = $this->db->query($sql);
		return $result =$result->result();
	}
	public function takeWhereTwoID($id,$table,$column,$value,$column2,$value2) 
	{
		$sql = "select $id from ".$table. " where ".$column."='".$value."' && ".$column2."='".$value2."' ";
		$result = $this->db->query($sql);
		// var_dump($sql);
		return $result =$result->result_array();
		
	}
	/*
	public function takeWhereDeuxID($id,$table,$column,$value,$column2,$value2) 
	{
		$sql = "select $id from ".$table. " where ".$column."='".$value."' && ".$column2."='".$value2."' ";
		$result = $this->db->query($sql);
		// var_dump($sql);
		$results =$result->result_array();
		 // $row=array();
		foreach($results as $row){
			return $row; //une seule resultat
		}
		
	} */
	public function takeWhereMax($idMax,$table,$column,$value) 
	{
		$sql = "select MAX($idMax) as maxi from ".$table. " where ".$column."='".$value."'";
		$result = $this->db->query($sql);
		$results =$result->result_array();
		foreach($results as $row){
			return $row['maxi'];
		}
		// return  $row['maxi'];
	}
	public function getSomme($column,$table) 
	{
		$sql = "select sum(".$column.") as nb from ".$table;
		$result = $this->db->query($sql);
		$row = $result->result_array();
		return $row;
	}
	
	public function getSommeDeux($column,$column2,$table) 
	{
		$sql = "select sum(".$column.") as ".$column." ,sum(".$column2.") as ".$column2." from ".$table;
		$result = $this->db->query($sql);
		$row=$result->result_array();
		return $row;
	}
	
	
	//FILTRE
	public function getMoisDistinct($dateDistinct,$table) 
	{
		$sql = "select DISTINCT MONTH(".$dateDistinct.") as mois from ".$table;
		$result = $this->db->query($sql);
		return  $result->result_array();
	}
	public function getAnneeDistinct($dateDistinct,$table) 
	{
		$sql = "select DISTINCT YEAR(".$dateDistinct.") as annee from ".$table;
		$result = $this->db->query($sql);
		return  $result->result_array();
	}
	
	
	public function getSommeWhere($column,$table,$condi,$valeur) 
	{
		$sql = "select sum(".$column.") as nb from ".$table ." where ".$condi ."='".$valeur."'";
		$result = $this->db->query($sql);
		$row = $result->_fetch_assoc();
		return $row['nb'];
	}
	public function update($table,$colonne,$valeur,$condi,$val,$f,$e) 
	{
		$sql = "update ". $table. " set ".$colonne ."=".$valeur ." where ". $condi."='".$val."' and ".$f."='".$e."'";
	    $this->db->query($sql);
	}
	
	public function supprimeUpdate($table,$status,$valeur,$condi,$val) 
	{
		$sql = "update ". $table. " set ".$status ."='".$valeur ."' where ". $condi."='".$val."'";
	    $this->db->query($sql);
	}
	public function updateOne($table,$colonne,$valeur,$condi,$val) 
	{
		$sql = "update ". $table. " set ".$colonne ."=".$valeur ." where ". $condi."='".$val."' ";
	    $this->db->query($sql);
	}
	
	public function create($table,$data) 
	{
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	public function get_id($table,$colonne,$id) 
	{
		$query= $this->db->get_where($table,array($colonne => $id));
		return $query->row();
	}
	
	public function getUNColonne($colonne,$table) 
	{
		$sql = "select $colonne from ". $table;
		$result = $this->db->query($sql);
		// $row = $result->result_array();
		// return $row;
		$result = $this->db->query($sql);
		return $result =$result->result();
	}
	public function updateArray($table,$colonne,$id,$data) 
	{
		 $this->db->where($colonne,$id);
		$this->db->update($table,$data);
	}
	
	public function supprUpdate($table,$colonne,$id,$data) 
	{
		 $this->db->where($colonne,$id);
		$this->db->update($table,$data);
	}
	public function suppr($table,$colonne,$id) 
	{
		 $this->db->where($colonne,$id);
		$this->db->delete($table);
	}
	//pagination
	public function countRows($table,$colonne,$value) 
	{
		$sql = "select COUNT(*) as count from ".$table ." where ".$colonne ." = '" . $value . "'";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->count;
	}
	public function getEventsPagination($table,$colonne,$value,$limit,$offset) 
	{
		$sql = "select * from " . $table ." where " . $colonne . " = '" . $value . "' LIMIT ". $limit . " OFFSET " . $offset;
		$result = $this->db->query($sql);
		return $result->result();
	}
	public function get_currznt_page_records($limit ,$start)
	{
		//select tout les Trajet
		$this->db->limit($limit ,$start,$table);
		
		$query=$this->db->get($table);
		if($query ->num_rows() >0){
			foreach($query->result() as $row)
			{
				$data[]=$row;
				// $portion[$i]['idRoute']=$row['idRoute'];
				//var_dump($data);
			}
			
			return $data;
		}
		return faux;
	}
	public function getCountTotal($table)
	{	
			return $this ->db->count_all($table);
	}
	//PAGINATION
	public function countElements($table)
	{
		$query=$this->db->get($table);
			return $query->num_rows();
	}
	public function getElements($limit,$offset,$table)
	{
		$this->db->limit($limit ,$offset);
		$query=$this->db->get($table);
			return $query->result();
	}
	//RECHERCHE
	public function searchElement($keyword,$category,$table,$motTaper,$motRecherche)
	{
		$this->db->select('*');
		$this->db->from($table);
		
		if(!empty($keyword))
		{
			$this->db->like($motTaper,$keyword);
		}
		if(!empty($category))
		{
			$this->db->where($motRecherche,$category);
		}
		
		$query= $this->db->get();
		return $query->result();
	}
	//PDF
	 function fetch_data($table,$id)
    {
        $this->db->order_by($id, "DESC");
        $query = $this->db->get($table); 
        return $query->result();
    }
	
	public function createPdf($data) {
        try{
            $this->load->library('MyPdf',$data);
            $this->mypdf->Output();
        }catch(Exception $e){
            throw new Exception('Misy diso');
        }
    }
	
	public function actepatientpdf_par_id($table) 
	{
		$this->load->database();
		$query=$this->db->select('*')
				->get($table);
				return $query->result();
	}	
	/*
public function actepatientpdf_par_id()
{
    $data=$this->db
         ->select('*')
         ->from('d_facture')
         ->get()
         ->row();
         return $data;
} */
	
}
