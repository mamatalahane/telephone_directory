<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->database();
        $this->load->model('Contact_model');
        $this->load->helper('utility_helper');

        $userdetails = $this->session->userdata('userdetails');
        if(empty($userdetails['user_id'])) { 
            $url = base_url() . 'index.php/admin/login';
            //echo $url; exit;
            redirect($url);
        }
    }

    function index() {

        $data['list'] = $this->Contact_model->getcontact();
        $this->load->view("admin/list", $data);
    }

    function add($id='') {

        $data=array();
        if(!empty($id)) {
            $data['details'] = $this->Contact_model->getcontact($id);
        }

        //print_r($this->session->userdata());
        $userdetails = $this->session->userdata('userdetails');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middel Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('txtemail', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('landline', 'Landline', 'trim');
            $this->form_validation->set_rules('notes', 'Middel Name', 'trim');

            //$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');

            if($this->form_validation->run() === FALSE) {

                $this->load->view("admin/contact");

            } else {

                $update_id      = $this->security->xss_clean($this->input->post('id'));
                $fname      = $this->security->xss_clean($this->input->post('fname'));
                $mname      = $this->security->xss_clean($this->input->post('mname'));
                $lname      = $this->security->xss_clean($this->input->post('lname'));
                $txtemail   = $this->security->xss_clean($this->input->post('txtemail'));
                $mobile     = $this->security->xss_clean($this->input->post('mobile'));
                $landline   = $this->security->xss_clean($this->input->post('landline'));
                $notes      = $this->security->xss_clean($this->input->post('notes'));
                $photo      = $this->security->xss_clean($this->input->post('old_photo'));

                //echo '<pre>'; print_r($_FILES);
                if(!empty($_FILES["photo"]["tmp_name"])) {
                    $pic = time().'_'.$_FILES["photo"]["name"];
                    $folder = "images/contact_photo/";
                    $path = $folder.$pic; // New variable
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                } else {
                    if(!empty($photo)) {
                        $path = $photo;
                    }
                }

                //echo $path; exit; 

                $insert_data = array(
                    'fname' => $fname,                
                    'mname' => $mname,
                    'lname' => $lname,
                    'email' => $txtemail,
                    'mobile' => $mobile,
                    'landline' => $landline,
                    'notes' => $notes,
                    'photo' => $path,
                    'created_by' => $userdetails['user_id']
                );



                //echo '<pre>'; print_r($insert_data); exit;

                if(!empty($update_id)) {
                    $this->Contact_model->updateContact($insert_data, $update_id);
                } else {
                    $insertUser = $this->Contact_model->insertContact($insert_data);
                }

                $url = base_url().'index.php/contact';
                redirect($url);


            }
        } else {

            $this->load->view("admin/contact", $data);
        }
    

    }


    

    function view($id='') {

        $this->Contact_model->updateViews($id);

        $data['details'] = $this->Contact_model->getcontact($id);

        $this->load->view("admin/view", $data);

    }


    function graph() {

        $data['details'] = $this->Contact_model->graph_data();

        $this->load->view("admin/graph", $data);

    }








}
