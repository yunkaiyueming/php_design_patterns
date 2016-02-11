<?php
class sample implements Iterator {
    private $_items ;
 
    public function __construct(&$data) {
        $this->_items = $data;
    }
    public function current() {
        return current($this->_items);
    }
 
    public function next() {
        next($this->_items);   
    }
 
    public function key() {
        return key($this->_items);
    }
 
    public function rewind() {
        reset($this->_items);
    }
 
    public function valid() {                                                                              
        return ($this->current() !== FALSE);
    }
}
 
// client
$data = array(1, 2, 3, 4, 5);
$sa = new sample($data);
foreach ($sa AS $key => $row) {
    echo $key, ' ', $row, '<br />';
}


//Yii FrameWork Demo
class CMapIterator implements Iterator {
/**
* @var array the data to be iterated through
*/
    private $_d;
/**
* @var array list of keys in the map
*/
    private $_keys;
/**
* @var mixed current key
*/
    private $_key;
 
/**
* Constructor.
* @param array the data to be iterated through
*/
    public function __construct(&$data) {
        $this->_d=&$data;
        $this->_keys=array_keys($data);
    }
 
/**
* Rewinds internal array pointer.
* This method is required by the interface Iterator.
*/
    public function rewind() {                                                                                 
        $this->_key=reset($this->_keys);
    }
 
/**
* Returns the key of the current array element.
* This method is required by the interface Iterator.
* @return mixed the key of the current array element
*/
    public function key() {
        return $this->_key;
    }
 
/**
* Returns the current array element.
* This method is required by the interface Iterator.
* @return mixed the current array element
*/
    public function current() {
        return $this->_d[$this->_key];
    }
 
/**
* Moves the internal pointer to the next array element.
* This method is required by the interface Iterator.
*/
    public function next() {
        $this->_key=next($this->_keys);
    }
 
/**
* Returns whether there is an element at current position.
* This method is required by the interface Iterator.
* @return boolean
*/
    public function valid() {
        return $this->_key!==false;
    }
}
 
$data = array('s1' => 11, 's2' => 22, 's3' => 33);
$it = new CMapIterator($data);
foreach ($it as $row) {
    echo $row, '<br />';
}
?>