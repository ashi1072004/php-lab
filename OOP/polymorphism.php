<?php
// Using Abstract class
abstract class Person
{
    abstract public function greet();
}
// Using Interface
interface Greeting
{
    public function greet();
}
// ...
class English extends Person
{
    public function greet()
    {
        return 'Hello!';
    }
}

class German extends Person
{
    public function greet()
    {
        return 'Hallo!';
    }
}

class French extends Person
{
    public function greet()
    {
        return 'Bonjour!';
    }
}
class Turkish implements Greeting
{
    public function greet()
    {
        return 'Merhaba!';
    }
}

function greeting($people)
{
    foreach ($people as $person) {
        echo $person->greet() . '<br>';
    }
}

$people = [
    new English(),
    new German(),
    new French(),
    new Turkish()
];
greeting($people);
