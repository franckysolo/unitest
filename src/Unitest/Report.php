<?php
/**
 * Unitest (PHP Unit Test)
 *
 * @version 0.1.0
 * @author franckysolo <franckysolo@gmail.com>
 */
namespace Unitest;
use Unitest\Report\Result;
/** 
 * @category PHP Unit Test - Simple Unit Test for PHP
 * @version  0.1.0
 * @author franckysolo <franckysolo@gmail.com>
 * @license MIT
 * @package Unitest
 * @filesource  Report.php
 */
class Report
{
    /**
     * The report results
     *
     * @var array
     */
    protected $results = array();

    /**
     * Add e new result for test case
     *
     * @param string $case the name of the case
     * @return \Unitest\Report\Result
     */
    public function newResult($case) {
        return $this->results[] = new Result($case);
    }

    /**
     * Get the report results
     *
     * @return array
     */
    public function getResults() {
        return $this->results;
    }

    /**
     * Get the total count of test case
     *
     * @return number
     */
    public function getTotalCount() {
        return count($this->results);
    }

    /**
     * Get the count of test passed
     *
     * @return number
     */
    public function getSuccessCount() {
        
        $count = 0;

        foreach ($this->results as $result) {
            if (0 === $result->getFailed()) {
                ++$count;
            }
        }
         
        return $count;
    }
}