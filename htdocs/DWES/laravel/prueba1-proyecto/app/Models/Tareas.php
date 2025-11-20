<?php

namespace App\Models;

use App\Models\DB;

class Tareas
{
    private $db;

    public function __construct()
    {
        $this->db=DB::getInstance();   
    }

    public function listarTareas()
    {
        $sql = "SELECT * FROM tareas";
        $resultado = $this->bd->query($sql);

        $tareas = [];
        while ($fila = $this->db->LeeRegistro($resultado)) {
            $tareas[] = $fila;
        }
        return $tareas;
    }

    public function registrarAlta(array $datos)
    {
        $sql = "INSERT INTO tareas (
            nif_cif,
            persona_contacto,
            telefono,
            correo,
            descripcion_tarea,
            direccion,
            poblacion,
            codigo_postal,
            provincia,
            estado_tarea,
            operario_encargado,
            fecha_realizacion,
            anotaciones_anteriores
        ) VALUES (
            '{$datos['nif_cif']}',
            '{$datos['persona_contacto']}',
            '{$datos['telefono']}',
            '{$datos['correo']}',
            '{$datos['descripcion_tarea']}',
            '{$datos['direccion']}',
            '{$datos['poblacion']}',
            '{$datos['codigo_postal']}',
            '{$datos['provincia']}',
            '{$datos['estado_tarea']}',
            '{$datos['operario_encargado']}',
            '{$datos['fecha_realizacion']}',
            '{$datos['anotaciones_anteriores']}'
        )";

        $this->db->query($sql);
    }

    public function obtenerTareaPorId($id) 
    {
        $sql = "SELECT * FROM tareas WHERE id = $id";
        $resultado = $this->db->query($sql);
        return $this->db->LeeRegistro($resultado);
    }

    public function actualizarTarea($id, array $datos)
    {
        $sql = "UPDATE tareas SET
        nif_cif = '{$datos['nif_cif']}',
        persona_contacto = '{$datos['persona_contacto']}',
        telefono = '{$datos['telefono']}',
        correo = '{$datos['correo']}',
        descripcion_tarea = '{$datos['descripcion_tarea']}',
        direccion = '{$datos['direccion']}',
        poblacion = '{$datos['poblacion']}',
        codigo_postal = '{$datos['codigo_postal']}',
        provincia = '{$datos['provincia']}',
        estado_tarea = '{$datos['estado_tarea']}',
        operario_encargado = '{$datos['operario_encargado']}',
        fecha_realizacion = '{$datos['fecha_realizacion']}',
        anotaciones_anteriores = '{$datos['anotaciones_anteriores']}'
        WHERE id = $id";

        $this->bd->query($sql);
    }

    public function eliminarTarea($id)
    {
        $sql = "DELETE FROM tareas WHERE id = $id";
        $this->bd->query($sql);
    }

}