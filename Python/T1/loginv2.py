# Programa de registro e inicio de sesión (versión totalmente principiante)

email_guardado = None       # Email guardado (vacío al inicio)
contrasena_guardada = None  # Contraseña guardada (vacía al inicio)

while True:
    print("\n=== MENÚ PRINCIPAL ===")
    print("[1] Registrarse")
    print("[2] Iniciar sesión")
    print("[3] Salir")

    opcion = input("Elige una opción: ")

    if opcion == "1":
        print("\n--- REGISTRO ---")

        # Validar email
        while True:
            email = input("Introduce tu email: ")

            if len(email) < 3:
                print("El email debe tener al menos 3 caracteres.")
            elif "@" not in email:
                print("El email debe contener '@'.")
            elif ".com" not in email and ".es" not in email and ".net" not in email:
                print("El email debe terminar en .com, .es o .net.")
            else:
                break

        # Validar contraseña
        while True:
            password = input("Introduce tu contraseña: ")

            tiene_mayuscula = False
            tiene_numero = False
            tiene_simbolo = False
            simbolos_validos = "!@#$%&*?"

            # Revisamos caracter por caracter
            for letra in password:
                if letra >= "A" and letra <= "Z":
                    tiene_mayuscula = True
                if letra >= "0" and letra <= "9":
                    tiene_numero = True
                if letra in simbolos_validos:
                    tiene_simbolo = True

            if len(password) < 8:
                print("La contraseña debe tener al menos 8 caracteres.")
            elif not tiene_mayuscula:
                print("La contraseña debe tener al menos una letra mayúscula.")
            elif not tiene_numero:
                print("La contraseña debe tener al menos un número.")
            elif not tiene_simbolo:
                print("La contraseña debe tener al menos un símbolo especial (!@#$%&*?).")
            else:
                break

        # Guardamos los datos (de forma simple)
        email_guardado = email
        contrasena_guardada = password
        print("Usuario registrado correctamente.")

    elif opcion == "2":
        print("\n--- INICIO DE SESIÓN ---")

        if email_guardado is None:
            print("No hay usuarios registrados todavía.")
        else:
            email = input("Introduce tu email: ")

            if email != email_guardado:
                print("El usuario no existe. Regístrate primero.")
            else:
                intentos = 0
                while intentos < 3:
                    password = input("Introduce tu contraseña: ")

                    if password == contrasena_guardada:
                        print("Contraseña correcto. Bienvenido,", email)
                        break
                    else:
                        intentos = intentos + 1
                        print("Contraseña incorrecta. Intento", intentos, "de 3.")

                if intentos == 3:
                    print("Demasiados intentos fallidos. Regresando al menú principal.")

    elif opcion == "3":
        print("Saliendo del programa...")
        break

    else:
        print("Opción no válida. Intenta de nuevo.")
