agenda = {}

for i in range(3):
    nombre = input(f"Introduce el nombre {i+1}: ")
    telefono = input(f"Introduce el telefono {i+1}: ")
    agenda[nombre] = telefono

print("Agenda Completa")
for nombre in agenda:
    print(f"{nombre} : {telefono}")

buscar = input("Buscar Contacto: ")
if buscar in agenda:
    print(f"Telefono {agenda[buscar]}")
else:
    print("No existe ese contacto")
