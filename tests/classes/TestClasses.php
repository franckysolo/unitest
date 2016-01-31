<?php
namespace tests\classes;
use Unitest\Test;
use tests\classes\MyClassToTest;

class TestClasses extends Test {
    
    /**
     *  The class to test
     *  
     * @var object
     */
    protected $class;
    
    /**
     * Init the test
     * 
     * {@inheritDoc}
     * @see \Unitest\Test::init()
     */
    public function init() {
        $this->setTitle('My first test with unitest');
    }
    
    /**
     * Run your test
     * 
     * {@inheritDoc}
     * @see \Unitest\Test::run()
     */
    public function run() {
        
        // We want to test the MyClassToTest class
        // so we create an instance
        $this->class = new MyClassToTest();
        
        // testing the assertion with the instance create
        $this->assert (
            'Create an instance of MyClassToTest', // the assertion label
            $this->class instanceof MyClassToTest  // the assertion status
        );
    }
}