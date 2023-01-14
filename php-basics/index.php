<?php

// arithmetic operator

// $x = 3;

// $x = $x + 5;

// echo $x;//?????


//comparison operator -> boolean

// == === > < >= <= != !==


// $total_price = "800000"; //user web input -> string

// var_dump($total_price === 800000);//true
// == -> data type ignore
// === -> data type force check

// $x = 5;
// $y = 5;

// var_dump($y >= $x);//true

//increment decrement

// $x = 10;

// $x++;
// $x--;

// echo $x; //9


// and,or,not
// && , ||, !

// $person1 = [
//     'name' => 'mgmg',
//     'age' => 20
// ];
// $person2 = [
//     'name' => 'aungaung',
//     'age' => 22
// ];

// var_dump($person1['age'] < $person2['age'] && $person1['name'] === 'mgmg');//true

// var_dump(!true);//true

// $x = 10;
// ++$x;//11 //prefix
// $x++;//11 //postfix
// //11


//Function

//statement
// function getBirthYear($age)
// {
//     return 2023 - $age; //1993
// }
// echo getBirthYear(30);

//expression
//  10;

//function expression, anonymous function
// $getBirthYear = function ($age) {
//     return 2023 - $age;
// };

// echo $getBirthYear(20);

//callback function
// function test($name, $userAction)
// {
//     echo $userAction($name);
// }

// test('Aung Aung', function ($name) {
//     return 'Mg' . $name;
// });


// foreach -> array looping

// $products  = [
//     'product 1' => [
//         'name' => 'Iphone',
//         'price' => '100000'
//     ],
//     'product 2' => [
//         'name' => 'Samsung',
//         'price' => '200000'
//     ]
// ];

//foreach with value

// foreach ($products as $product) {
//     echo $product['name'] . '-> price - ' . $product['price'] . "<br>";
// }


//foreach with  key and value

// foreach ($products as $key => $product) {
//     echo $key . "<br>";
//     echo $product['name'] . '-> price - ' . $product['price'] . "<br>";
// }

// Iphone -> price - 100000
// Samsung -> price - 200000

// $names = [
//     'name 1' => 'hlaing min than',
//     'name 2 ' => 'mg mg',
//     'name 3' => 'aung aung'
// ];

// foreach ($names as  $name) {
//     echo $name;
// }

// PHP Class

class Car
{
    private $wheels = 4;
    private $name; // lambo ,mark2

    public function __construct($name)
    {
        $this->buildEngine();
        $this->name = $name;
    }

    public function drive()
    {
        return $this->name . " is driving <br>";
    }

    public function getWheels()
    {
        return $this->wheels;
    }

    public function setWheels($wheels)
    {
        $this->wheels = $wheels;
    }

    public function buildEngine()
    {
        echo 'Engine is building<br>';
    }
}

class Truck extends Car
{
}

$truck = new Truck("Truck");
echo $truck->drive();

// $car = new Car('Lambohghini'); //create
// echo $car->drive();


// $child = new Child;
// echo $child->play();

// $parents = new Parents;
// echo $parents->play();
