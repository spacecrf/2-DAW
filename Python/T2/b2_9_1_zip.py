estudiantes = ["Ana", "Luis", "Marta", "Carlos"]
notas_matematicas = [8, 7, 9, 6]
notas_fisica = [9, 6, 10, 7]
notas_quimica = [7, 8, 9, 5]

# Diccionario donde se guardará el resultado final
resultado_final = {}

# Recorremos todas las listas al mismo tiempo con zip()
for nombre, mate, fis, qui in zip(estudiantes, notas_matematicas, notas_fisica, notas_quimica):
    # Calcular promedio
    promedio = round((mate + fis + qui) / 3, 2)

    # Determinar estado según promedio
    if promedio >= 6.5:
        estado = "Aprobado"
    elif promedio >= 5:
        estado = "En recuperación"
    else:
        estado = "Reprobado"

    # Guardar en el diccionario anidado
    resultado_final[nombre] = {
        "Matemáticas": mate,
        "Física": fis,
        "Química": qui,
        "Promedio": promedio,
        "Estado": estado
    }

# Mostrar reporte final
for nombre, datos in resultado_final.items():
    print(f"{nombre} - Matemáticas: {datos['Matemáticas']}, Física: {datos['Física']}, "
          f"Química: {datos['Química']}, Promedio: {datos['Promedio']}, Estado: {datos['Estado']}")
