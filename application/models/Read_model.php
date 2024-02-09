 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Read_model extends CI_Model
{
	//get
	
	//RAHA LIGNE RAY NO ALAINA DIA $query->row_array();
	public function get_IDRow($table,$colonne,$id)
	{
        $query = $this->db->get_where($table, array($colonne=> $id));
        return $query->row_array();
    } 
	public function get_ID($table,$colonne,$id) {
        $query = $this->db->get_where($table, array($colonne=> $id));
        return $query->result_array();
    }
	 public function get_all($table) {
        $query = $this->db->get($table);
        return $query->result_array();
    }
	
}