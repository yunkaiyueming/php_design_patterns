<?php
abstract class Resources{
	public $resource=null;

	abstract public function operate();
}

class unShareFlyWeight extends Resources{
	public function __construct($resource_str) {
        $this->resource = $resource_str;
    }

    public function operate(){
    	echo $this->resource."<br>";
    }
}

class shareFlyWeight extends Resources{
	private $resources = array();

    public function get_resource($resource_str){
    	if(isset($this->resources[$resource_str])) {
		    return $this->resources[$resource_str];
		}else {
		    return $this->resources[$resource_str] = $resource_str;
		}
    }

	public function operate(){
		foreach ($this->resources as $key => $resources) {
			echo $key.":".$resources."<br>";
		}
	}
}

 
// client
$flyweight = new shareFlyWeight();
$flyweight->get_resource('a');
$flyweight->operate();

$flyweight->get_resource('b');
$flyweight->operate();

$flyweight->get_resource('c');
$flyweight->operate();

// 不共享的对象，单独调用
$uflyweight = new unShareFlyWeight('A');
$uflyweight->operate();

$uflyweight = new unShareFlyWeight('B');
$uflyweight->operate();