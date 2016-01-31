<?php
namespace tests\classes;
/**
 * 
 * @author franckysolo
 * @desc : example test
 */
class MyClassToTest
{
    /**
     *  A string message
     *  
     * @var string
     */
    protected $message;
    
    /**
     *  An int value
     *  
     *  @var int
     */
    protected $value;
    
    /**
     * A boolean parameter
     * 
     * @var boolean
     */
    protected $bool = false;

    /**
     *
     * @return the string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * 
     * @param string $message
     * @return \tests\classes\MyClassToTest
     */
    public function setMessage($message) {
        $this->message = (string) $message;
        return $this;
    }

    /**
     *
     * @return the int
     */
    public function getValue() {
        return $this->value;
    }

    /**
     *
     * @param  $value
     */
    public function setValue($value) {
        $this->value = (int) $value;
        return $this;
    }

    /**
     * 
     * @return boolean
     */
    public function getBool() {
        return $this->bool;
    }

    /**
     *
     * @param boolean $bool
     * @return \tests\classes\MyClassToTest
     */
    public function setBool($bool) {
        $this->bool = (bool) $bool;
        return $this;
    }
 
}