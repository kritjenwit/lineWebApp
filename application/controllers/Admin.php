<?php

    class Admin extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
        }

        public function index(){

            if(!$this->session->userdata('logged')){
                redirect('login');
            }
            $data['title'] = 'Admin panel';
            $data['works'] = $this->work_model->get_undone_work();
            $data['unsent_works'] = $this->work_model->get_unsent_work();

            $data['user_session'] = $this->session->all_userdata();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }

        public function user(){

            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $data['title'] = 'User detail';

            $data['users'] = $this->user_model->get_user();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        }
        public function work(){

            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $data['title'] = 'Work detail';
            $data['users'] = $this->user_model->get_user();
            $data['works'] = $this->work_model->get_work();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/work', $data);
            $this->load->view('templates/footer');
        }
        public function edit($id){

            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $data['work'] = $this->work_model->get_work($id);
            if(empty($data['work'])){
                show_404();
            }
            $data['title'] = $data['work']['name'];

            $this->load->view('templates/header', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
    
        }
    
        public function delete($id){
            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $this->work_model->delete_work($id);
            redirect('work');
        }
    
        public function update(){

            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $this->work_model->update_work();
            redirect('work');
        }

        public function message(){
            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $data['users'] = $this->user_model->get_user();
            $data['title'] = 'Send message';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/message', $data);
            $this->load->view('templates/footer');
        }

        public function profile(){
            if(!$this->session->userdata('logged')){
                redirect('login');
            }

            $id = $this->session->userdata('id');

            $data['user'] = $this->user_model->get_user($id);
            $data['title'] = 'Profile';
            $this->load->view('templates/header',  $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        }

    }