<?php
interface State { // 抽象状态角色
    public function handle(Context $context); // 方法示例
}

class ConcreteStateA implements State { // 具体状态角色A
    private static $_instance = null;
    private function __construct() {}
    public static function getInstance() { // 静态工厂方法，返还此类的唯一实例
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateA();
        }
        return self::$_instance;
    }
 
    public function handle(Context $context) {
        echo 'concrete_a'."<br>";
        $context->setState(ConcreteStateB::getInstance());
    }
 
}

class ConcreteStateB implements State { // 具体状态角色B
    private static $_instance = null;
    private function __construct() {}
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateB();
        }
        return self::$_instance;
    }
 
    public function handle(Context $context) {
        echo 'concrete_b'."<br>";
        $context->setState(ConcreteStateA::getInstance());
    }
}

class Context { // 环境角色 
    private $_state;
    public function __construct() { // 默认为stateA
        $this->_state = ConcreteStateA::getInstance();
    }
    public function setState(State $state) {
        $this->_state = $state;
    }
    public function request() {
        $this->_state->handle($this);
    }
}

// client
$context = new Context();
$context->request();
$context->request();
$context->request();
$context->request();
?>