def registrar_usuario(nombre, edad, ciudad="Madrid"):
    """
    Muestra en pantalla los datos de un usuario.

    Args:
        nombre (str): Nombre del usuario.
        edad (str): Edad del usuario.
        ciudad (str, optional): Ciudad de residencia. Por defecto es "Madrid".
    """
    print(f"Usuario: {nombre}, Edad: {edad}, Ciudad: {ciudad}")


# Llamadas desde el programa principal
registrar_usuario("Ana", "25")                       # Todos los argumentos posicionales, con valor por defecto
registrar_usuario("Luis", "30", "Barcelona")         # Todos los argumentos posicionales
registrar_usuario(edad="22", nombre="Carlos")        # Argumentos nombrados en distinto orden
