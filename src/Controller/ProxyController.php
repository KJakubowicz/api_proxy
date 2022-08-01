<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProxyController extends AbstractController
{
    private array $_aHeaders = [];
    private string $_sAuthMethod = 'auth';
    private object $_oClass;

    public function __construct(HttpClientInterface $oClient)
    {
       
        $this->_aHeaders = array_change_key_case(apache_request_headers(), CASE_LOWER); 
        $oMerge = new MergeController($this->_aHeaders['code']);    
        $this->_oClass = $oMerge->createObject($oClient, $this->_aHeaders);  
      
    }
    #[Route('/api/v1/proxy', name: 'app_proxy')]
    public function proxyFit(): Response
    {

        $iConnection = $this->_oClass->{$this->_sAuthMethod}();

        if($iConnection !== 200 ){
        //error   
        }

        $aData = $this->_oClass->{$this->_aHeaders['method']}();
        
        print_r($aData);die;
        // $iConnection = $oClass->$this->_sAuthMethod();
        print_r($test);die;
        return $this->render('proxy/index.html.twig', [
            'controller_name' => 'ProxyController',
        ]);
    }
}
