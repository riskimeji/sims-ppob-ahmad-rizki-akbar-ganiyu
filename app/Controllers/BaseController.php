<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];
    protected $data = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        
        $this->data['uri'] = service('uri');
        $client = \Config\Services::curlrequest();
        $token = session()->get('token');

        if ($token) {
            $getBalance = $client->get('https://take-home-test-api.nutech-integrasi.com/balance', [
                'headers' => ['Authorization' => 'Bearer ' . $token]
            ]);
            $balanceBody = json_decode($getBalance->getBody(), true);

            $getProfile = $client->get('https://take-home-test-api.nutech-integrasi.com/profile', [
                'headers' => ['Authorization' => 'Bearer ' . $token]
            ]);
            $profileBody = json_decode($getProfile->getBody(), true);
            $firstName = $profileBody['data']['first_name'] ?? '';
            $lastName = $profileBody['data']['last_name'] ?? '';
            $profileImage = isset($profileBody['data']['profile_image']) && strpos($profileBody['data']['profile_image'], 'null') === false
            ? $profileBody['data']['profile_image']
            : '/assets/images/profile_photo.png';

            $this->data['first_name'] = trim($firstName) ?: 'Guest';
            $this->data['last_name'] = trim($lastName) ?: '';
            $this->data['email'] = trim($profileBody['data']['email']) ?: 'Guest';
            $this->data['saldo'] = $balanceBody['data']['balance'] ?? 0;
            $this->data['profile_image'] = $profileImage;

            $this->checkTokenExpiration();

        }
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
    }

    protected function checkTokenExpiration()
    {
        $client = \Config\Services::curlrequest();
        $token_exp = session()->get('token_exp');
        $token = session()->get('token');
        $refresh = $client->get('https://take-home-test-api.nutech-integrasi.com/profile', [
            'headers' => ['Authorization' => 'Bearer ' . $token]
        ]);
        $refreshBody = json_decode($refresh->getBody(), true);
        if($refreshBody['status'] == 108){
            session()->destroy();
            return redirect()->to('/login');
        }
        $current_time = time();

        if ($token_exp && $current_time > $token_exp) {
            session()->destroy();
            return redirect()->to('/login');
        }
    }


    protected function render(string $view, array $data = [])
    {
        $data = array_merge($this->data, $data);
        return view($view, $data);
    }

}
