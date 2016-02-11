<?php

abstract class Responsibility { // 抽象责任角色
    protected $next; // 下一个责任角色
 
    public function setNext(Responsibility $l) {
        $this->next = $l;
        return $this;
    }
    abstract public function operate(); // 操作方法
}
 
class ResponsibilityA extends Responsibility {
    public function __construct() {}
    public function operate(){
        if (false == is_null($this->next)) {
            $this->next->operate();
            echo 'Res_A start'."<br>";
        }
    }
}

class ResponsibilityB extends Responsibility {
    public function __construct() {}
    public function operate(){
        if (false == is_null($this->next)) {
            $this->next->operate();
            echo 'Res_B start';
        }
    }
}
 
$res_a = new ResponsibilityA();
$res_b = new ResponsibilityB();
$res_a->setNext($res_b);
$res_a->operate();
?>