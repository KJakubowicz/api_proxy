<?php
/**
 * Class for authorization
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Auth
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class for authorization
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Auth
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class AuthController extends AbstractController
{
    private $oAuth;

    public function setAuth($auth = '')
    {
        $this->oAuth = $auth;
    }

    public function getAuth()
    {
        return $this->oAuth;
    }
}
