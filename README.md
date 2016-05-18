# Unit Test for PHP

Unitest is a simple unit test micro-framework for PHP.   
 Can be use on small application development,  
 Provide a smart HTML rendering,   
 Using Jquery and Bootstrap.

# Requirements

- PHP >= 5.4
- Xdebug extension active

# Installation
```
composer require franckysolo/unitest
```

# Usage
The tests directory in your project will contains all your application tests.  
Create some tests and then browse your project to display the reporter:  
    `http://localhost/your-project/tests/_reporter`  
You can create your own rendering page, an example is provided in the _reporter directory.

The bootstrap index.php file to run all tests

```php
<?php
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
    // 'tests\MyTest', //... Another class test
));

// {@see Reporter}
// Run and render it
Reporter::newInstance()->render($serie->run());
?>
```

A simple test example :

```php
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
```
# HTML Smart Rendering

![Screen shot](/images/screen-shot.png)
