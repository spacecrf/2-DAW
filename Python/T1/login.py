# Creamos un Array con las credenciales de los ususarios vacio para rellenarlo 

credenciales = {}

#Creamos la funcion de registrar ususario

def registrar_usuario():
    print("Registro de usuario")
    
    usuario = input("Nombre de usuario: ")
    
    while True:
        password = input("Contraseña: ")
        
        if len(password) < 8:
            print("La contraseña debe tener al menos 8 caracteres.")
            continue
        # Recorremos la password para ver si cumple los requisitos con un array
        elif not any(char.isupper() for char in password):
            print("La contraseña debe tener al menos una letra mayúscula.")
            continue
        elif not any(char.isdigit() for char in password):
            print("La contraseña debe tener al menos un número.")
            continue
        elif not any(not char.isalnum() for char in password):
            print("La contraseña debe tener al menos un caracter especial.")
            continue
        else:
            credenciales[usuario] = password
            print("Usuario registrado con éxito.")
            break
        
def login_usuario():
    # Especificamos los intentos maximos
    MAX_INTENTOS = 3
    usuario = input("Nombre de usuario: ")
    # Verificamos si el usuario existe
    if usuario not in credenciales:
        print("El usuario no existe. Por favor, regístrese primero.")
        return
    
    for intento in range(MAX_INTENTOS):
        password = input("Introduzca contraseña: ")
        if credenciales[usuario] == password:
            print("Login exitoso. ¡Bienvenido!")
            return
        else:
            print(f"Contraseña incorrecta. Te quedan {MAX_INTENTOS - intento - 1} intentos.")
            if intento == MAX_INTENTOS :
                print("Has excedido el número máximo de intentos. Acceso bloqueado.")
                return

while True:
    #Login menu
    print("\n1. Registrar usuario")
    print("2. Iniciar sesión")
    print("3. Salir")
    
    opcion = input("Seleccione una opción (1-3): ")
    
    if opcion == '1':
        registrar_usuario()
    elif opcion == '2':
        login_usuario()
    elif opcion == '3':
        print("Saliendo del programa.")
        break
    else:
        print("Opción no válida. Por favor, intente de nuevo.")