<?php
class Camera {
    public function turnOn() {}
    public function turnOff() {}
    public function rotate($degrees) {}
}
 
class Light {
    public function turnOn() {}
    public function turnOff() {}
    public function changeBulb() {}
}
 
class Sensor {
    public function activate() {}
    public function deactivate() {}
    public function trigger() {}
}
 
class Alarm {
    public function activate() {}
    public function deactivate() {}
    public function ring() {}
    public function stopRing() {}
}
 
class SecurityFacade {
    private $_camera1, $_camera2;
    private $_light1, $_light2, $_light3;
    private $_sensor;
    private $_alarm;
 
    public function __construct() {
        $this->_camera1 = new Camera();
        $this->_camera2 = new Camera();
 
        $this->_light1 = new Light();
        $this->_light2 = new Light();
        $this->_light3 = new Light();
 
        $this->_sensor = new Sensor();
        $this->_alarm = new Alarm();
    }
 
    public function activate() {
        $this->_camera1->turnOn();
        $this->_camera2->turnOn();
 
        $this->_light1->turnOn();
        $this->_light2->turnOn();
        $this->_light3->turnOn();
 
        $this->_sensor->activate();
        $this->_alarm->activate();
    }
 
    public  function deactivate() {
        $this->_camera1->turnOff();
        $this->_camera2->turnOff();
 
        $this->_light1->turnOff();
        $this->_light2->turnOff();
        $this->_light3->turnOff();
 
        $this->_sensor->deactivate();
        $this->_alarm->deactivate();
    }
}
 
 
//client 
$security = new SecurityFacade();
$security->activate();
?>