estudiantes = {
    "Ana": [8, 7, 9],
    "Luis": [7, 6, 8],
    "Marta": [9, 10, 9],
    "Carlos": [6, 7, 5],
    "Laura": [10, 9, 10]
}

it_estudiantes = iter(estudiantes)

while True:
    try:
        nombre = next(it_estudiantes)
        notas = estudiantes[nombre]

        promedio = round(sum(notas) / len(notas), 2)

        # Determinamos el estado
        if promedio >= 6.5:
            estado = "Aprobado"
        elif promedio >= 5:
            estado = "En recuperación"
        else:
            estado = "Reprobado"

        print(f"{nombre} - Notas: {notas}, Promedio: {promedio}, Estado: {estado}")

    except StopIteration:
        break