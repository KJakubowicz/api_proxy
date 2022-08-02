<?php
/**
 * Class for request
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Request
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Intefraces\Request\DedicatedRequestInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Controller\Response\ResponseController;

/**
 * Class DedicatedRequestController
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Request
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class DedicatedRequestController extends AbstractController implements DedicatedRequestInterface
{
    private string $_sEndPoint = '';
    private string $_sMethod   = '';
    private string $_aHeaders  = '';
    private object $_oClient;
    private object $_oResponse;

    /**
     * Constructor for request
     * 
     * @param object $oClient object from HttpClient
     * 
     * @return void
     */
    public function __construct(HttpClientInterface $oClient)
    {
        $this->_oClient   = $oClient;
        $this->_oResponse = new ResponseController;
    }

    /**
     * Makes standard request using API-key
     *
     * @param string $sEndPoint end point for api request
     * @param string $sMethod   type of method in request
     * @param string $aHeaders  headers for request
     * 
     * @return array
     */
    public function apiKeyRequest(string $sEndPoint = '', $sMethod = '', $aHeaders = ''): array 
    {
        $oRequest = $this->_oClient->request(
            $sMethod,
            $sEndPoint,
            [
                'headers' => $aHeaders,
            ],
        );


        $this->_oResponse->setCode($oRequest->getStatusCode());
        $this->_oResponse->setData($oRequest->toArray());
        if ($oRequest->getStatusCode() === 200) {
            $this->_oResponse->setSuccess('true');
            $this->_oResponse->setErrorInfo('');
            $this->_oResponse->setAdditionalInfo([
                'contentType' => $oRequest->getHeaders()['content-type'][0],
            ]);
            $this->_oResponse->setErrorCode(0);
        } else {
            $this->_oResponse->setSuccess('false');
            $this->_oResponse->setErrorInfo('');
            $this->_oResponse->setAdditionalInfo([
                'contentType' => $oRequest->getHeaders()['content-type'][0],
            ]);
            $this->_oResponse->setErrorCode($oRequest->getStatusCode());
        }


        return $this->_oResponse->getResponse();
    }
}
