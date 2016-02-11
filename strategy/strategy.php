<?php
interface Strategy { // 抽象策略角色，以接口实现
    public function do_method(); // 算法接口
}

class ConcreteStrategyA implements Strategy { // 具体策略角色A 
    public function do_method() {
        echo 'do method 1';
    }
}

class ConcreteStrategyB implements Strategy { // 具体策略角色B 
    public function do_method() {
        echo 'do method 2';
    }
}

class ConcreteStrategyC implements Strategy { // 具体策略角色C
    public function do_method() {
        echo 'do method 3';
    }
}


class Question{ // 环境角色
    private $_strategy;

    public function __construct(Strategy $strategy) {
        $this->_strategy = $strategy;
    } 
    public function handle_question() {
        $this->_strategy->do_method();
    }
}
 
// client
$strategyA = new ConcreteStrategyA();
$question = new Question($strategyA);
$question->handle_question();

$strategyB = new ConcreteStrategyB();
$question = new Question($strategyB);
$question->handle_question();

$strategyC = new ConcreteStrategyC();
$question = new Question($strategyC);
$question->handle_question();
?>