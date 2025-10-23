#Creamos la lista vacia 
compras = []

#Pedimos 5 productos al ususario

for i in range(5):
    producto = input(f"Introduce el producto {i+1}: ")
    compras.append(producto)

#Mostramos la lista completa

print("\nLista completa")
print(compras)

#Pedimo que se elimine un producto 
eliminar = input("¿Qué producto deseas eliminar? ")

#Eliminar el producto

if eliminar in compras:
    compras.remove(eliminar)
    print(f"'{eliminar}' eliminado exitosamente")
else:
    print(f"'{eliminar}' no existe")

#Mostramos la lista ordenada afabeticamente
compras.sort()
print("Lista ordenada alfabeticamente")
print(compras)