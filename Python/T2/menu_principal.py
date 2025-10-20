option = ""

def mostrar_menu():
    """Muestra un menú con tres opciones: Jugar, Configuración y Salir."""
    print("1. Jugar")
    print("2. Configuración")
    print("3. Salir")


while option != "3":
    option = mostrar_menu()
    option = input("Elige una opción: ")
    if option == "1":
        print("Has elegido jugar")
    elif option == "2":
        print("Has elegido configuración")
    elif option == "3":
        print("Has elegido salir")
    else:
        print("Opción no válida")