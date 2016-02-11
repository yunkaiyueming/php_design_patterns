<?php
abstract class Mediator { // 中介者角色
    abstract public function send($message,$colleague); 
} 

abstract class Colleague { // 抽象对象
    private $_mediator = null; 
    public function __construct($mediator) { 
        $this->_mediator = $mediator; 
    } 
    public function send($message) { 
        $this->_mediator->send($message,$this); 
    } 
    abstract public function notify($message); 
} 

class ConcreteMediator extends Mediator { // 具体中介者角色
    private $_colleague1 = null; 
    private $_colleague2 = null; 
    public function send($message,$colleague) {
        //echo $colleague->notify($message);
        if($colleague == $this->_colleague1) { 
            $this->_colleague1->notify($message); 
        } else { 
            $this->_colleague2->notify($message); 
        } 
    }
    public function set($colleague1,$colleague2) { 
        $this->_colleague1 = $colleague1; 
        $this->_colleague2 = $colleague2; 
    } 
} 

class Colleague1 extends Colleague { // 具体对象角色
    public function notify($message) {
        echo 'colleague1：'.$message."<br>";
    } 
} 

class Colleague2 extends Colleague { // 具体对象角色
    public function notify($message) { 
        echo 'colleague2：'.$message."<br>";
    } 
} 

// client
$objMediator = new ConcreteMediator(); 
$objC1 = new Colleague1($objMediator); 
$objC2 = new Colleague2($objMediator); 
$objMediator->set($objC1,$objC2); 
$objC1->send("to c2 from c1"); 
$objC2->send("to c1 from c2"); 
?>