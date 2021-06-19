<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->database();
        $this->load->model('Admin_model');
    }

    function index() {
        // print_r($this->session->userdata());exit;
        if ($this->session->userdata('user_id')) {
            $url = base_url() . 'admin/dashboard';
            redirect($url);
        }        
        $this->load->view("login");
        // $this->load->view("includes/header");
    }

    function login() {

        // print_r($_POST);exit;
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
               $this->load->view('admin/dashboard');
            }else{
                $this->load->view('login');
            }
        } else {
            $login = $this->input->post('email');
            $password = $this->input->post('password');            

            $result = $this->Admin_model->login_check($login, $password);

            // echo $result;exit;

            if ($result == TRUE) {
                $username = $this->input->post('email');
                $userDetail = $this->Admin_model->getByField('users', 'email', $username);

                if($userDetail['role_id'] == 1){
                    $userdetails_array = array('userRole' => $userDetail['role_id'], 'userEmail' => $userDetail['email'], 'userName' => $userDetail['username'], 'fullname' => $userDetail['first_name'].' '.$userDetail['last_name'], 'user_id' => $userDetail['user_id']);
                    $this->session->set_userdata('userdetails', $userdetails_array);
                    $url = base_url() . 'index.php/admin/dashboard';
                    redirect($url);
                }
            } else {
                $this->message_stack->add_message('message', 'The username or password is incorrect');
                $url = base_url() . 'index.php/admin/login';
                redirect($url);
            }
        }
    }

    function register(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        $this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');

        if($this->form_validation->run() === FALSE){
            $this->load->view("register");
        }else{
            $first_name     = $this->security->xss_clean($this->input->post('first_name'));
            $last_name      = $this->security->xss_clean($this->input->post('last_name'));
            $email          = $this->security->xss_clean($this->input->post('email'));
            $password       = $this->security->xss_clean($this->input->post('password'));
            $hashPassword   = md5($password);

            $insert_data = array(
                'role_id' => '1',
                'first_name' => $first_name,                
                'last_name' => $last_name,
                'email' => $email,
                'username' => $email,
                'password' => $hashPassword,
                'visible_password' => $password,
                /*'profile_pic' => '',
                'mobile_no' => '',
                'dob' => '',*/
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'created_on' => date('Y-m-d H:i:s'),
                'active' => '1'
            );

            $checkDuplicate = $this->Admin_model->checkDuplicate($email);

            if($checkDuplicate == 0){
                $insertUser = $this->Admin_model->insertUser($insert_data);
            
                if($insertUser)
                {
                    $data['status'] = 'true';
                    $data['message_display'] = 'New User Register Successfully.';
                    $this->load->view('register',$data);
                }
                else
                {   
                    $data['status'] = 'false';
                    $data['error_message'] = 'Unable to save user. Please try again';
                    $this->load->view('register',$data);
                }
            }else{
                $data['status'] = 'false';
                $data['message_display'] = 'User email alreary exists';
                $this->load->view('register',$data);
            }
        }        
    }

    function logout() {
        $array_items = array('user_id' => '', 'username' => '');
        unset($_SESSION["admindetails"]);
        $this->message_stack->add_message('message', "Logged out successfully");
        $url = base_url() . 'index.php/admin/login';
        redirect($url);
    }


    function dashboard(){

        $userdetails = $this->session->userdata('userdetails');
        if(empty($userdetails['user_id'])) { 
            $url = base_url() . 'index.php/admin/login';
            //echo $url; exit;
            redirect($url);
        }

        $data['total_users'] = $this->Admin_model->total_users();
        $data['total_contacts'] = $this->Admin_model->total_contacts();
        $this->load->view("admin/dashboard", $data);        
    }



}
