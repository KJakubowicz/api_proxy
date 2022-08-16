<?php
/**
 * Controller for division services
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Integrations
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller\Integrations;

use App\Intefraces\Auth\AuthInterface;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Controller\Auth\AuthController;
use App\Controller\Request\DedicatedRequestController;

/**
 * Class DivisionController
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Integrations
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class DivisionController extends AbstractController implements AuthInterface
{
    private $_oClient  = null;
    private $_aHeaders = [];
    private $_oAuth    = null;
    private $_oRequest = null;

    /**
     * Constructor for DivisionController
     *
     * @param object $oClient   object form HttpClient
     * @param array  $_aHeaders array of headers
     * 
     * @return void
     */
    public function __construct(HttpClientInterface $oClient, $_aHeaders = null)
    {   
        $this->_oClient  = $oClient;
        $this->_aHeaders = $_aHeaders;
        $this->_oAuth    = new AuthController();
        $this->_oRequest = new DedicatedRequestController($oClient);
    }

    /**
     * Method for check authorization
     * 
     * @return AuthController
     */
    public function auth(): AuthController 
    { 
        $test = [
            "username" => "dunglas@example.com",
            "password" => "MyPassword"
        ];
        $test = json_encode($test);
        $response = $this->_oClient->request(
            'POST',
            'http://division.test/api/login/'.$test,
        );
        
        $statusCode = $response->getStatusCode();
        print_r($response);die;
        return $this->_oAuth;
    }

    /**
     * Method for generate a passowrd
     * 
     * @return array
     */
    public function passwordGenerator(): array
    {
        $aHeaders = [
            'length'    => $this->_aHeaders['length'],
            'lowercase' => $this->_aHeaders['lowercase'],
            'uppercase' => $this->_aHeaders['uppercase'],
            'symbols'   => $this->_aHeaders['symbols'],
            'numbers'   => $this->_aHeaders['numbers'],
        ];
        $aResponse = $this->_oRequest->apiKeyRequest('http://pass.test/api/v1/password_generator', 'POST', $aHeaders);
        
        return $aResponse;
    }
   

}
