<?php
/**
 * Unitest (PHP Unit Test)
 *
 * @version 1.0.0
 * @author franckysolo <franckysolo@gmail.com>
 */
namespace Unitest;
/** 
 * @category PHP Unit Test - Simple Unit Test for PHP
 * @version 1.0.0
 * @author franckysolo <franckysolo@gmail.com>
 * @license http://creativecommons.org/licenses/by-sa/3.0/  CC BY-SA 3.0
 * @package Unitest
 * @filesource  Result.php
 */
class Result
{
    /**
     * The string class name
     *
     * @var string
     */
    protected $name;
    
    /**
     * The Test title
     *
     * @var string
     */
    protected $title;
    
    /**
     * Assertions for the test
     *
     * @var array
     */
    protected $assertions = array();
    
    /**
     * The number of assertions failed
     *
     * @var int
     */
    protected $failed = 0;
    
    /**
     *  The test output
     *
     * @var string
     */
    protected $output;
    
    /**
     * Exception test
     *
     * @var Exception
     */
    protected $exception;
    
    /**
     * Add an assertion to the test
     * 
     * @param string $label
     * @param boolean $status
     * @param string $filename
     * @param int $line
     * @throws \RuntimeException
     * @return \Unitest\Result
     */
    public function assert($label, $status, $filename, $line)
    {
        if (! function_exists('xdebug_time_index')) {
            $message = "Xdebug is required to use Unitest";
            throw new \RuntimeException($message, 500);
        }
        
        if (false === $status) {
            ++$this->failed;
        }
        
        $this->assertions[] = new Assert (
            $label, 
            $status, 
            $filename, 
            $line, 
            xdebug_time_index()
        );
        
        return $this;
    }
    
    /**
     * Add a title to the test
     * 
     * @param string $title
     * @return \Unitest\Report\Result
     */
    public function addTitle($title) {
        $this->title = (string) $title;
        return $this;
    }
    
    /**
     * Sets the test output
     * 
     * @param string $output
     * @return \Unitest\Report\Result
     */
    public function setOutput($output) {
        $this->output = (string) $output;
        return $this;
    }
    
    /**
     * Sets raised exception
     * 
     * @param Exception $exception
     * @return \Unitest\Report\Result
     */
    public function setException(\Exception $exception) {
        $this->exception = $exception;
        return $this;
    }
    
    /**
     * Returns the name of class Test
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Returns the test status
     * 
     * @return boolean
     */
    public function getStatus() {
    
        if (0 === $this->failed) {
            return true;
        }
         
        return false;
    }
    
    /**
     * Returnes the test title
     * 
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * Returns the test output
     * 
     * @return string
     */
    public function getOutput() {
        return $this->output;
    }
    
    /**
     * Returns the exception raised
     * 
     * @return \Exception
     */
    public function getException() {
        return $this->exception;
    }
    
    /**
     * Returns the array of assertions
     * 
     * @return array
     */
    public function getAssertions() {
        return $this->assertions;
    }
}