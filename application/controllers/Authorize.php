<?php

/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 18-Jul-18
 * Time: 4:18 PM
 */
class Authorize extends CI_Controller
{

    private $client_id = "1595017693";
    private $client_secret = "bf483619feaac2511ba5bbb696524b7b";
    private $redirect_uri = "http%3A%2F%2Flocalhost%2Fline%2Fline-admin2%2Fauthorized";
    private $token;

    public function __construct()
    {
        parent::__construct();
    }

    public function login(){
        $data['line'] = 'https://access.line.me/oauth2/v2.1/authorize?';
        $data['line'] .= 'response_type=code&';
        $data['line'] .= 'client_id=1595017693&';
        $data['line'] .= 'redirect_uri=http://localhost/line/line-admin2/authorized&';
        $data['line'] .= 'state=12345abcde&';
        $data['line'] .= 'scope=profile%20openid%20email&';
        $data['line'] .= 'bot_prompt=aggressive';
        $this->load->view('authorizes/index', $data);
    }

    public function register(){
        $this->load->view('authorizes/register');
    }

    public function authorized(){
        // get code from uri
        $code = $this->input->get('code');
        $token_obj = json_decode($this->getToken($code));
        foreach($token_obj as $obj){
            $tokens[] = $obj;
        }
        // extract access token from code
        $token  = $tokens[0];
        $this->token = $token;

        // get user detail from access token
        $profiles = json_decode($this->getProfile());
        foreach($profiles as $profile){
            $user_profile[] = $profile;
        }
        $id = $user_profile[0];
        $display_name = $user_profile[1];
        $status = $user_profile[3];

        $this->user_model->insert($id,$display_name,$status);

        $user_data = array(
            'id'=>$id,
            'display_name' => $display_name,
            'status' => $status,
            'logged' => TRUE,
        );

        $this->session->set_userdata($user_data);
        redirect('/');
    }

    // get access token function
    public function getToken($code)
    {
        $client_id = $this->client_id;
        $client_secret = $this->client_secret;
        $redirect_uri = $this->redirect_uri;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/oauth2/v2.1/token?",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "grant_type=authorization_code&code=" . $code . "&client_id=" . $client_id . "&client_secret=" . $client_secret . "&redirect_uri=" . $redirect_uri,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function getProfile(){

        $token = $this->token;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/profile?",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$token,
                "cache-control: no-cache",

            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

}