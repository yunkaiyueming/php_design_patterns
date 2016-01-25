<?php

class Product { // 产品本身
    private $_parts; 
    public function __construct() { $this->_parts = array(); } 
    public function add($part) { return array_push($this->_parts, $part); }
}
 
abstract class Builder { // 建造者抽象类
    public abstract function buildPart1();
    public abstract function buildPart2();
    public abstract function getResult();
}
 
class ConcreteBuilder extends Builder { // 具体建造者
    private $_product;
    public function __construct() { $this->_product = new Product(); }
    public function buildPart1() { $this->_product->add("Part1"); } 
    public function buildPart2() { $this->_product->add("Part2"); }
    public function getResult() { return $this->_product; }
}
 
class Director { //导演者
    public function __construct(Builder $builder) {
        $builder->buildPart1();
        $builder->buildPart2();
    }
}

// client 
$buidler = new ConcreteBuilder();
$director = new Director($buidler);
$product = $buidler->getResult();
var_dump($product);
?>