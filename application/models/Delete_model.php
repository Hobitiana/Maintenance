 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Delete_model extends CI_Model
{
	//delete
	public function delete($table,$colonne,$id)
	{
        $this->db->delete($table, array($colonne => $id));
    }
}