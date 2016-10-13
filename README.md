## PHP Encrypter

Generates an encrypted hash of 80 byte for max security of data

```php
//Construct the Encrypter.
$encryption = new Encrypter("2a", "MTc2MzMxNDQ4NTdmZDg4Yz", "8");

//or, not args. Use default settings.
$encryption = new Encrypter();

//Generate hash
$hash = $encryption->generate("Hello World!");
//output "QXgvU3hMdW9UcHhJRUl1ckNzV1loY1BFMFJka2hxJDJhJDA4JE1URXhOemcwTXpRMk1qVTNabVprTWVn"

//or, use variables.
$data = "Hello World!";
$hash = $encryption->generate($data);
//output "QXgvU3hMdW9UcHhJRUl1ckNzV1loY1BFMFJka2hxJDJhJDA4JE1URXhOemcwTXpRMk1qVTNabVprTWVn"


```

## Comparable Hashs

Compare if two hashes are equals returning a boolean value

```php
//Data comparable - is hash a "Hello World!"
$hashGenerated = "QXgvU3hMdW9UcHhJRUl1ckNzV1loY1BFMFJka2hxJDJhJDA4JE1URXhOemcwTXpRMk1qVTNabVprTWVn";
$dataComparable = "Welcome";

$equals = $encryption->isEquals($dataComparable, $hashGenerated); //Return false, because "Hello World!" !== "Welcome".
$equals = $encryption->isEquals("Hello World!", $hashGenerated); //Return true, because "Hello World!" === "Hello World!".


```

## Exceptions
`InvalidArgumentException` - if arguments not valid.
