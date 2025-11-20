def registrar_usuario(nombre, edad, ciudad="Madrid"):
    print(f"Usuario: {nombre}, Edad: {edad}, Ciudad: {ciudad}")


# Llamadas desde el programa principal
registrar_usuario("Ana", "25")                       
registrar_usuario("Luis", "30", "Barcelona")         
registrar_usuario(edad="22", nombre="Carlos")        
