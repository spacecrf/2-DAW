<?php
namespace App\Models;

use App\Helpers\DB as HelpersDB;
use DB;

class Tareas {

    private $bd;

    public function __construct()
    {
        $this->bd=HelpersDB::getInstance();
    }

    public function registraAlta(array $datos)
    {
        $this->db->
    }

    // Otros métodos
}
