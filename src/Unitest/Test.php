<?php
/**
 * Unitest (PHP Unit Test)
 *
 * @version 1.0.0
 * @author franckysolo <franckysolo@gmail.com>
 */
namespace Unitest;
use Unitest\Report\Result;
/**
 * @category PHP Unit Test - Simple Unit Test for PHP
 * @version 1.0.0
 * @author franckysolo <franckysolo@gmail.com>
 * @license http://creativecommons.org/licenses/by-sa/3.0/  CC BY-SA 3.0
 * @package Unitest
 * @filesource  Test.php
 */
abstract class Test {
    
    /**
     * The Result of test case
     *
     * @var Result
     */
    protected $result;
    
    /**
     *
     * @param Result $result
     */
    public function __construct(Result $result) {
        $this->result = $result;
    }
    
    /**
     * Add an assertion to test case
     *
     * @param string $label
     * @param boolean $status
     * @return \Unitest\Test
     */
    public function assert($label, $status) {
    
        if (! function_exists('debug_backtrace')) {
            $message = "debug_backtrace() PHP functions is required to run Unitest";
            throw new \RuntimeException($message, 500);
        }
        
        $data = current(debug_backtrace());
        $this->result->assert($label, $status, $data['file'], $data['line']);
    
        return $this;
    }
    
    /**
     * Set the test case title
     *
     * @param string $title
     * @return \Unitest\Test
     */
    public function setTitle($title) {
        $this->result->addTitle($title);
        return $this;
    }
    
    /**
     * Initialize the test case, override method
     * 
     * @return void
     */
    public function init() {}
    
    /**
     * Run the test case
     *
     * @return void
     */
    abstract public function run();
}