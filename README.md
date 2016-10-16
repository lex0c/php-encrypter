## PHP Encrypter

Generates an encrypted hash of 108 byte for max security of data

```php
//Construct the Encrypter.
$encryption = new Encrypter("2a", "MTc2MzMxNDQ4NTdmZDg4Yz", "8");

//or, not args. Use default settings.
$encryption = new Encrypter();

//Generate hash
$hash = $encryption->generate("Hello World!");
//output "UlaBJjY5VjNZZlRQlFbOdUVupVUTZkQ4xUMCp1UDVTbjhUS0QlRwFjSEpEaKRUQ0oUR1UkWzA3TlxWVwQlbwZUTwUTVaNDZO1EbWNzVXZVM"

//or, use variables.
$data = "Hello World!";
$hash = $encryption->generate($data);
//output "UlaBJjY5VjNZZlRQlFbOdUVupVUTZkQ4xUMCp1UDVTbjhUS0QlRwFjSEpEaKRUQ0oUR1UkWzA3TlxWVwQlbwZUTwUTVaNDZO1EbWNzVXZVM";


```

## Comparable Hashs

Compare if two hashes are equals returning a boolean value

```php
//Data comparable - is hash a "Hello World!"
$hashGenerated = "UlaBJjY5VjNZZlRQlFbOdUVupVUTZkQ4xUMCp1UDVTbjhUS0QlRwFjSEpEaKRUQ0oUR1UkWzA3TlxWVwQlbwZUTwUTVaNDZO1EbWNzVXZVM";
$dataComparable = "Welcome";

$equals = $encryption->isEquals($dataComparable, $hashGenerated); //Return false, because "Hello World!" !== "Welcome".
$equals = $encryption->isEquals("Hello World!", $hashGenerated); //Return true, because "Hello World!" === "Hello World!".


```

## Exceptions
`InvalidArgumentException` - if arguments not valid.
