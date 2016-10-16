<?php


class SMCrypter
{
    private $keyValueMin = "RE13QVRNPT1BTXdB";
    private $keyValueMax = "VE81a1RPPT1RTzVr";
    private $key = null;

    public function __construct()
    {}

    public function keyGenerator()
    {
        if($this->key == null):
            $this->key = $this->obscure(
            	(int) mt_rand(
            	    $this->illumin($this->keyValueMin), 
            	    $this->illumin($this->keyValueMax)
            	)
            );
            return $this->key;
        endif;

        return $this->key;
    }

    public function encode($key='', $value)
    {
        return $this->encrypter(
            $this->illumin((string) trim(htmlentities(strip_tags($key)))), 
            (int) trim(htmlentities(strip_tags($value)))
        );
    }

    public function decode($key='', $value)
    {
    	return $this->decrypter(
    		$this->illumin((string) trim(htmlentities(strip_tags($key)))),
    	    (int) trim(htmlentities(strip_tags($value)))
    	);
    }

    private function encrypter($key='', $value)
    {
	    return ((($value*$key)*$key)/$key);
    }

    private function decrypter($key='', $value)
    {
	    return ((($value/$key)/$key)*$key);
    }

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