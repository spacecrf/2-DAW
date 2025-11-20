nombres = ["Ana", "Luis", "Marta"]
notas_matematicas = [8, 7, 9]
notas_fisica = [9, 6, 10]

# Usamos zip() para recorrer las tres listas a la vez
for nombre, nota_mate, nota_fis in zip(nombres, notas_matematicas, notas_fisica):
    print(f"{nombre} - Matemáticas: {nota_mate}, Física: {nota_fis}")
