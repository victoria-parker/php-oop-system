<?php

##configuracion general de sistema
    session_start();

    ##autolader##

    function autocarga($nClase){
        require_once 'classes/'.$nClase.'.php';

    }

    spl_autoload_register('autocarga');
