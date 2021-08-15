<?php
// J:\awww\www\fwphp\glomodul\z_examples\RespectValidation\test.php
// See https://respect-validation.readthedocs.io/en/latest/feature-guide/#feature-guide
//works: require('J:\awww\www\zinc\RespectValidation\vendor\autoload.php') ;
require('J:\awww\www\vendor\RespectValidation\vendor\autoload.php') ;
use Respect\Validation\Validator as v;

echo '<br> 1. Simple validation v::numericVal()->validate($number) : ' ;
$number = 123;
$test = v::numericVal()->validate($number); // true
var_dump($test) ;


echo '<br> 2. Chained validation v::alnum()->noWhitespace()->length(1, 15) : ' ;
$usernameValidator = v::alnum()->noWhitespace()->length(1, 15);
$test = $usernameValidator->validate('alganet11111111111'); // true
var_dump($test) ;


echo '<br> 3. Validating object attributes : ' ;
echo '<br> 4. Validating array keys and values : ' ;
echo '<br> 5. Input optional : ' ;
echo '<br> 6. Negating rules : ' ;
echo '<br> 7. Validator reuse : ' ;
echo '<br> 8. Exception types : ' ;
echo '<br> 9. Informative exceptions : ' ;
echo '<br>10. Getting all messages as an array : ' ;
echo '<br>11. Custom messages : ' ;
echo '<br>12. Validator name : ' ;
echo '<br>13. Zend/Symfony validators : ' ;
echo '<br>14. Validation methods : ' ;


