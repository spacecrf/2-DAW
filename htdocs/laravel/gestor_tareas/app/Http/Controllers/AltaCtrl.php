<?php

namespace App\Http\Controllers;

use App\Models\Funciones;
use App\Models\Tareas;

class AltaCtrl
{
    public function alta()
    {
        if ($_POST) {

            Funciones::$errores = [];

            $this->filtraDatos();

            if (!empty(Funciones::$errores)) {
                return view('alta', $_POST);
            } else {
                $model = new Tareas();
                $model->registrarAlta($_POST);

                return redirect('/')->with('mensaje', 'Tarea registrada correctamente.');
            }
        } else {
            // campos vacíos con TU NOMBRE REAL DE BD
            $datos = [
                'nif_cif' => '',
                'persona_contacto' => '',
                'telefono_contacto' => "",
                'descripcion' => "",
                'correo_contacto' => "",
                'direccion' => "",
                'poblacion' => "",
                'codigo_postal' => "",
                'provincia' => "",
                'estado' => "",
                'operario_encargado' => "",
                'fecha_realizacion' => "",
                'anotaciones_anteriores' => "",
                'anotaciones_posteriores' => "",
                'fichero_resumen' => "",
                'fotos' => ""
            ];

            return view('alta', $datos);
        }
    }

    private function filtraDatos()
    {
        extract($_POST);

        if ($nif_cif == "") {
            Funciones::$errores['nif_cif'] = "Debe introducir el NIF/CIF";
        }

        if ($persona_contacto == "") {
            Funciones::$errores['persona_contacto'] = "Debe introducir la persona de contacto";
        }

        if ($telefono_contacto == "") {
            Funciones::$errores['telefono_contacto'] = "Debe introducir el teléfono";
        }

        if ($descripcion == "") {
            Funciones::$errores['descripcion'] = "Debe introducir la descripción";
        }

        if ($correo_contacto == "") {
            Funciones::$errores['correo_contacto'] = "Debe introducir el correo";
        } else if (!filter_var($correo_contacto, FILTER_VALIDATE_EMAIL)) {
            Funciones::$errores['correo_contacto'] = "Correo no válido";
        }

        if ($codigo_postal != "" && !preg_match("/^[0-9]{5}$/", $codigo_postal)) {
            Funciones::$errores['codigo_postal'] = "Código postal inválido";
        }

        if ($provincia == "") {
            Funciones::$errores['provincia'] = "Debe introducir una provincia";
        }

        $fechaActual = date('Y-m-d');

        if ($fecha_realizacion == "") {
            Funciones::$errores['fecha_realizacion'] = "Debe introducir la fecha de realización";
        } else if ($fecha_realizacion <= $fechaActual) {
            Funciones::$errores['fecha_realizacion'] = "Debe ser posterior a hoy";
        }
    }
}
