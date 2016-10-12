<?php

/**
 * PHP Encrypter
 * Safety against scripts injections
 * Generates an encrypted hash of 148 byte
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
    private $secret = '';
    private $key = '00a3x2016';


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
        $this->secret = uniqid(mt_rand(), true);
    }

    /**
     * Encrypt Generate
     * @param string $value
     * @return string encrypted
    */
    public function generate($value)
    {
        return $this->inverse(
            crypt(
        	    (string) trim(htmlentities($value)), 
        	    $this->generateHash()
            )
        );
    }

    /**
     * Compare hashes
     * @param string $value
     * @param string $hash
     * @return boolean
    */
	public function isEquals($value, $hash) 
	{
		$v = (string) trim(htmlentities($value));
		$h = $this->reverse((string) trim(htmlentities($hash)));

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
     * Build a hard hash encryptation
     * @param string $encryptedData
     * @return string encrypted
    */
    private function inverse($encryptedData)
    {
        return base64_encode(
            $encryptedData.$this->secret.$this->key.'encrypted'
        );
    }
    private function reverse($encryptedData)
    {
        return substr(base64_decode(
            $encryptedData), 0, - (strlen($this->secret) + strlen($this->key)) - 9
        );
    }

}