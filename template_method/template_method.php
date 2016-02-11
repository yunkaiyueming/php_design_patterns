<?php
abstract class AbstractClass { // 抽象模板角色
    public function templateMethod() { // 模板方法 调用基本方法组装顶层逻辑
        $this->primitiveOperation1();
        $this->primitiveOperation2();
    }
    abstract protected function primitiveOperation1(); // 基本方法
    abstract protected function primitiveOperation2();
}

class ConcreteClass extends AbstractClass { // 具体模板角色
    protected function primitiveOperation1() {}
    protected function primitiveOperation2(){}
 
}
 
$class = new ConcreteClass();
$class->templateMethod();
?>