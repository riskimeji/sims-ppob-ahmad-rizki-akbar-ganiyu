<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProses(){
        $client = \Config\Services::curlrequest();
        $email =  $this->request->getPost('email');
        $password =  $this->request->getPost('password');
        $response = $client->post('https://take-home-test-api.nutech-integrasi.com/login',[
            'http_errors' => false,
            'json' => [
            'email' => $email,
            'password' => $password
        ]
        ]);
        $body = json_decode($response->getBody(), true);
        if($body['status'] != 0){
            return redirect()->to('/')->with('message_error', $body['message']);
        }else{
            session()->set([
                'token' => $body['data']['token'],
                'token_exp' => time() + 3600
            ]);            
            return redirect()->to('/dashboard')->with('success', $body['message']);
        }        
    }

    public function register(){
        return view('auth/register',[
            'validation' => \Config\Services::validation()
        ]);
    }

    public function registerProses(){
            helper('form');
            $validation = \Config\Services::validation();
            $client = \Config\Services::curlrequest();

            $validation->setRules([
                'email' => 'required|valid_email',
                'first_name' => 'required|min_length[3]',
                'last_name' => 'required|min_length[3]',
                'password' => 'required|min_length[8]',
                'confirm_password' => 'required|matches[password]|min_length[8]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('validation', $validation);
            }      
            $email =  $this->request->getPost('email');
            $first_name =  $this->request->getPost('first_name');
            $last_name =  $this->request->getPost('last_name');
            $password =  $this->request->getPost('password');
                   
            $response = $client->post('https://take-home-test-api.nutech-integrasi.com/registration',[
                'http_errors' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],            
                'json' => [
                'email' => trim($email),
                'first_name' => trim($first_name),
                'last_name' => trim($last_name),
                'password' => trim($password),
            ]
            ]);
            $body = json_decode($response->getBody(), true);
            // dd($body);
            if($body['status'] != 0){
                return redirect()->to('/register')->with('message_error', $body['message']);
            }else{
                return redirect()->to('/')->with('message_success', $body['message']);
            }   
    }
    public function logout(){
        session()->destroy();
    return redirect()->to('/');
    }

}
