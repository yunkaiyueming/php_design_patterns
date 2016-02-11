<?php

interface Prototype { public function copy(); }
 
class ConcretePrototype implements Prototype{
    private  $_name;
    public function __construct($name) { $this->_name = $name; } 
    public function copy() { return clone $this;}
}
 
class Demo {}
 
// client
 
$demo = new Demo();
$object1 = new ConcretePrototype($demo);
$object2 = $object1->copy();
?>