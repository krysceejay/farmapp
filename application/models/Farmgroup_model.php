<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Farmgroup_model extends MY_Model{
    protected $_table = 'farm_group';
    protected $primary_key = 'group_id';
    protected $return_type = 'array';

	    public function search_farmgroup($search){
      if(empty($search)){
        return false;
      }
      $this->db->like('group_name', $search);
      $query = $this->db->get('farm_group');
      return $query->result_array();

    }
	
          public function  add_farmgroup(){
            $data = array(
            'group_name' => $this->input->post('gname')

            );
             $this->db->insert('farm_group', $data);


        }

        public function  get_farm_group($id = FALSE, $limit = FALSE, $offset = FALSE){
          $userid = $this->session->userdata('user_id');

          if($limit) {
           $this->db->limit($limit, $offset);
       }

            if($id === FALSE){

                   $this->db->order_by('group_id','DESC');

                  $query = $this->db->get('farm_group');
                  return $query->result_array();
              }
              else{

                return false;
          
              }



  }
}
