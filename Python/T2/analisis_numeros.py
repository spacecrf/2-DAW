numeros = list(range(1,21))

lista = [n**2 for n in numeros]
pares = [n for n in numeros if n%2 == 0]
mayores_diez = [n for n in numeros if n > 10]

dobles = {n: n * 2 for n in numeros}

print("Lista Originla")
print(numeros)

print("Lista Pares")
print(pares)

print("Mayores de 10")
print(mayores_diez)

print("Diccionario número - doble:")
for numero, doble in dobles.items():
    print(f"{numero} : {doble}")
