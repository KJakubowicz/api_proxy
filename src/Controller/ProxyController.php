<?php
/**
 * Main controller for define class and determine the action
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  ProxyController
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class ProxyController
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  ProxyController
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class ProxyController extends AbstractController
{
    private array $_aHeaders = [];
    private string $_sAuthMethod = 'auth';
    private object $_oClass;

    /**
     * Constructor for ProxyController
     * 
     * @param $oClient data from HttpClient
     * 
     * @return void
     */
    public function __construct(HttpClientInterface $oClient)
    {
       
        $this->_aHeaders = array_change_key_case(apache_request_headers(), CASE_LOWER); 
        $oMerge = new MergeController($this->_aHeaders['code']);    
        $this->_oClass = $oMerge->createObject($oClient, $this->_aHeaders);  
      
    }

    /**
     * Main method for return ready result
     * 
     * @param $sMethod variable for set method 
     * 
     * @return JsonResponse
     */
    public function proxyFit(string $sMethod = ''): Response
    {
        //TODO: Dorobić jeszcze parsowanie
        $iConnection = $this->_oClass->{$this->_sAuthMethod}();
       
        if ($iConnection !== 200 ) {
            //error   
        }
        $aData = $this->_oClass->$sMethod();
        return $this->json($aData);
    }

    /**
     * Method for return password generator
     * 
     * @return JsonResponse
     */
    #[Route('/api/v1/password_generator', name: 'app_password_generator')]
    public function passwordGenerator()
    {
        return $this->proxyFit('passwordGenerator');
    }
}
