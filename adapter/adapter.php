<?php

//对象适配器
interface Target {
    public function sampleMethod1();
    public function sampleMethod2();
}
 
class Adaptee {
    public function sampleMethod1() {
    	echo '#######';
    }
}
 
class Adapter implements Target {
    private $_adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->_adaptee = $adaptee;
    }
 
    public function sampleMethod1() {
    	$this->_adaptee->sampleMethod1(); 
    }
 
    public function sampleMethod2() {
    	echo '!!!!!!!!';
    }
}
 

$adapter = new Adapter(new Adaptee());
$adapter->sampleMethod1();
$adapter->sampleMethod2();


//类适配器
interface Target2 {
    public function sampleMethod1();
    public function sampleMethod2();
}
 
class Adaptee2 { // 源角色
    public function sampleMethod1() {}
}
 
class Adapter2 extends Adaptee2 implements Target2 { // 适配后角色
    public function sampleMethod2() {} 
}

$adapter = new Adapter2();
$adapter->sampleMethod1();
$adapter->sampleMethod2(); 
?>