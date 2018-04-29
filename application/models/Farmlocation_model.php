<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Farmlocation_model extends MY_Model{
    protected $_table = 'farm_location';
    protected $primary_key = 'location_id';
    protected $return_type = 'array';
	
	
              public function  add_farmlocation(){
                $data = array(
                'location' => $this->input->post('location_name')

                );
                 $this->db->insert('farm_location', $data);


            }

            public function  get_farm_location($id = FALSE, $limit = FALSE, $offset = FALSE){
              $userid = $this->session->userdata('user_id');

              if($limit) {
               $this->db->limit($limit, $offset);
           }

                if($id === FALSE){

                       $this->db->order_by('location_id','DESC');

                      $query = $this->db->get('farm_location');
                      return $query->result_array();
                  }
                  else{

                    return false;
                
                  }



      }

}
