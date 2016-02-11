<?php

class Button{}
class Border{}
class MacButton extends Button{}
class WinButton extends Button{}
class MacBorder extends Border{}
class WinBorder extends Border{}

interface AbstractFactory {
    public function CreateButton();
    public function CreateBorder();
}

class MacFactory implements AbstractFactory{
    public function CreateButton(){ return new MacButton(); }
    public function CreateBorder(){ return new MacBorder(); }
}

class WinFactory implements AbstractFactory{
    public function CreateButton(){ return new WinButton(); }
    public function CreateBorder(){ return new WinBorder(); }
}

?>