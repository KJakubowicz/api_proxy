<?php
/**
 * Class for response
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Response
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
namespace App\Controller\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class DedicatedRequestController
 * 
 * PHP version 8.1.6
 * 
 * @category Controller
 * @package  Response
 * @author   Kamil Jakubowicz <kjakubowicz98@interia.pl>
 * @license  GNU General Public License version 2 or later
 * @link     none  
 */
class ResponseController extends AbstractController 
{
    private string $_sSuccess        = '';
    private string $_sErrorInfo      = '';
    private array  $_aData           = [];
    private array  $_aAdditionalInfo = [];
    private int    $_iErrorCode;
    private int    $_iCode;

    /**
     * Set success from request
     *
     * @param string $sSuccess type from result
     * 
     * @return void
     */
    public function setSuccess(string $sSuccess = ''): void 
    {
        $this->_sSuccess = $sSuccess;
    }

    /**
     * Get success from request
     * 
     * @return string
     */
    public function getSuccess(): string 
    {
        return $this->_sSuccess;
    }

    /**
     * Set code from request
     *
     * @param int $iCode type from result
     * 
     * @return void
     */
    public function setCode(int $iCode = null): void 
    {
        $this->_iCode = $iCode;
    }

    /**
     * Get code from request
     * 
     * @return int
     */
    public function getCode(): int 
    {
        return $this->_iCode;
    }

    /**
     * Set error info from request
     *
     * @param string $sErrorInfo error informations from result
     * 
     * @return void
     */
    public function setErrorInfo(string $sErrorInfo = ''): void 
    {
        $this->_sErrorInfo = $sErrorInfo;
    }

    /**
     * Get error info from request
     * 
     * @return string
     */
    public function getErrorInfo(): string 
    {
        return $this->_sErrorInfo;
    }

    /**
     * Set date from request
     *
     * @param array $aData date from result
     * 
     * @return void
     */
    public function setData(array $aData = []): void 
    {
        $this->_aData = $aData;
    }

    /**
     * Get date from request
     * 
     * @return array
     */
    public function getData(): array 
    {
        return $this->_aData;
    }

    /**
     * Set additional info from request
     *
     * @param array $aAdditionalInfo additional info from result
     * 
     * @return void
     */
    public function setAdditionalInfo(array $aAdditionalInfo = []): void 
    {
        $this->_aAdditionalInfo = $aAdditionalInfo;
    }

    /**
     * Get additional info from request
     * 
     * @return array
     */
    public function getAdditionalInfo(): array 
    {
        return $this->_aAdditionalInfo;
    }

    /**
     * Set error code from request
     *
     * @param int $iErrorCode type from result
     * 
     * @return void
     */
    public function setErrorCode(int $iErrorCode = null): void 
    {
        $this->_iErrorCode = $iErrorCode;
    }

    /**
     * Get error code from request
     * 
     * @return int
     */
    public function getErrorCode(): int 
    {
        return $this->_iErrorCode;
    }

    /**
     * Get response
     * 
     * @return array
     */
    public function getResponse(): array 
    {
        $aResponse = [
            'success'         => $this->getSuccess(),
            'code'            => $this->getCode(),
            'error_info'      => $this->getErrorInfo(),
            'error_code'      => $this->getErrorCode(),
            'data'            => $this->getData(),
            'additional_info' => $this->getAdditionalInfo()
        ];

        return $aResponse;
    }
}
