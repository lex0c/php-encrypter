<?php


class SMCrypter
{
	private $keyMin = 1000000;
	private $keyMax = 9999999;
    private $key = null;

    public function __construct($key='')
    {
        $this->key = (int) $key;
    }

    public function keyGenerator()
    {
        if($this->key == null):
            $this->key = (int) mt_rand($this->keyMin, $this->keyMax);
            return $this->key;
        endif;

        return $this->key;
    }
    private function keyValidate($key)
    {
        if((is_int($key)) && ($key >= $this->keyMin) && ($key <= $this->keyMax)):
            return true;
        endif;

        return false;
    }

    public function encode($key='', $value)
    {
        return $this->obscure(
            $this->encrypter(
            	$this->keyValidate($key)?$key:$this->key
            	, $value
            )
        );
    }
    public function decode($key='', $value)
    {
    	return $this->decrypter(
    		$this->keyValidate($key)?$key:$this->key
    		, $this->illumin($value)
    	);
    }

    private function encrypter($key='', $value)
    {
	    return (($value*$key)*$key);
    }
    private function decrypter($key='', $value)
    {
	    return (($value/$key)/$key);
    }


    protected function obscure($encryptedData)
    {
        $encryptedData = base64_encode($encryptedData);
        return strrev(
            substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData)).
            substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData)));
    }
    protected function illumin($encryptedData)
    {
        $encryptedData = strrev(
    	    substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData)).
    	    substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData)));
        return base64_decode($encryptedData);
    }

}