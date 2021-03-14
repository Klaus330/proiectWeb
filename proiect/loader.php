<?php


class Loader{

    public  function load(){
        spl_autoload_register("loadClasses");
    }


    public function loadClasses($className){
        die(var_dump("hit"));
    }
}


$loader = new Loader();
$loader->load();

//
//function my_autoload ($pClassName) {
//    die(var_dump(__DIR__ . "/" . $pClassName . ".php"));
//
//
//    include(__DIR__ . "/" . $pClassName . ".php");
//}
