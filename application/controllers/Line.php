<?php

/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 17-Jul-18
 * Time: 5:42 PM
 */


use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
require_once 'vendor/autoload.php' ;

class Line extends CI_Controller
{

    private $access_token = '7ClZwOxLbE9T0n5upRmHqT0EvM+mJA+aMDntG+7qScI3p7LKV4Cb+biLAaj0rKnM+icuF0U2ZGzt7o2SC5OeNbHfGvQJ4f30OcCKEyIthL2LN6KB2OGi1sTnZvGjjohN6uA4H4PKfxE/pWFoV6GqRAdB04t89/1O/w1cDnyilFU=';
    private $channelSecret = 'a24dfd8f0a0acab89229f4a0fe0ef22f';
//    private $user_id = 'U9c57d73a04115de0c348c9502ca14f2c';
    public $bot;
    public $httpClient;


    public function __construct(){
        parent::__construct();
        $this->httpClient = new CurlHTTPClient($this->access_token);
        $this->bot = new LINEBot($this->httpClient, ['channelSecret' => $this->channelSecret]);
    }
    public function send($id){
        $data['works'] = $this->line_model->get_done_work($id);
//        print_r($data['works']);
        foreach ($data['works'] as $work){
            if($work['done'] == 1) {
                $this->bot->pushMessage($id, new TextMessageBuilder($work['name'] . ' is done'));
            }
        }
        $users = $this->user_model->get_user($id);
        $works = $this->work_model->get_work();
        foreach ($works as $work){
            if($users['id'] == $work['user_id']){
                $this->bot->pushMessage($id,new TextMessageBuilder('Please wait for the contact'));
                return redirect('user');
            }else{
                $this->bot->pushMessage($id,new TextMessageBuilder('You dont have any work'));
                return redirect('user');
            }
        }

    }

    public function broadcast_all(){
        $to = array();
        $data['users'] = $this->user_model->get_user();
        $data['works'] = $this->work_model->get_work();
        // print user id
        foreach ($data['users'] as $user){
            // print all work
            foreach ($data['works'] as $work){
                // check if userid is exist in the users table
                if($work['user_id'] == $user['id']){
                    if($work['done'] == 0 && $work['sent'] == 0){
                        $work_name = $work['name'];
                        $this->bot->pushMessage($user['id'],new TextMessageBuilder($work_name . ' is in progress'));
                    }
                    if($work['done'] == 1 && $work['sent'] == 0){
                        $work_name = $work['name'];
                        $this->bot->pushMessage($user['id'],new TextMessageBuilder($work_name . ' is done'));
                    }
                }
            }
        }
        redirect('/');
    }

    public function broadcast_done(){
        $data['users'] = $this->user_model->get_user();
        $data['works'] = $this->work_model->get_work();

        // print all user
        foreach ($data['users'] as $user){
            // print all work
            foreach ($data['works'] as $work){
                // check if userid is exist in the users table
                if($work['user_id'] == $user['id']){
                    if($work['done'] == 1 && $work['sent'] == 0){
                        $work_name = $work['name'];
                        $this->bot->pushMessage($user['id'],new TextMessageBuilder($work_name . ' is done'));
                    }
                }
            }
            $this->bot->pushMessage($user['id'],new TextMessageBuilder('Please wait for contact'));
        }

        redirect('/');

    }

    public function send_message(){
        $id = $this->input->post('id');
        $msg = $this->input->post('message');
        print_r($id);
        if(empty($id) && empty($msg)){
            $this->session->set_flashdata('error', 'Message should not be empty and Please select at least one user');
            redirect('message');
        }
        if(empty($msg)){
            $this->session->set_flashdata('error', 'Message should not be empty');
            redirect('message');
        }
        if(empty($id)){
            $this->session->set_flashdata('error', 'Please select at least one user');
            redirect('message');
        }
        $this->bot->multicast($id,new TextMessageBuilder($msg,'send by '.$this->session->userdata('display_name')));
        redirect('message');
    }
}