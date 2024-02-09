 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Update_model extends CI_Model
{
	//update
	 public function update($table,$colonne,$id, $data) {
        $this->db->where($colonne, $id);
        $this->db->update($table, $data);
    }
}