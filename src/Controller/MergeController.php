<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MergeController extends AbstractController
{
    private string $_sCode = '';

    public function __construct($sCode = '')
    {
        $this->_sCode = $sCode;    
    }
    public function createObject(HttpClientInterface $client, $aHeaders): Object
    {
       
        if(empty($this->_sCode)){
      
            return 0;
        }
        $sControllerName = $this->_sCode.'Controller';
        $oClass = 'App\Controller\Integrations\\'.$sControllerName;
 
        if(!class_exists($oClass)){
            return 0;
        }

        return new $oClass($client, $aHeaders);
       
    }
}
