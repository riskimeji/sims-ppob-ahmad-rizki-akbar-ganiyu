<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $client = \Config\Services::curlrequest(); 
        $token = session()->get('token');
        $getService = $client->get('https://take-home-test-api.nutech-integrasi.com/services',[
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token,
            ]
        ]);
        $getBanner = $client->get('https://take-home-test-api.nutech-integrasi.com/banner',[
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token,
            ]
        ]);
        $banners_decode =json_decode($getBanner->getBody());
        $services_decode = json_decode($getService->getBody());

        $banners = $banners_decode->data;
        $services = $services_decode->data;
        return $this->render('dashboard/index',[
            'services' => $services,
            'banners' => $banners
        ]);
    }
    
    public function history_transaction(){
        $client = \Config\Services::curlrequest(); 
        $token = session()->get('token');
        $offset = $this->request->getGet('offset') ?? 0;
        $getHistory = $client->get('https://take-home-test-api.nutech-integrasi.com/transaction/history', [
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
            'query' => [
                'offset' => $offset,
                'limit' => 5,
            ]
        ]);
        
        $decode_history = json_decode($getHistory->getBody());
        $total_records = count($decode_history->data->records);
        $isLastPage = $total_records < 5;
        return $this->render('dashboard/history_transaction',[
            'histories' => $decode_history,
            'offset' => $offset + 5,
            'isLastPage' => $isLastPage, 
            'limit' => 5
        ]);
    }
    
    public function balance_index(){
        return $this->render('dashboard/topup_balance');
    }

    public function process_topup(){
        $token = session()->get('token');
        $client = \Config\Services::curlrequest();
        $amount =  $this->request->getPost('top_up_amount');
        $cleanedAmount = (int) str_replace('.', '', $amount);
        if($cleanedAmount < 10000){
            return redirect()->to('/dashboard/balance')->withInput()->with('message_error', 'Gagal!, Minimal tp up Rp10.000');
        }elseif($cleanedAmount > 1000000){
            return redirect()->to('/dashboard/balance')->withInput()->with('message_error', 'Gagal!, Maximal tp up Rp1.000.000');
        }
        $response = $client->post('https://take-home-test-api.nutech-integrasi.com/topup',[
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token
            ],            
            'json' => [
            'top_up_amount' =>$cleanedAmount,
        ]
        ]);
        $body = json_decode($response->getBody(), true);
        if($body['status'] != 0){
            return redirect()->to('/dashboard/balance')->withInput()->with('message_error', $body['message']);
        }else{
            return redirect()->to('/dashboard/balance')->withInput()->with('message_success', $body['message']);
        }
    }
    public function transaction_index(){
        $selectedServiceCode = $this->request->getGet('service');
        $client = \Config\Services::curlrequest(); 
        $token = session()->get('token');
        $getService = $client->get('https://take-home-test-api.nutech-integrasi.com/services',[
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token,
            ]
        ]);
        $response = json_decode($getService->getBody());

        $serviceData = null;
        if (isset($response->data)) {
            foreach ($response->data as $item) {
                if ($item->service_code === $selectedServiceCode) {
                    $serviceData = $item;
                    break;
                }
            }
        }
        if (!$serviceData) {
            return redirect()->to('/dashboard')->with('error', 'Layanan tidak ditemukan.');
        }
        return $this->render('dashboard/create_transaction', [
            'service' => $serviceData
        ]);
    
    }
    public function transaction_process(){
        $client = \Config\Services::curlrequest(); 
        $token = session()->get('token');
        $balance =  $this->request->getPost('balance');
        $selectedServiceCode =  $this->request->getPost('service');
        $tarif =  $this->request->getPost('tariff');
        // dd((int) $tarif);
        if((int) $balance < (int) $tarif){
            return redirect()->back()->withInput()->with('error', 'Saldo tidak mencukupi');
        }

        $post = $client->post('https://take-home-test-api.nutech-integrasi.com/transaction',[
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token
            ],            
            'json' => [
            'service_code' => $selectedServiceCode,
        ]
        ]);
        $response = json_decode($post->getBody());
        if($response->status != 0){
            return redirect()->back()->withInput()->with('error', $response->message);
        }else{
            return redirect()->back()->withInput()->with('success', $response->message);
        }
    }

    public function profile_index(){
        return $this->render('dashboard/setting_profile');
    }

    public function update_profile(){
        $token = session()->get('token');
        $client = \Config\Services::curlrequest();
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $file = $this->request->getFile('file');
        $messages = [];
        $hasError = false;


        if ($file && $file->isValid()) {
            $mime = $file->getMimeType();
            $allowedTypes = ['image/jpeg', 'image/png'];
        
            if (!in_array($mime, $allowedTypes)) {
                return redirect()->back()->with('error', 'Format gambar hanya boleh PNG atau JPEG.');
            }
        
            $token = session('token');
            $filePath = $file->getTempName();
            $fileName = $file->getName();
        
            $cfile = new \CURLFile($filePath, $mime, $fileName);
        
            $postfields = ['file' => $cfile];
        
            $ch = curl_init();
        
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://take-home-test-api.nutech-integrasi.com/profile/image',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $token,
                    'Accept: application/json',
                ],
                CURLOPT_POSTFIELDS => $postfields,
            ]);
        
            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);
        
            if ($error) {
                return redirect()->back()->with('error', 'CURL Error: ' . $error);
            }
        
            $result = json_decode($response, true);
        
            if (isset($result['status']) && $result['status'] == 0) {
                return redirect()->back()->with('success', 'Foto profil berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', $result['message'] ?? 'Gagal upload foto.');
            }
        
        }
        
        if (!empty($first_name) || !empty($last_name)) {
            $update_profile = $client->put('https://take-home-test-api.nutech-integrasi.com/profile/update', [
                'http_errors' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ],
                'json' => [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                ]
            ]);
            
            $body_profile = json_decode($update_profile->getBody(), true);
            
            if ($body_profile['status'] == 0) {
                $messages[] = 'Berhasil memperbarui nama.';
            } else {
                $messages[] = 'Gagal memperbarui nama: ' . ($body_profile['message'] ?? 'Unknown error');
                $hasError = true;
            }
        }

        if ($hasError) {
            return redirect()->back()->with('error', implode('<br>', $messages));
        } else {
            return redirect()->back()->with('success', implode('<br>', $messages));
        }
    }
}
