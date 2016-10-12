## PHP Encrypter

Generates an encrypted hash of 148 byte for max security of data

```php
//Construct the Encrypter.
$encryption = new Encrypter("2a", "MTc2MzMxNDQ4NTdmZDg4Yz", "8");

//or, not args. Use default settings.
$encryption = new Encrypter();

//Generate hash
$hash = $encryption->generate("Hello World!");
//output "JDJhJDA4JE56Y3lNakUyTVRnMU4yWmxPREk1Ti5RdFFlbUhDdTJKS0I5SE1BZjlJdlVOMGZId1RSd1d5MjAwMjE4Njk2OTU3ZmU4Mjk0MmEyOWIwLjkyNTgzMTcyMDBhM3gyMDE2ZW5jcnlwdGVk"

//or, use variables.
$data = "Hello World!";
$hash = $encryption->generate($data);
//output "JDJhJDA4JE56Y3lNakUyTVRnMU4yWmxPREk1Ti5RdFFlbUhDdTJKS0I5SE1BZjlJdlVOMGZId1RSd1d5MjAwMjE4Njk2OTU3ZmU4Mjk0MmEyOWIwLjkyNTgzMTcyMDBhM3gyMDE2ZW5jcnlwdGVk"


```

## Comparable Hashs

Compare if two hashes are equals returning a boolean value

```php
//Data comparable - is hash a "Hello World!"
$hashGenerated = "JDJhJDA4JE56Y3lNakUyTVRnMU4yWmxPREk1Ti5RdFFlbUhDdTJKS0I5SE1BZjlJdlVOMGZId1RSd1d5MjAwMjE4Njk2OTU3ZmU4Mjk0MmEyOWIwLjkyNTgzMTcyMDBhM3gyMDE2ZW5jcnlwdGVk";
$dataComparable = "Welcome";

$equals = $encryption->isEquals($dataComparable, $hashGenerated); //Return false, because "Hello World!" != "Welcome".
$equals = $encryption->isEquals("Hello World!", $hashGenerated); //Return true, because "Hello World!" === "Hello World!".


```

## Exceptions
`InvalidArgumentException` - if arguments not valid.
