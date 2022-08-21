<?php

class ConfigBD{

    public static function getConfig(){
        switch ($_SERVER['SERVER_NAME']){
            case 'ecoronar.000webhostapp.com':
                $dbConfig = array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'id18354401_ecoronar',
                    'password' => 'Pa$$word1234',
                    'database' => 'id18354401_php_puro'
                );
                break;
            default:
                $dbConfig = array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => '',
                    'database' => 'cap_softura_php'
                );
                break;
        }
        return $dbConfig;
    }

}