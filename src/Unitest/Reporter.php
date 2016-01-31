<?php
namespace Unitest;

class Reporter
{
    /**
     * Default language
     *
     * @var string
     */
    protected static $lang = 'fr_FR.UTF-8';
    
    /**
     *  The path to translations
     *  
     * @var string
     */
    protected static $i18nPath = '../languages/';
    

    /**
     * The domain name for translation
     *
     * @var string
     */
    protected $domain = 'unitest';

    /**
     * The class to display
     *
     * @var object
     */
    protected $class;
    
    
    protected $defaultScriptPath = '';
    
    
    /**
     * Build a new reporter html render 
     */
    protected function __construct() {
        putenv('LC_ALL=' . self::$lang);
        setlocale (LC_ALL, self::$lang);
        bindtextdomain ($this->domain,  self::$i18nPath);
        textdomain ($this->domain);
    }

    /**
     * set the api language
     * 
     * @param string $lang
     */
    public static function setLanguage($lang, $path = null) {
        self::$lang = $lang;
        if (null !== $path 
            && is_dir($path) 
            && is_readable($path)) {
            self::$i18nPath = $path;
        }
    }

    /**
     * Create a new reporter
     *
     * @return \Unitest\Reporter
     */
    public static function newInstance() {
        return new self;
    }

    /**
     * Translate text
     *
     * @param string $message
     */
    public function translate($message) {
        return gettext($message);
    }
     
    /**
     * Render a class object to html view
     *
     * @param object $class
     * @param string $options [type, script_path]
     * @return void
     */
    public function render($class, $options = null) {

        $this->class = $class;

        $filename = array();

        if (null == $options) {
            $options = array();
        }
       
        if (! isset($options['type'])) {
            $options['type'] = '.phtml';
        }
        
        if (isset($options['script_path'])) {
            $filename[] = $options['script_path'];
        } 
        
        $reflexion  = new \ReflectionClass(get_class($class));       
        $file       = strtolower($reflexion->getShortName());
        

        $filename[] =  $file . $options['type'];
        
        
        
        if (count($filename) == 1) {
            $script =  current($filename);
        } else {
            $script = join(DIRECTORY_SEPARATOR, $filename);
        }
                        
        include $script;
    }

    /**
     * Render a child class view
     *
     * @param object $class
     * @param string $options
     * @return void
     */
    public function renderChild($class, $options = null) {
        Reporter::newInstance()->render($class, $options);
    }
     
    /**
     * Filter string view params
     *
     * @param string $string
     * @param string $callback
     * @return string
     */
    public function filter($string, $callback = null) {

        if (null == $callback) {
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        }

        if (is_callable($callback)) {
            return $callback($string);
        }
    }

    /**
     * Normalize namespaces to file path
     *
     * @param string $string
     * @return mixed
     */
    public function normalize($string) {
        return str_replace('\\', '/', $string);
    }
     
    /**
     * Call a method
     *
     * @param string $method
     * @param mixed $args
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function __call($method, $args) {

        if (! method_exists($this->class, $method)) {
            $message = sprintf('Undefined method %s on %s', $method, get_class($this->class));
            throw new \InvalidArgumentException($message, 500);
        }

        return call_user_func_array(array($this->class, $method), $args);
    }

    /**
     * Get a param
     *
     * @param string $name
     * @throws \InvalidArgumentException
     */
    public function __get($name) {

        if (! property_exists($this->class, $name)){
            $message = sprintf('Undefined property %s on %s', $name, get_class($this->class));
            throw new \InvalidArgumentException($message, 500);
        }

        return $this->class->$name;
    }
}