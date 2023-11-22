<?php

abstract class Dumper
{
    abstract public function dump($data);
}

class WebDumper extends Dumper
{
    public function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}

class ConsoleDumper extends Dumper
{
    public function dump($data)
    {
        var_dump($data);
    }
}

class DumperFactory
{
    const PI = M_PI; //public
    public static function getDumper()
    {
        return PHP_SAPI === 'cli' ? new ConsoleDumper() : new WebDumper();
    }
}
// Static Methods are called statically, DumperFactory::getDumper()
// Class having static members (called static class having all members static) can be used without creating its object, so '$this' cannot be used here, instead "self" is used
$dumper = DumperFactory::getDumper();
$dumper->dump('PHP abstract class is awesome!');
// a constant is defined per class, not per instance of the class, use "self" to reference the constant inside the class
