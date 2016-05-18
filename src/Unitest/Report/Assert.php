<?php
/**
 * Unitest (PHP Unit Test)
 *
 * @version 0.1.0
 * @author franckysolo <franckysolo@gmail.com>
 */
namespace Unitest\Report;
/** 
 * @category PHP Unit Test - Simple Unit Test for PHP
 * @version 0.1.0
 * @author franckysolo <franckysolo@gmail.com>
 * @license MIT
 * @package Unitest
 * @filesource  Assert.php
 */
class Assert 
{
    /**
     * The label of the assertion
     * 
     * @var string
     */
    protected $label;
    
    /**
     * The status of the assertion
     * 
     * @var boolean
     */
    protected $status = true;
    
    /**
     * The file of the assertion
     * 
     * @var string
     */
    protected $file;

    /**
     * The line of the assertion
     * 
     * @var int
     */
    protected $line;
    
    /**
     * The execution time
     * 
     * @var float
     */
    protected $timestamp;

	/**
	 * Class Constructor
	 * 
	 * @param string    $label        the label
	 * @param boolean   $status       the status  
	 * @param string    $file         the file 
	 * @param int       $line         the line 
	 * @param float     $timestamp    the execution time
	 */
	public function __construct($label, $status, $file, $line, $timestamp)
	{
		$this->setLabel($label);
		$this->setStatus($status);
		$this->setLine($line);
		$this->setFile($file);
		$this->setTimestamp($timestamp);
	}

    /**
     * Gets the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Sets the value of label.
     *
     * @param string $label the label
     * @return Unitest\Report\Assert
     */
    public function setLabel($label)
    {
        $this->label = (string) $label;
        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param boolean $status the status
     * @return Unitest\Report\Assert
     */
    public function setStatus($status)
    {
        $this->status = (bool) $status;
        return $this;
    }

    /**
     * Gets the value of file.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the value of file.
     *
     * @param string $file the file
     * @return Unitest\Report\Assert
     */
    public function setFile($file)
    {
        $this->file = (string) $file;
        return $this;
    }

    /**
     * Gets the value of line.
     *
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Sets the value of line.
     *
     * @param int $line the line
     * @return Unitest\Report\Assert
     */
    public function setLine($line)
    {
        $this->line = (int) $line;
        return $this;
    }

    /**
     * Gets the value of timestamp.
     *
     * @return float
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Sets the value of timestamp.
     *
     * @param float $timestamp the timestamp
     * @return Unitest\Report\Assert
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}