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
 * @package UnitTest
 * @filesource  Series.php
 */
class Series 
{
    /**
     * The array of test cases
     * 
     * @var array
     */
    protected $cases = array();
    
    /**
     * 
     * @param array $cases
     */
    public function __construct(array $cases = array()) {
        $this->cases = $cases;
    }
    
    /**
     * Run all test cases
     */
    public function run() {
        
        $report = new Report();
        
        foreach ($this->cases as $case) {
            
            $result = $report->newResult($case);
            ob_start(); 
            try {
                
                $unitest = new $case($result);
                $unitest->init();               
                $unitest->run();
                
            } catch (\Exception $e) {
                $result->setException($e);
            }
            
            $result->setOutput(ob_get_clean());
        }
                
        return $report;
    }
}