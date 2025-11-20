@extends('layouts/plantilla01')

@section('titulo', 'Pagina principal')
@section('estilos')
    <style>
        /* ====== ESTILOS GENERALES ====== */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background: #f4f6f9;
    color: #333;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 28px;
    font-weight: 600;
}

/* ====== TABLA ====== */
.tabla-tarea {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* HEAD */
.tabla-tarea thead {
    background: #2f4f6f;
    color: white;
}

.tabla-tarea th {
    padding: 12px;
    font-size: 14px;
    text-align: left;
}

/* FILAS */
.tabla-tarea td {
    padding: 12px;
    border-bottom: 1px solid #e5e5e5;
    font-size: 14px;
}

/* FILAS ALTERNAS */
.tabla-tarea tbody tr:nth-child(even) {
    background: #f2f6fc;
}

/* FILA HOVER */
.tabla-tarea tbody tr:hover {
    background: #dce8f7;
}

/* ====== BOTONES ====== */
.btn {
    padding: 6px 10px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-size: 13px;
}

.btn a {
    text-decoration: none;
    color: white;
}

.btn-modificar {
    background: #3c8dbc;
}

.btn-modificar:hover {
    background: #357ca5;
}

.btn-eliminar {
    background: #d9534f;
}

.btn-eliminar:hover {
    background: #c9302c;
}

/* A dentro de botón */
td .btn a {
    color: white;
}
    </style>
@endsection

@section('cuerpo')
    <h1>Gestor de Tareas</h1>
    <ul>
        <li><a href="{!! url('alta') !!}">Dar de alta tarea</a></li>
        <li><a href="{!! url('modificar') !!}">Proximanente (Modificar tarea)</a></li>
        <li><a href="{!! url('eliminar') !!}">Proximanente (Eliminar tarea)</a></li>
    </ul> 
@endsection