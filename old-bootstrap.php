<?php

class Ps4Autoloader
{
    /*
     * class namespace and base directory will be stored to an array
     * @return loader_data => prefix and => src keys values
     */
    private $loader_data = array();

    //Function updates $loader_data with namespace prefix and base directory
    public function add($namespace, $src)
    {
        $this->loader_data = array('prefix' => $namespace, 'src' =>$src);
        return $this;
    }


    /*
     * Register loader with SPL autoloader stack
     */
    public function register()
    {
        spl_autoload_register(function($class) {

            //Namespace prefix
            $prefix = $this->loader_data['prefix'];

            //Namespace prefix length
            $length = strlen($prefix);

            // base directory for the namespace prefix
            $base_directory = $this->loader_data['src'];

            // Check if the class use the namespace prefix?
            if(strncmp($prefix, $class, $length) !== 0) {
                return;
            }

            // get the relative class name
            $class_end = substr($class, $length);

            // replace the namespace prefix with the base directory, replace namespace
            // separators with directory separators in the relative class name, append
            // with .php
            $file = $base_directory . str_replace('\\', '/', $class_end) . '.php';

            // if the file exists, require it
            if(file_exists($file)) {
                require $file;
            }

        });
    }
}


$autoloader = new Ps4Autoloader();
$autoloader
    ->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/')
   // ->add('Symfony\\Component\\Yaml\\', __DIR__.'/vendor/symfony/yaml/')
    ->register();