<?php

/**
 * PHP Encrypter
 * Safety against scripts injections
 * Generates an encrypted hash of 108 byte
 * @link https://github.com/lleocastro/php-encrypter
 * @license https://github.com/lleocastro/php-encrypter/blob/master/LICENSE
 * @copyright 2016 Leonardo Carvalho <leonardo_carvalho@outlook.com>
 */

class Encrypter
{
    /**
     * Encryption prefix
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var string
    */
    private $prefix = '2a';

    /**
     * Salt [MTc2MzMxNDQ4NTdmZDg4Yz]
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var string
    */
    private $salt = '';

    /**
     * Custo default '8' [4 <> 31]
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var int
    */
    private $cust = 8;

    /**
     * Secret hash for hard encryption
     * @var string
    */
    private $secret = [];
    private $key = 'rammstein';


    /**
     * Encrypter Factory
     * @param string $prefix
     * @param string $hash
     * @param string $cust
    */
    public function __construct($prefix = '', $salt = '', $cust = '')
    {
    	$p = (string) trim(htmlentities(strip_tags($prefix)));
    	$s = (string) trim(htmlentities(strip_tags($salt)));
    	$c = (int)    htmlentities(strip_tags($cust));
    	$this->prefix = ($p==''?$this->prefix='2a':$this->prefix=$p);
    	$this->salt = ($s==''?$this->salt=$this->generateHash():$this->salt=$s);
        $this->cust = ($c==''?$this->cust='8':$this->cust=$c);
    }

    /**
     * Encrypt Generate
     * @param string $value
     * @return string encrypted
    */
    public function generate($value)
    {
        return strrev($this->obscure(
            crypt(
        	    (string) trim(htmlentities(strrev($value))), 
        	    $this->generateHash()
            )
        ));
    }

    /**
     * Compare hashes
     * @param string $value
     * @param string $hash
     * @return boolean
    */
    public function isEquals($value, $hash) 
    {
	    $v = (string) trim(htmlentities(strrev($value)));
	    $h = $this->illumin((string) trim(htmlentities(strrev($hash))));
        
        if(crypt($v, $h) === $h):
            return true;
        endif;

        return false;
    }

    /**
     * Generate a random salt
     * @return string
    */
	protected function generateSalt() 
	{
		return substr(base64_encode(uniqid(mt_rand(), true)), 0, 22);
	}

    /**
     * Build a hash string for crypt
     * @return formated string
    */
	private function generateHash() 
	{
		return sprintf('$%s$%02d$%s$', $this->prefix, $this->cust, $this->generateSalt());
	}


    /**
     * Hard hash encryptation
     * @param string $encryptedData
     * @return string encrypted
    */
    protected function obscure($encryptedData)
    {
        $encryptedData = base64_encode($encryptedData);
        return base64_encode(strrev(
            substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData)).
            substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData))));
    }

    protected function illumin($encryptedData)
    {
        $encryptedData = base64_decode($encryptedData);
        $encryptedData = strrev(
            substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData)).
            substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData)));
        return base64_decode($encryptedData);
    }

}