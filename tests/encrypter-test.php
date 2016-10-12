<?php

require_once ("../src/Encrypter.php");


$data = "Hello World";
$tag = "<?php phpinfo(); ?>"; //Safety against scripts injections.

$hash = new Encrypter();
$encryptedData = $hash->generate($data);
var_dump($encryptedData);

$out = $hash->isEquals($data, $encryptedData);
var_dump($out);
