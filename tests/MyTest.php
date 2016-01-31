<?php
namespace tests;

use Unitest\Test;

class MyTest extends Test {
    
    protected $data = array();
    
    public function init() {
        
        $this->setTitle('Simple example testing data array');
                
        $this->data = array (
            'PHP',
            'JavaScript',
            'HTML'
        );
    }
    
    public function run() {
        
        #1 - assertion
        $actual     = count($this->data);
        $expected   = 3;
        $this->assert('Count array elements', $actual === $expected);
        
        #2 - assertion with output
        $pop = array_pop($this->data);
        $actual     = count($this->data);
        $expected   = 2;
        $this->assert('Pop an element and count', $actual === $expected);
        echo $pop;
        
        #3 - assertion with an exception for example
        $this->assert('Raised an exception', false);
        $iterator = new \ArrayIterator('exception raised');
        
    }
}
