<?php
    class Crops_model extends CI_Model{
       public function __construct(){
           $this->load->database();
        }

      public function  get_crops(){


                $this->db->order_by('crop_id');
                $query = $this->db->get('crops');
                return $query->result_array();
      }

      public function search_crops($crop){
        if(empty($crop)){
          return false;
        }
        $this->db->like('crop_name', trim($crop));
        $query = $this->db->get('crops');
        return $query->result_array();

      }

      public function check_cropname_exists($cropname) {
        if($cropname !== ""){
          $query = $this->db->get_where('crops', array('crop_name' => $cropname));
          if (empty($query->row_array())) {
              return $this->db->insert('crops', array('crop_name' => $cropname));
          } else {
              return false;
          }
        }else {
            return false;
        }
      }

        public function get_crop($id){
        $query = $this->db->get_where('crops' , array('crop_id'=> $id )  );
     return $query->row();
       }
    }
