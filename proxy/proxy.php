<?php
abstract class Subject { // 抽象主题角色
    abstract public function action();
}

class RealSubject extends Subject { // 真实主题角色
    public function __construct() {}
    public function action() {}
}

class ProxySubject extends Subject { // 代理主题角色
    private $_real_subject = NULL;
    public function __construct() {}

    public function action() {
        $this->_beforeAction();
        if (is_null($this->_real_subject)) {
            $this->_real_subject = new RealSubject();
        }
        $this->_real_subject->action();
        $this->_afterAction();
    }

    private function _beforeAction() {
        echo '在action前,我想干点啥....';
    }

    private function _afterAction() {
         echo '在action后,我还想干点啥....';
    }
}

// client
$subject = new ProxySubject();
$subject->action();

?>