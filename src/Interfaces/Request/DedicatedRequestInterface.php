<?php
/**
 * Interface for requests
 * 
 * PHP version 8.1.6
 * 
 * @category Interface
 * @package  Request
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Intefraces\Request;

/**
 * Interface DedicatedRequestInterface
 * 
 * PHP version 8.1.6
 * 
 * @category Interface
 * @package  Request
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
interface DedicatedRequestInterface
{
    /**
     * Makes standard request using API-key
     *
     * @param string $sEndPoint end point for api request
     * @param string $sMethod   type of method in request
     * @param string $aHeaders  headers for request
     * 
     * @return array
     */
    public function apiKeyRequest(string $sEndPoint = '', $sMethod = '', $aHeaders = ''): array;
    
}