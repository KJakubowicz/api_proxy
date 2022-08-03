<?php
/**
 * Controler for merge the date to create object
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Merge
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Controller\Response\ResponseController;

/**
 * Class MergeController
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Merge
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class MergeController extends AbstractController
{
    private $_sCode;
    private $_oResponse;

    /**
     * Constructor for MergeController
     * 
     * @param $sCode code for class
     * 
     * @return void
     */
    public function __construct($sCode = '')
    {
        $this->_sCode = $sCode; 
        $this->_oResponse = new ResponseController;
    }

    /**
     * Method for create object from code
     * 
     * @param $client   object from HttpClient
     * @param $aHeaders array with headers
     * 
     * @return object
     */
    public function createObject(HttpClientInterface $client, $aHeaders): object
    {
        
        if (empty($this->_sCode)) {
            //TODO: dodaj jakies sprawdzanie czy cos dotarło
          
        }
        $sControllerName = $this->_sCode.'Controller';
        $oClass = 'App\Controller\Integrations\\'.$sControllerName;
        
        if (!class_exists($oClass)) {
            //TODO: dodac obsluge w przypadku braku klasy
        }

        return new $oClass($client, $aHeaders);
       
    }
}
