<?php

session_start();

class Conectar
{
    protected $dbh; 

    protected function Conexion()
    {
        try 
        {
            $conectar = $this->dbh =new PDO("mysql:localhost;dbname=menesh_helpdesk","root","");

            return $conectar;   
        }

        catch (Exception $e   )
        {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }

    }


    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function ruta()
    {
        return"http://localhost:90/HelpDesk";
    }

    }











?>