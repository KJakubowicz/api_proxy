<?php
/**
 * Interface for authorization
 * 
 * PHP version 8.1.6
 * 
 * @category Interface
 * @package  Auth
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Intefraces\Auth;

use App\Controller\Auth\AuthController;
/**
 * Interface AuthInterface
 * 
 * PHP version 8.1.6
 * 
 * @category Interface
 * @package  Auth
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
interface AuthInterface
{
    /**
     * Returns an array of ship arrays, each with the following keys:
     *
     * @return AuthController
     */
    public function auth(): AuthController;

}