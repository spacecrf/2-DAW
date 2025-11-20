<?php

namespace App\Models;

use App\Models\DB;

class Tareas
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function listarTareas()
    {
        $sql = "SELECT * FROM tareas";
        $resultado = $this->db->query($sql);

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
            telefono_contacto,
            descripcion,
            correo_contacto,
            direccion,
            poblacion,
            codigo_postal,
            provincia,
            estado,
            fecha_creacion,
            operario_encargado,
            fecha_realizacion,
            anotaciones_anteriores,
            anotaciones_posteriores,
            fichero_resumen,
            fotos
        ) VALUES (
            '{$datos['nif_cif']}',
            '{$datos['persona_contacto']}',
            '{$datos['telefono_contacto']}',
            '{$datos['descripcion']}',
            '{$datos['correo_contacto']}',
            '{$datos['direccion']}',
            '{$datos['poblacion']}',
            '{$datos['codigo_postal']}',
            '{$datos['provincia']}',
            '{$datos['estado']}',
            NOW(),
            '{$datos['operario_encargado']}',
            '{$datos['fecha_realizacion']}',
            '{$datos['anotaciones_anteriores']}',
            '{$datos['anotaciones_posteriores']}',
            '{$datos['fichero_resumen']}',
            '{$datos['fotos']}'
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
            telefono_contacto = '{$datos['telefono_contacto']}',
            descripcion = '{$datos['descripcion']}',
            correo_contacto = '{$datos['correo_contacto']}',
            direccion = '{$datos['direccion']}',
            poblacion = '{$datos['poblacion']}',
            codigo_postal = '{$datos['codigo_postal']}',
            provincia = '{$datos['provincia']}',
            estado = '{$datos['estado']}',
            operario_encargado = '{$datos['operario_encargado']}',
            fecha_realizacion = '{$datos['fecha_realizacion']}',
            anotaciones_anteriores = '{$datos['anotaciones_anteriores']}',
            anotaciones_posteriores = '{$datos['anotaciones_posteriores']}',
            fichero_resumen = '{$datos['fichero_resumen']}',
            fotos = '{$datos['fotos']}'
        WHERE id = $id";

    $this->db->query($sql);
}

    public function eliminarTarea($id)
    {
        $sql = "DELETE FROM tareas WHERE id = $id";
        $this->db->query($sql);
    }
}
