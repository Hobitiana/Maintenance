 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Create_model extends CI_Model
{
	//create
    public function create($table,$data) {
        $this->db->insert($table, $data);
    }
}