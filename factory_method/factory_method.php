<?php

class Button{/* ...*/}
class WinButton extends Button{/* ...*/}
class MacButton extends Button{/* ...*/}

interface ButtonFactory{
    public function createButton($type);
}

class MyButtonFactory implements ButtonFactory{
    // 实现工厂方法
    public function createButton($type){
        switch($type){
            case 'Mac':
                return new MacButton();
            case 'Win':
                return new WinButton();
        }
    }
}


$button_obj = new MyButtonFactory();
var_dump($button_obj->createButton('Mac'));
var_dump($button_obj->createButton('Win'));
?>