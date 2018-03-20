<?php

class Ps4Autoloader
{

    private $loader_data = array();

    public function add($namespace, $src)
    {
        $this->loader_data[$namespace] = $src;
        return $this;
    }


    public function register()
    {

        spl_autoload_register(function($class) {


            foreach ($this->loader_data as $prefix => $base_directory){

                //Namespace prefix length
                $length = strlen($prefix);

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
            };
        });
    }
}


$autoloader = new Ps4Autoloader();
$autoloader
    ->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/')
    ->add('Symphony\\Module\\', __DIR__.'/vendor/')
    ->add('MyNamespace\\User\\', __DIR__.'/user/')

    ->register();