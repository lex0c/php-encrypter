<?php

include "../src/SMCrypter.php";
$msgCrypt = new SMCrypter();

$originalValue = 65; //A
echo 'Original Value: '.$originalValue;

echo "<br>";

$key = $msgCrypt->keyGenerator();
//$key = 3000000;
//$key = 'VE16Z2pNPT1RTzVn';
echo 'Generated Key: '.$key;

echo "<br>";

$en = $msgCrypt->encode($key, 65);
echo 'Encrypted Value: '.$en;

echo "<br>";

echo 'Decrypted Value: '.$msgCrypt->decode($key, $en);
