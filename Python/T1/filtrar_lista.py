# Creamos una lista con los nombres que queramos filtrar
lista = ["Ana", "Pedro", "Alba", "Lucía"]

# Recorremos la lsita
for nombre in lista:
    # Si en la lista el nombre comuneza por a o A lo salta con la funcion "continue"
    if nombre.startswith("a") or nombre.startswith("A"):
        continue
    # Printa los nombre que no comienzan por esas letras
    print(nombre)