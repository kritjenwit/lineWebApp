<?php

    class Admin extends CI_Controller{

        public function index(){

            $data['title'] = 'Admin panel';
            $data['works'] = $this->work_model->get_undone_work();
            $data['unsent_works'] = $this->work_model->get_unsent_work();

            $data['user_session'] = $this->session->all_userdata();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }

        public function user(){
            $data['title'] = 'User detail';

            $data['users'] = $this->user_model->get_user();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        }
        public function work(){
            $data['title'] = 'Work detail';
            $data['users'] = $this->user_model->get_user();
            $data['works'] = $this->work_model->get_work();

            $this->load->view('templates/header', $data);
            $this->load->view('admin/work', $data);
            $this->load->view('templates/footer');
        }
        public function edit($id){
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
            $this->work_model->delete_work($id);
            redirect('work');
        }
    
        public function update(){
            $this->work_model->update_work();
            redirect('work');
        }

    }