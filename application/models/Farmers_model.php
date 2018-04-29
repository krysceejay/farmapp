<?php
    class Farmers_model extends CI_Model{
       public function __construct(){
           $this->load->database();
        }

        public function add_farmer($post_image){
          $prev_training = $this->input->post('training');
          if($prev_training == NULL){
            $prev_training = 0 ;
          }

        $data = array(
        'fname' => $this->input->post('fname') ,
        'sname' => $this->input->post('sname') ,
        'user_add_id'=> $this->session->userdata('user_id'),
        'dob' => $this->input->post('dob') ,
        'gender' => $this->input->post('gender') ,
        'phone' => $this->input->post('phone'),
        'marital_status' => $this->input->post('status'),
        'number_of_dependants' => $this->input->post('num_of_dep'),
        'crop_proficiency' => $this->input->post('crop_prof'),
        'farm_group_id' => $this->input->post('farm_group'),
        'farm_location_id' => $this->input->post('location'),
        'state_id' => $this->input->post('states'),
        'local_id' => $this->input->post('lga'),
        'bank_id' => $this->input->post('bankname'),
        'acct_number' => $this->input->post('acct_number') ,
        'add_labour' => $this->input->post('labour') ,
        'land_area_farmed' => $this->input->post('landarea'),
        'pro_image' => $post_image,
        'years_of_experience' => $this->input->post('yr_of_exp'),
        'income_range' => $this->input->post('income'),
        'previous_training' => $prev_training,
        'comment' => $this->input->post('comment')

        );
         $this->db->insert('farmers', $data);

        $crop_prop = $this->input->post('crop_prof');
        $explodeinput = explode(",", $crop_prop);

        foreach ($explodeinput as $key => $cropname) {
          $this->crops_model->check_cropname_exists($cropname);
        }

        }

        public function  updatefarmer($post_image){
          $farmerid = $this->input->post('famid');

        $data = array(
        'fname' => $this->input->post('fname') ,
        'sname' => $this->input->post('sname') ,
        'user_add_id'=> $this->session->userdata('user_id'),
        'dob' => $this->input->post('dob') ,
        'gender' => $this->input->post('gender') ,
        'phone' => $this->input->post('phone'),
        'marital_status' => $this->input->post('status'),
        'number_of_dependants' => $this->input->post('num_of_dep'),
        'crop_proficiency' => $this->input->post('crop_prof'),
        'farm_group_id' => $this->input->post('farm_group'),
        'farm_location_id' => $this->input->post('location'),
        'state_id' => $this->input->post('states'),
        'local_id' => $this->input->post('lga'),
        'bank_id' => $this->input->post('bankname'),
        'acct_number' => $this->input->post('acct_number') ,
        'add_labour' => $this->input->post('labour') ,
        'land_area_farmed' => $this->input->post('landarea'),
        'pro_image' => $post_image,
        'years_of_experience' => $this->input->post('yr_of_exp'),
        'income_range' => $this->input->post('income'),
        'previous_training' => $this->input->post('training') ,
        'comment' => $this->input->post('comment')
  );
        $this->db->where('id', $farmerid);
        return $this->db->update('farmers', $data);



        }
        
        
        public function  get_farmers_by_group($id , $limit = FALSE, $offset = FALSE){
  $userid = $this->session->userdata('user_id');

  if($limit) {
   $this->db->limit($limit, $offset);
}

        $this->db->join('states','states.state_id = farmers.state_id');
        $this->db->join('farm_location','farm_location.location_id = farmers.farm_location_id');
        $this->db->join('locals','locals.local_id = farmers.local_id');
        $this->db->join('banks','banks.bank_id = farmers.bank_id');
        $this->db->join('farm_group','farm_group.group_id = farmers.farm_group_id');
        $this->db->join('users','users.user_id = farmers.user_add_id');
        $query = $this->db->get_where('farmers' , array('farm_group_id'=> $id )  );
        return $query->result_array();




}



      public function  get_farmers($id = FALSE, $limit = FALSE, $offset = FALSE){
        $userid = $this->session->userdata('user_id');

        if($limit) {
         $this->db->limit($limit, $offset);
     }

          if($id === FALSE){

                 $this->db->order_by('id','DESC');
                $this->db->join('users','users.user_id = farmers.user_add_id');
                $query = $this->db->get('farmers');
                return $query->result_array();
            }
            else{
              $this->db->join('states','states.state_id = farmers.state_id');
              $this->db->join('farm_location','farm_location.location_id = farmers.farm_location_id');
              $this->db->join('locals','locals.local_id = farmers.local_id');
              $this->db->join('banks','banks.bank_id = farmers.bank_id');
              $this->db->join('farm_group','farm_group.group_id = farmers.farm_group_id');
              $this->db->join('users','users.user_id = farmers.user_add_id');
              $query = $this->db->get_where('farmers' , array('id'=> $id )  );
              return $query->row_array();
            }



}


    //   public function  get_sponsors(){

    //         //   $query = $this->db->get('staging_fc_investments');
    //         //   return $query->result_array();

    //           $this->db->select('initiated_by_user_id');
    //           //$this->db->where('gateway_status', $email);
    //           $this->db->group_by('initiated_by_user_id');
    //           $this->db->from('staging_fc_transfers');

    //           return $this->db->get()->result();


    // }

    // public function get_farm_followers(){


    //           $this->db->select('user_id');
    //           //$this->db->where('gateway_status', $email);
    //           $this->db->group_by('user_id');
    //           $this->db->from('staging_fc_farm_followers');

    //           return $this->db->get()->result();


    // }

    //     public function get_category($id){
    //     $query = $this->db->get_where('category' , array('cat_id'=> $id )  );
    //  return $query->row();
    //    }
    }
