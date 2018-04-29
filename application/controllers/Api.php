<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller{
   public function __construct(){
       parent::__construct();

    }

    public function farmgroup_get(){

      $groupid = $this->uri->segment(3);
if($groupid){
      $farmgroup = $this->farmgroup_model->get_by(array('group_id'=>$groupid));
      if(isset($farmgroup['group_id'])){
        $this->response(array('status'=>'success', 'message'=> $farmgroup));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Farm Group could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $farmgroup = $this->farmgroup_model->get_all();
      if(isset($farmgroup)){
        $this->response(array('status'=>'success', 'message'=> $farmgroup));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Farm Group List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }
    
    
      public function farmGroupSearch_get(){

      $search = $this->uri->segment(3);
if($search){
      $farmgroup = $this->farmgroup_model->search_farmgroup($search);
      if(!empty($farmgroup)){
        $this->response(array('status'=>'success', 'message'=> $farmgroup));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Farm Group could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $this->response(array('status'=>'failure', 'message'=> 'Invalid request, please type a location'), REST_Controller::HTTP_NOT_FOUND);

    }
    }
    

    public function farmgroup_post(){
      $this->form_validation->set_rules('group_name', 'Group Name', 'required');
      if ($this->form_validation->run() === FALSE) {
        $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

      }else{
        $farmgroup = $this->post();
        $groupid = $this->farmgroup_model->insert($farmgroup);
        if(!$groupid){
          $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to create farm group'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }else{
          $this->response(array('status'=>'success', 'message'=> 'farmgroup created'));
        }
      }

    }

    public function banks_get(){

      $bankid = $this->uri->segment(3);
if($bankid){
      $banks = $this->banks_model->get_by(array('bank_id'=>$bankid));
      if(isset($banks['bank_id'])){
        $this->response(array('status'=>'success', 'message'=> $banks));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Bank could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $banks = $this->banks_model->get_all();
      if(isset($banks)){
        $this->response(array('status'=>'success', 'message'=> $banks));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Bank List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }

    public function farmlocation_get(){

      $locationid = $this->uri->segment(3);
    if($locationid){
      $location = $this->farmlocation_model->get_by(array('location_id'=>$locationid));
      if(isset($location['location_id'])){
        $this->response(array('status'=>'success', 'message'=> $location));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Location could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $location = $this->farmlocation_model->get_all();
      if(isset($location)){
        $this->response(array('status'=>'success', 'message'=> $location));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Location List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }
    
        public function inputs_get(){

      $inputid = $this->uri->segment(3);
if($inputid){
      $inputs = $this->input_model->get_by(array('input_id'=>$inputid));
      if(isset($inputs['input_id'])){
        $this->response(array('status'=>'success', 'message'=> $inputs));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Input could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $inputs = $this->input_model->get_all();
      if(isset($inputs)){
        $this->response(array('status'=>'success', 'message'=> $inputs));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Input List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }


        public function input_post(){
          $this->form_validation->set_rules('user_id', 'User Id is required', 'required');
          $this->form_validation->set_rules('crop_id', 'Crop Id is required', 'required');
          $this->form_validation->set_rules('input_name', 'Input Name is required', 'required');
          $this->form_validation->set_rules('input_quantity', 'Input Quantity is required', 'required');
          $this->form_validation->set_rules('input_unit', 'Input unit is required', 'required');

          if ($this->form_validation->run() === FALSE) {
            $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

          }else{
            $farm_input = $this->post();
            $inputid = $this->input_model->insert($farm_input);
            if(!$inputid){
              $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to add farm input'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }else{
              $this->response(array('status'=>'success', 'message'=> 'farm input added'));
            }
          }

        }

    public function farmlocation_post(){
      $this->form_validation->set_rules('location', 'Location Name', 'required');
      if ($this->form_validation->run() === FALSE) {
        $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

      }else{
        $farmlocation = $this->post();
        $locationid = $this->farmlocation_model->insert($farmlocation);
        if(!$locationid){
          $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to create farm location'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }else{
          $this->response(array('status'=>'success', 'message'=> 'farm location created'));
        }
      }

    }

    public function localgovt_get(){

      $localid = $this->uri->segment(3);
    if($localid){
      $localgovt = $this->localgovt_model->get_by(array('local_id'=>$localid));
      if(isset($localgovt['local_id'])){
        $this->response(array('status'=>'success', 'message'=> $localgovt));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Local Government could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $localgovt = $this->localgovt_model->get_all();
      if(isset($localgovt)){
        $this->response(array('status'=>'success', 'message'=> $localgovt));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The Local Government List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }

    public function states_get(){

      $stateid = $this->uri->segment(3);
    if($stateid){
      $state = $this->states_model->get_by(array('state_id'=>$stateid));
      if(isset($state['state_id'])){
        $this->response(array('status'=>'success', 'message'=> $state));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The State could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }
    }else{
      $state = $this->states_model->get_all();
      if(isset($state)){
        $this->response(array('status'=>'success', 'message'=> $state));
      }else{
        $this->response(array('status'=>'failure', 'message'=> 'The State List could not be found'), REST_Controller::HTTP_NOT_FOUND);
      }

    }
    }


        public function crops_get(){

          $cropid = $this->uri->segment(3);
        if($cropid){
          $crop = $this->crops_model->get_crop($cropid);
          if(isset($crop)){
            $this->response(array('status'=>'success', 'message'=> $crop));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Crop could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }
        }else{
          $crops = $this->crops_model->get_crops();
          if(isset($crops)){
            $this->response(array('status'=>'success', 'message'=> $crops));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Crop List could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }

        }
        }

        public function farmers_get(){

          $farmerid = $this->uri->segment(3);
        if($farmerid){
          $farmer = $this->farmers_model->get_farmers($farmerid);
          if(isset($farmer)){
            $this->response(array('status'=>'success', 'message'=> $farmer));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Farmer could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }
        }else{
          $farmer = $this->farmers_model->get_farmers();
          if(isset($farmer)){
            $this->response(array('status'=>'success', 'message'=> $farmer));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Farmer List could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }

        }
        }
        
          public function farmersByGroup_get(){

          $groupid = $this->uri->segment(3);
        if($groupid){
          $farmer = $this->farmers_model->get_farmers_by_group($groupid);
          if(!empty($farmer)){
            $this->response(array('status'=>'success', 'message'=> $farmer));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Farmer List could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }
        }else{
          $this->response(array('status'=>'failure', 'message'=> 'Invalid request, please type a group id'), REST_Controller::HTTP_NOT_FOUND);

        }
        }

        public function farmers_post(){
          //$data = remove_unknown_fields($this->post(), $this->my_form_validation->get_field_names('farmers_post'));
          $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
          $this->form_validation->set_rules('sname', 'Last Name', 'required|trim');
          $this->form_validation->set_rules('dob', 'Date of birth', 'required|trim');
          $this->form_validation->set_rules('user_add_id', 'Id of the User', 'required|integer|trim');
          $this->form_validation->set_rules('state_id', 'State Id', 'required|integer|trim');
          $this->form_validation->set_rules('local_id', 'Local Government Id', 'required|integer|trim');
          $this->form_validation->set_rules('farm_group_id', 'Farm Group Id', 'required|integer|trim');
          $this->form_validation->set_rules('farm_location_id', 'Farm Location Id', 'required|integer|trim');
          $this->form_validation->set_rules('bank_id', 'Bank Id', 'required|integer|trim');
          $this->form_validation->set_rules('gender', 'Gender', 'required');
          $this->form_validation->set_rules('phone', 'Phone Number', 'integer|trim');
          $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
          $this->form_validation->set_rules('number_of_dependants', 'Marital Status', 'integer');
          $this->form_validation->set_rules('add_labour', 'Additional Labour', 'integer');
          $this->form_validation->set_rules('crop_proficiency', 'Crop Proficiency', 'required');
          $this->form_validation->set_rules('acct_number', 'Account Number', 'integer');
          $this->form_validation->set_rules('land_area_farmed', 'Land Area Farmed', 'integer');
          $this->form_validation->set_rules('years_of_experience', 'Years Of Experience', 'integer');
          $this->form_validation->set_rules('income_range', 'Income Range', 'required');
          $this->form_validation->set_rules('previous_training', 'Previous Training', 'integer');
          //$this->form_validation->set_rules('comment', 'Comment', 'integer');


          if ($this->form_validation->run() === FALSE) {
            $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

          }else{
            $farmer = $this->post();
            $farmerid = $this->api_farmer_model->insert($farmer);

            if(!$farmerid){
              $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to add farmer'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }else{
              $this->response(array('status'=>'success', 'message'=> 'farmer added'));
            }
          }

        }

        public function user_get(){

          $userid = $this->uri->segment(3);
        if($userid){
          $user = $this->api_user_model->get_by(array('user_id'=>$userid));
          if(isset($user['user_id'])){
            $this->response(array('status'=>'success', 'message'=> $user));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The User could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }
        }else{
          $user = $this->api_user_model->get_all();
          if(isset($user)){
            $this->response(array('status'=>'success', 'message'=> $user));
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Users List could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }

        }
        }

        public function user_post(){

          $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
          $this->form_validation->set_rules('surname', 'Last Name', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
          $this->form_validation->set_rules('password', 'Password', 'required|trim');



          if ($this->form_validation->run() === FALSE) {
            $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

          }else{
            $email_exist = $this->api_user_model->get_by(array('email'=> $this->post('email')));

            if($email_exist){
              $this->response(array('status'=>'failure', 'message'=> 'The specified email address already exist'), REST_Controller::HTTP_CONFLICT);
            }
            $user = $this->post();
            $userid = $this->api_user_model->insert($user);

            if(!$userid){
              $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to create user'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }else{
              $this->response(array('status'=>'success', 'message'=> 'user added'));
            }
          }

        }
        
               public function userlogin_post(){

                  $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                  $this->form_validation->set_rules('password', 'Password', 'required|trim');

                  if ($this->form_validation->run() === FALSE) {
                    $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

                  }else{
                    $email_exist = $this->api_user_model->get_by(array('email'=> $this->post('email')));
                    $password_exist = $this->api_user_model->get_by(array('password'=> md5($this->post('password'))));

                    if($email_exist && $password_exist){
                      $user_id = $email_exist['user_id'];
                      $this->response(array('status'=>'success', 'message'=> $user_id));
                    }else{
                      $this->response(array('status'=>'failure', 'message'=> 'Invalid login, please check your email and password'), REST_Controller::HTTP_NOT_FOUND);
                    }

                  }

                }

        public function updatefarmer_post(){

          $farmerid = $this->uri->segment(3);

          $farmer = $this->api_farmer_model->get_by(array('id'=> $farmerid));

          if(isset($farmer)){
            $this->form_validation->set_rules('fname', 'First Name', 'trim');
            $this->form_validation->set_rules('sname', 'Last Name', 'trim');
            $this->form_validation->set_rules('dob', 'Date of birth', 'trim');
            $this->form_validation->set_rules('user_add_id', 'Id of the User', 'integer|trim');
            $this->form_validation->set_rules('state_id', 'State Id', 'integer|trim');
            $this->form_validation->set_rules('local_id', 'Local Government Id', 'integer|trim');
            $this->form_validation->set_rules('farm_group_id', 'Farm Group Id', 'integer|trim');
            $this->form_validation->set_rules('farm_location_id', 'Farm Location Id', 'integer|trim');
            $this->form_validation->set_rules('bank_id', 'Bank Id', 'integer|trim');
            $this->form_validation->set_rules('gender', 'Gender', 'alpha');
            $this->form_validation->set_rules('phone', 'Phone Number', 'integer|trim');
            $this->form_validation->set_rules('marital_status', 'Marital Status', 'alpha');
            $this->form_validation->set_rules('number_of_dependants', 'Number Of Dependants', 'integer');
            $this->form_validation->set_rules('add_labour', 'Additional Labour', 'integer');
            //$this->form_validation->set_rules('crop_proficiency', 'Crop Proficiency', 'required');
            $this->form_validation->set_rules('acct_number', 'Account Number', 'integer');
            $this->form_validation->set_rules('land_area_farmed', 'Land Area Farmed', 'integer');
            $this->form_validation->set_rules('years_of_experience', 'Years Of Experience', 'integer');
            //$this->form_validation->set_rules('income_range', 'Income Range', 'req');
            $this->form_validation->set_rules('previous_training', 'Previous Training', 'integer');
            $this->form_validation->set_rules('comment', 'Comment', 'integer');


            if ($this->form_validation->run() === FALSE) {
              var_dump($this->validation_errors());
              die();
              $this->response(array('status'=>'failure', 'message'=> $this->validation_errors()), REST_Controller::HTTP_BAD_REQUEST);

            }else{

              $farmer = $this->post();
              $updated = $this->api_farmer_model->update($farmerid, $farmer);

              if(!$updated){
                $this->response(array('status'=>'failure', 'message'=> 'Unexpected error occurred while trying to edit farmer'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }else{
                $this->response(array('status'=>'success', 'message'=> 'farmer edited'));
              }
            }
          }else{
            $this->response(array('status'=>'failure', 'message'=> 'The Farmer could not be found'), REST_Controller::HTTP_NOT_FOUND);
          }

        }
        
     

}
