<?php

include "../src/SMCrypter.php";


$msgCrypt = new SMCrypter();

$key = $msgCrypt->keyGenerator();
var_dump($key);

$en = $msgCrypt->encode($key, 999);
var_dump($en);

echo "<br>";
var_dump($msgCrypt->decode($key, $en));
