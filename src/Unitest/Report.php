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