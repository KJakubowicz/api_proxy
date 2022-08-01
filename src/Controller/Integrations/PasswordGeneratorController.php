<?php

namespace App\Controller\Integrations;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class PasswordGeneratorController extends AbstractController
{
    private $_client = null;

    private array $_aHeaders = [];

    public function __construct(HttpClientInterface $client, $_aHeaders = null)
    {   
        $this->_client = $client;
        $this->_aHeaders = $_aHeaders;
    }

    public function auth(): int 
    { 
        
        $response = $this->_client->request(
            'POST',
            'http://pass.test/api/v1/auth',
        );
  
        $statusCode = $response->getStatusCode();
        
        return $statusCode;
    }

    #[Route('/api/v1/password_generator', name: 'app_password_generator')]
    public function index(): JsonResponse
    {
        $response = $this->_client->request(
            'POST',
            'http://pass.test/api/v1/password_generator',
            [
                'headers' => [
                    'length'    => $this->_aHeaders['length'],
                    'lowercase' => $this->_aHeaders['lowercase'],
                    'uppercase' => $this->_aHeaders['uppercase'],
                    'symbols'   => $this->_aHeaders['symbols'],
                    'numbers'   => $this->_aHeaders['numbers'],
                ],
            ],
        );
       
        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        
        return $this->json([
            'data'    => $content['data'],
        ]);
    }
   

}
