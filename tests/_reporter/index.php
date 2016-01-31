<?php
/**
 * @category PHP Unit Test - Simple Unit Test for PHP
 * @version 1.0.0
 * @author franckysolo <franckysolo@gmail.com>
 * @license http://creativecommons.org/licenses/by-sa/3.0/  CC BY-SA 3.0
 * @package UnitTest
 * @filesource  index.php
 */

// Bootstrap test file

// First require autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// Call uses
use Unitest\Series;
use Unitest\Reporter;

// Defined your test series
$serie = new Series(array(
    'tests\classes\TestClasses',
    // 'tests\functions\FunctionsTest', //... Another functions test 
    'tests\MyTest', //... Another class test
));

// {@see Reporter}
// Run and render it
Reporter::newInstance()->render($serie->run());
