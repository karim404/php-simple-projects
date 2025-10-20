<?php



class Person 
{
    const MALE = 'm' ;
    const FEMALE = 'f' ;

    public static $country = 'unknown country'  ;
    public  $name = 'unkown name' ;

    private $gender ;
    protected $age ;



    public function __construct ()
    {

        var_dump (__CLASS__)  ;
    }

    public function setAge($age)
    {
        $this->age = $age ;
    }


    public function getAge()
    {
         return $this->age ;
    }



}

$person = new Person ; 

$person->setAge(50);
 echo "<br>";
 echo $person->getAge() ;



// A::$country = 'usa';
// echo (Person::$country ='usa');

//  $person = new Person ;
//  $person->size = 'c';
// //  echo $a->size ;

// $x = Person::$country = 'uk ';
// echo "<br>";
// Person::$country = 'netherlands';



// echo $x;

// $A = new self


// echo "hello";