
<?php
// require __DIR__ .'\A\Person.php';     // سواء دي "\"  او "/" عادي مع __DIR__
require __DIR__ .'/A/Person.php';
require __DIR__ .'/B/Person.php';
// require 'Person.php';
// var_dump($x);

// var_dump(__DIR__);


$person = new Person ;
$person2 = new Person ;

$person->name = 'karim';
$person2->name = 'ahmed' ;

$person::$country = 'egypt';
$person2::$country = 'lebnanon' ;




echo Person::MALE  ;
echo "<hr>";
echo $person::FEMALE  ;
// var_dump($person , $person2);


// echo Person::$country = 'Palestine';
// echo "<hr>";
// echo $person::$country;



// echo $person->size;
