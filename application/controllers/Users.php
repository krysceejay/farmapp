<?php

class Users extends CI_Controller {

    public function register() {
        $data['title'] = 'User Sign-up';

        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('sname', 'Last Name', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists|trim|valid_email');


        //$this->form_validation->set_rules('agree', 'Checkbox', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');



        if ($this->form_validation->run() === FALSE) {

            $this->load->view('users/register', $data);

        } else {


            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);
            ///set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('users/login');
        }
    }

    public function login() {

        $data['title'] = "Sign In";


        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {

          $this->load->view('users/login', $data);

        } else {

            //get username

            $email = $this->input->post('email');

            $password = md5($this->input->post('password'));
            //login user

            $user_data = $this->user_model->login($email, $password);
            $fname = $user_data->firstname;
            $sname = $user_data->surname;

            $user_id = $user_data->user_id;


            if ($user_data) {


                //create session
                $user_data = array(
                    'user_id' => $user_id,
                    'email' => $email,
                    'fname' => $fname,
                    'sname' => $sname,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                ///set message
                $this->session->set_flashdata('login_success', 'You are now logged in ');


                redirect('users/dashboard');
            } else {

                ///set message
                $this->session->set_flashdata('login_failed', 'Login invalid, please check your email and password ');
                redirect('users/login');
            }
        }
    }

    public function logout() {
        //unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('sname');


        ///set message
        //$this->session->set_flashdata('logout', 'You are now logged out ');
        redirect('users/login');
    }

    public function dashboard() {


        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }


        $data['title'] = 'User Dashboard';
        $data['total_farmers'] = $this->db->count_all('farmers');
        $data['total_users'] = $this->db->count_all('users');

        //$this->form_validation->set_rules();
        $this->load->view('users/template/head');

        //$this->load->view('users/template/header');
        $this->load->view('users/dashboard', $data);
        $this->load->view('users/template/sidebar');
        $this->load->view('users/template/footer');
    }

    public function check_email_exists($email) {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

        if ($this->user_model->check_email_exists($email)) {

            return true;
        } else {
            return false;
        }
    }



    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }


    public function profile() {

        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }

        $data['profile'] = $this->user_model->get_user_profile();

        $data['title'] = 'User Profile';

        //$this->form_validation->set_rules();
        $this->load->view('dashboardtemp/header');
        $this->load->view('dashboardtemp/sidebar');
        $this->load->view('users/profile', $data);
        $this->load->view('dashboardtemp/footer');
    }

    public function editprofile() {

        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }

        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('sname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');



        $this->load->view('dashboardtemp/header');
        $this->load->view('dashboardtemp/sidebar');
        $this->load->view('users/editprofile', $data);
        $this->load->view('dashboardtemp/footer');
    }

    public function updateprofile() {

        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }

        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('sname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('dashboardtemp/header');
            $this->load->view('dashboardtemp/sidebar');
            $this->load->view('users/editprofile', $data);
            $this->load->view('dashboardtemp/footer');
        } else {


            //upload image
            $config['upload_path'] = './assets/images/propix';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $this->upload->initialize($config);

            $data['profile'] = $this->user_model->get_user_profile();
            $pro_image = $data['profile']['profile_image'];

            if (!$this->upload->do_upload('pimage')) {


                $post_image = $pro_image;
                //$post_image = 'noimage.jpg';
            } else {



                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['pimage']['name'];
                unlink(base_url() . 'assets/images/propix/' . $pro_image);
            }

            $this->user_model->update_profile($post_image);

            //set message
            $this->session->set_flashdata('profile_updated', 'Your profile has been updated');

            redirect('users/profile');
        }
    }

    public function addfarmgroup() {

        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }

        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('gname', 'Group Name', 'required');

        if ($this->form_validation->run() === FALSE) {

          $this->load->view('users/template/head');

          //$this->load->view('users/template/header');
          $this->load->view('users/addfarmgroup', $data);
          $this->load->view('users/template/sidebar');
          $this->load->view('users/template/footer');

        }else{
          $this->farmgroup_model->add_farmgroup();

          ///set message
          $this->session->set_flashdata('farm_group_added', 'Farm group added');

          redirect('users/farmgroup');

        }


    }

    public function farmgroup($offset=0){

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
         $config['base_url'] = base_url().'users/farmgroup/';
         $config['total_rows'] = $this->db->count_all('farm_group');
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



      $data['all_farm_group'] = $this->farmgroup_model->get_farm_group(FALSE, $config['per_page'], $offset);


      $this->load->view('users/template/head');

      //$this->load->view('users/template/header');
      $this->load->view('users/farmgroup', $data);
        $this->load->view('users/template/sidebar');
      $this->load->view('users/template/footer');
    }

    public function addfarmlocation() {

        ///check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['profile'] = $this->user_model->get_user_profile();

        //check user

        if ($this->session->userdata('user_id') != $data['profile']['user_id']) {
            redirect('users/login');
        }

        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('location_name', 'Location Name', 'required');

        if ($this->form_validation->run() === FALSE) {

          $this->load->view('users/template/head');

          //$this->load->view('users/template/header');
          $this->load->view('users/addfarmlocation', $data);
          $this->load->view('users/template/sidebar');
          $this->load->view('users/template/footer');

        }else{
          $this->farmlocation_model->add_farmlocation();

          ///set message
          $this->session->set_flashdata('farm_location_added', 'Farm location added');

          redirect('users/farmlocation');

        }


    }


    public function farmlocation($offset=0){

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
         $config['base_url'] = base_url().'users/farmlocation/';
         $config['total_rows'] = $this->db->count_all('farm_location');
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



      $data['all_farm_location'] = $this->farmlocation_model->get_farm_location(FALSE, $config['per_page'], $offset);


      $this->load->view('users/template/head');

      //$this->load->view('users/template/header');
      $this->load->view('users/farmlocation', $data);
        $this->load->view('users/template/sidebar');
      $this->load->view('users/template/footer');
    }


}
