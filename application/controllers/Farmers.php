<?php

class Farmers extends CI_Controller {

public function addfarmer() {

  //check login
  if (!$this->session->userdata('logged_in')) {
      redirect('users/login');
  }
  $data['profile'] = $this->user_model->get_user_profile();

  //check user

  if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
      redirect('users/login');
    }

$data['farm_group'] = $this->farmgroup_model->get_all();
$data['crops'] = $this->crops_model->get_crops();
$data['farm_location'] = $this->farmlocation_model->get_all();
$data['states'] = $this->states_model->get_all();
$data['banks'] = $this->banks_model->get_all();
$data['lgas'] = $this->localgovt_model->order_by('local_name', 'asc')->get_all();


          $this->form_validation->set_rules('fname', 'First Name', 'required');
          $this->form_validation->set_rules('sname', 'Last Name', 'required');
          $this->form_validation->set_rules('dob', 'Date of birth', 'required');

          if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/template/head');

            //$this->load->view('users/template/header');
            $this->load->view('farmers/addfarmer', $data);
              $this->load->view('users/template/sidebar');
            $this->load->view('users/template/footer');

                    }else {
                      $fname = $this->input->post('fname');
                      $sname = $this->input->post('sname');
                      $slug = url_title($fname.$sname);

                      //upload image
                      $config['upload_path'] = './assets/images/farmerpix';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '2048';
                      $config['remove_spaces'] = FALSE;
                      

                      $this->upload->initialize($config);
                      //$this->load->library('upload', $config);
                      if($_FILES['pimage']['name']){

                        if (!$this->upload->do_upload('pimage')) {
                            $error = array('error' => $this->upload->display_errors());
                            $post_image = 'noimage.png';

                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $post_image = $_FILES['pimage']['name'];
                        }
                      }else if($_POST['mydata']){

              $encoded_data = $_POST['mydata'];
              $binary_data = base64_decode( $encoded_data );
            $filename='farmer'.$slug.'.jpg';
            $filepath = './assets/images/farmerpix/'.$filename;
            //$filepath=FCPATH.'assets\images\farmerpix'.$filename;
         
            file_put_contents($filepath, $binary_data);
            

            $post_image = $filename;

            }else{
            $post_image = 'noimage.png';
            
            }



                      $this->farmers_model->add_farmer($post_image);

                        //set message
                        $this->session->set_flashdata('farmer_added', 'Farmer has being added');

                        redirect('farmers');
                    }

    }



    public function updatefarmer($id) {


              ///check login
              if (!$this->session->userdata('logged_in')) {
                  redirect('users/login');
              }
              $data['profile'] = $this->user_model->get_user_profile();

              //check user

              if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
                  redirect('users/login');
              }

        $data['farmer_details'] = $this->farmers_model->get_farmers($id);

        $data['farm_group'] = $this->farmgroup_model->get_all();
      $data['crops'] = $this->crops_model->get_crops();
        $data['farm_location'] = $this->farmlocation_model->get_all();
        $data['states'] = $this->states_model->get_all();
        $data['banks'] = $this->banks_model->get_all();
        $data['lgas'] = $this->localgovt_model->order_by('local_name', 'asc')->get_all();


                  $this->form_validation->set_rules('fname', 'First Name', 'required');
                  $this->form_validation->set_rules('sname', 'Last Name', 'required');

        if ($this->form_validation->run() === FALSE) {

          $this->load->view('users/template/head');

          //$this->load->view('users/template/header');
          $this->load->view('farmers/editfarmer', $data);
            $this->load->view('users/template/sidebar');
          $this->load->view('users/template/footer');
        } else {
          $fname = $this->input->post('fname');
          $sname = $this->input->post('sname');
          $slug = url_title($fname.$sname);

          //upload image
          $config['upload_path'] = './assets/images/farmerpix';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['remove_spaces'] = FALSE;

          $this->upload->initialize($config);
          //$this->load->library('upload', $config);
          if($_FILES['pimage']['name']){

            if (!$this->upload->do_upload('pimage')) {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';

            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['pimage']['name'];
            }
          }elseif($_POST['mydata']){


  $encoded_data = $_POST['mydata'];
  $binary_data = base64_decode( $encoded_data );
	$filename='farmer'.$slug.'.jpg';
            $filepath = './assets/images/farmerpix/'.$filename;
            //$filepath=FCPATH.'assets\images\farmerpix'.$filename;
         
            file_put_contents($filepath, $binary_data);
            
            $post_image = $filename;
}else{

$post_image = 'noimage.jpg';
}



          $this->farmers_model->updatefarmer($post_image);

            //set message
            $this->session->set_flashdata('farmer_edited', 'Farmer has being edited');

            redirect('farmers');
        }
    }

    public function list($offset=0){

          ///check login
          if (!$this->session->userdata('logged_in')) {
              redirect('users/login');
          }
          $data['profile'] = $this->user_model->get_user_profile();

          //check user

          if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
              redirect('users/login');
          }
          ///pagination config
         $config['base_url'] = base_url().'farmers/list/';
         $config['total_rows'] = $this->db->count_all('farmers');
         $config['per_page'] = 10;
         $config['uri_segment'] = 3;
         //$config['attributes'] = array('class' => 'pagination-link');

         //bootstrap styling
         $config['num_tag_open'] = '<li>';
         $config['num_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
         $config['cur_tag_close'] = '</a></li>';
         $config['next_link'] = 'Next';
         $config['prev_link'] = 'Prev';
         $config['next_tag_open'] = '<li class="pg-next">';
         $config['next_tag_close'] = '</li>';
         $config['prev_tag_open'] = '<li class="pg-prev">';
         $config['prev_tag_close'] = '</li>';
         $config['first_tag_open'] = '<li>';
         $config['first_tag_close'] = '</li>';
         $config['last_tag_open'] = '<li>';
         $config['last_tag_close'] = '</li>';
         ///init pagination
        $this->pagination->initialize($config);



      $data['all_farmers'] = $this->farmers_model->get_farmers(FALSE, $config['per_page'], $offset);
      

      $this->load->view('users/template/head');

      //$this->load->view('users/template/header');
      $this->load->view('farmers/list', $data);
        $this->load->view('users/template/sidebar');
      $this->load->view('users/template/footer');
    }

    public function farmerdetails($id){

      ///check login
      if (!$this->session->userdata('logged_in')) {
          redirect('users/login');
      }
      $data['profile'] = $this->user_model->get_user_profile();

      //check user

      if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
          redirect('users/login');
        }

      $data['all_farmers'] = $this->farmers_model->get_farmers($id);
      $this->load->view('users/template/head');

      //$this->load->view('users/template/header');
      $this->load->view('farmers/farmerdetails', $data);
        $this->load->view('users/template/sidebar');
      $this->load->view('users/template/footer');
    }

    public function croplist(){


          ///check login
          if (!$this->session->userdata('logged_in')) {
              redirect('users/login');
          }
          $data['profile'] = $this->user_model->get_user_profile();

          //check user

          if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
              redirect('users/login');
          }
          $crop = $_POST['crop'];
         
          $explodeinput = explode(",", $crop);
          $search = end($explodeinput);

          $data['crops'] = $this->crops_model->search_crops($search);


      $this->load->view('farmers/croplist', $data);

    }
    
      public function local(){


          ///check login
          if (!$this->session->userdata('logged_in')) {
              redirect('users/login');
          }
          $data['profile'] = $this->user_model->get_user_profile();

          //check user

          if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
              redirect('users/login');
          }
          $stateid = $_POST['local'];
     

          $data['local'] = $this->localgovt_model->get_many_by('state_id', $stateid);


      $this->load->view('farmers/local', $data);

    }



}
