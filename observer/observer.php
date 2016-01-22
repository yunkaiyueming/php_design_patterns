
<?php

    interface IObserver{
        function onSendMsg( $sender, $args );
        function getName();
    }

    interface IObservable{
        function addObserver( $observer );
    }

    class UserList implements IObservable{
        private $_observers = array();

        public function sendMsg( $name ){
            foreach( $this->_observers as $obs ){
                $obs->onSendMsg( $this, $name );
            }
        }

        public function addObserver( $observer ){
            $this->_observers[]= $observer;
        }

        public function removeObserver($observer_name) {
            foreach($this->_observers as $index => $observer) {
                if ($observer->getName() === $observer_name) {
                    array_splice($this->_observers, $index, 1);
                    return;
                }
            }
        }
    }

    class UserListLogger implements IObserver{
        public function onSendMsg( $sender, $args ){
            echo( "'$args' send to UserListLogger\n" );
        }

        public function getName(){
            return 'UserListLogger';
        }
    }

    class OtherObserver implements IObserver{
        public function onSendMsg( $sender, $args ){
            echo( "'$args' send to OtherObserver\n" );
        }

        public function getName(){
            return 'OtherObserver';
        }
    }


    $ul = new UserList();//被观察者
    $ul->addObserver( new UserListLogger() );//增加观察者
    $ul->addObserver( new OtherObserver() );//增加观察者
    $ul->sendMsg( "Jack" );//发送消息到观察者

    $ul->removeObserver('UserListLogger');//移除观察者
    $ul->sendMsg("hello");//发送消息到观察者
?>