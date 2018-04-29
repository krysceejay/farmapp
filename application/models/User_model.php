<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function register($enc_password) {
        //user data array
        $data = array(
            'firstname' => $this->input->post('fname'),
            'surname' => $this->input->post('sname'),
            'email' => $this->input->post('email'),

            'password' => $enc_password
        );
        return $this->db->insert('users', $data);
    }

    public function check_email_exists($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        ///validate

        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0);
        } else {
            return false;
        }
    }

    public function get_user_profile() {

        $userid = $this->session->userdata('user_id');
        //$this->db->join('users','users.id = brands.userid');
        $query = $this->db->get_where('users', array('user_id' => $userid));
        return $query->row_array();
    }

    public function update_profile($post_image) {

        $userid = $this->session->userdata('user_id');
        $data = array(
            'firstname' => ucwords($this->input->post('fname')),
            'surname' => ucwords($this->input->post('sname')),
            'mobile' => $this->input->post('mobile'),
            'address' => $this->input->post('address'),
            'about_me' => $this->input->post('aboutme'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'profile_image' => $post_image
        );
        $this->db->where('user_id', $userid);
        return $this->db->update('users', $data);
    }



}
