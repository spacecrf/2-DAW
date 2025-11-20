estudiantes = ["Ana", "Luis", "Marta", "Carlos"]
notas_matematicas = [8, 7, 9, 6]
notas_fisica = [9, 6, 10, 7]
notas_quimica = [7, 8, 9, 5]

for indice, (mat, fis, qui) in enumerate(zip(notas_matematicas, notas_fisica, notas_quimica), start=1):
    nombre = estudiantes[indice - 1]

    promedio = (mat + fis + qui) / 3

    if promedio >= 6.5:
        estado = "Aprobado"
    elif promedio >= 5:
        estado = "En recuperación"
    else:
        estado = "Reprobado"

    print(f"{indice} {nombre} - Matemáticas: {mat}, Física: {fis}, Química: {qui}, Promedio: {promedio:.2f}, Estado: {estado}")
