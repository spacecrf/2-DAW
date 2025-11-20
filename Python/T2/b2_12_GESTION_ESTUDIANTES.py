<<<<<<< HEAD
"""
b2_12_GESTION_ESTUDIANTES.py
Actividad final - Bloque 02
Programa para gestionar estudiantes: añadir, mostrar, buscar, calcular promedios e informes.
Escrito con un estilo accesible, mensajes en español y validaciones básicas.
"""

=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
# Variable global para autoincrementar IDs
SIGUIENTE_ID = 1

# Lista global que almacena los estudiantes (cada uno es un diccionario)
estudiantes = []


# -------------------------
# Funciones utilitarias
# -------------------------
def mostrar_menu():
    """Muestra el menú principal del programa."""
    print("\n" + "=" * 50)
    print("      SISTEMA DE GESTIÓN DE ESTUDIANTES")
    print("=" * 50)
    print("1. Agregar estudiante")
    print("2. Mostrar todos los estudiantes")
    print("3. Buscar estudiante por ID")
    print("4. Calcular promedio de notas (general)")
    print("5. Estudiantes aprobados")
    print("6. Informe completo")
    print("7. Salir")
    print("=" * 50)


def obtener_entero(mensaje, minimo=None, maximo=None):
    """
    Pide al usuario un entero hasta que se introduzca uno válido.
    Opcional: comprobar mínimo y/o máximo.
    """
    while True:
        try:
            valor = int(input(mensaje).strip())
            if minimo is not None and valor < minimo:
                print(f"Introduce un número >= {minimo}.")
                continue
            if maximo is not None and valor > maximo:
                print(f"Introduce un número <= {maximo}.")
                continue
            return valor
        except ValueError:
            print("Valor no válido. Introduce un número entero.")


def obtener_float(mensaje, minimo=None, maximo=None):
    """
    Pide al usuario un número (float) hasta que se introduzca uno válido.
    Opcional: comprobar mínimo y/o máximo.
    """
    while True:
        try:
            valor = float(input(mensaje).strip())
            if minimo is not None and valor < minimo:
                print(f"Introduce un número >= {minimo}.")
                continue
            if maximo is not None and valor > maximo:
                print(f"Introduce un número <= {maximo}.")
                continue
            return valor
        except ValueError:
            print("Valor no válido. Introduce un número (por ejemplo 7.5).")


# -------------------------
# Funciones principales
# -------------------------
def calcular_promedio(notas):
<<<<<<< HEAD
    """
    Calcula el promedio de una lista de notas (lista de floats).
    Si la lista está vacía, devuelve 0.0.
    """
    if not notas:
        return 0.0
    # Cálculo paso a paso (más humano): suma y división
=======

    if not notas:
        return 0.0
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    suma = 0.0
    for n in notas:
        suma += n
    promedio = suma / len(notas)
<<<<<<< HEAD
    # Redondear a 2 decimales para mostrar
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    return round(promedio, 2)


def determinar_estado(promedio):
<<<<<<< HEAD
    """
    Determina el estado del estudiante según su promedio.
    Aprobado si promedio >= 5.0, en caso contrario Suspenso.
    """
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    return "Aprobado" if promedio >= 5.0 else "Suspenso"


def crear_estudiante(nombre, edad, notas):
<<<<<<< HEAD
    """
    Crea y devuelve un diccionario que representa a un estudiante.
    Usa la variable global SIGUIENTE_ID para asignar el id único.
    """
=======

>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    global SIGUIENTE_ID
    promedio = calcular_promedio(notas)
    estado = determinar_estado(promedio)
    estudiante = {
        'id': SIGUIENTE_ID,
        'nombre': nombre,
        'edad': edad,
        'notas': notas,
        'promedio': promedio,
        'estado': estado
    }
    SIGUIENTE_ID += 1
    return estudiante


def agregar_estudiante():
<<<<<<< HEAD
    """Solicita datos al usuario y añade un nuevo estudiante a la lista global."""
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    print("\n--- AGREGAR NUEVO ESTUDIANTE ---")
    nombre = input("Nombre del estudiante: ").strip()
    while not nombre:
        print("El nombre no puede estar vacío.")
        nombre = input("Nombre del estudiante: ").strip()

    edad = obtener_entero("Edad del estudiante: ", minimo=0, maximo=120)

    print("Ingrese las notas del estudiante (ingrese -1 para terminar):")
    notas = []
    while True:
        nota = obtener_float("Nota: ")
        if nota == -1:
            break
        if nota < 0 or nota > 10:
            print("Las notas deben estar entre 0 y 10. Si quieres terminar, escribe -1.")
            continue
        notas.append(round(nota, 2))

    nuevo = crear_estudiante(nombre, edad, notas)
    estudiantes.append(nuevo)
    print(f"\n✅ Estudiante '{nuevo['nombre']}' agregado con ID: {nuevo['id']}")


def mostrar_estudiantes():
<<<<<<< HEAD
    """Muestra todos los estudiantes en formato tabular."""
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    if not estudiantes:
        print("\nNo hay estudiantes registrados.")
        return

    encabezado = f"\n{'ID':^4} | {'Nombre':^25} | {'Edad':^4} | {'Promedio':^8} | {'Estado':^9}"
    print(encabezado)
    print("-" * len(encabezado))
    for e in estudiantes:
        print(f"{e['id']:^4} | {e['nombre'][:25]:25} | {e['edad']:^4} | {e['promedio']:^8} | {e['estado']:^9}")


def buscar_estudiante_por_id(estudiante_id):
<<<<<<< HEAD
    """Devuelve el estudiante cuyo id coincide o None si no existe."""
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    for e in estudiantes:
        if e['id'] == estudiante_id:
            return e
    return None


def calcular_promedio_clase():
<<<<<<< HEAD
    """Calcula y muestra el promedio general de la clase (promedio de promedios)."""
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    if not estudiantes:
        print("\nNo hay estudiantes para calcular el promedio de la clase.")
        return 0.0
    promedios = [e['promedio'] for e in estudiantes]
    # Promedio general de la clase
    suma = sum(promedios)
    promedio_general = round(suma / len(promedios), 2)
    print(f"\n--PROMEDIO GENERAL DE LA CLASE--\nPromedio general: {promedio_general}")
    return promedio_general


def estudiantes_aprobados():
<<<<<<< HEAD
    """Devuelve (y muestra) la lista de estudiantes aprobados usando comprensión de listas."""
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    aprobados = [e for e in estudiantes if e['promedio'] >= 5.0]
    if not aprobados:
        print("\nNo hay estudiantes aprobados.")
        return aprobados
    print("\n--ESTUDIANTES APROBADOS--")
    for e in aprobados:
        print(f"ID {e['id']} - {e['nombre']} (Promedio: {e['promedio']})")
    return aprobados


def generar_informe_completo():
<<<<<<< HEAD
    """
    Genera un informe completo:
    - lista de nombres, promedios y estados (usa zip y enumerate para recorrer)
    - promedio general
    - mejor y peor promedio
    - muestra los 3 primeros estudiantes usando un iterador
    """
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    if not estudiantes:
        print("\nNo hay datos para generar el informe.")
        return

    nombres = [e['nombre'] for e in estudiantes]
    promedios = [e['promedio'] for e in estudiantes]
    estados = [e['estado'] for e in estudiantes]

    print("\n--INFORME COMPLETO--")
    print(f"{'Nº':>3} {'Nombre':25} {'Promedio':>8} {'Estado':>10}")
    print("-" * 52)

<<<<<<< HEAD
    # Uso de zip y enumerate
    for idx, (nom, prom, est) in enumerate(zip(nombres, promedios, estados), start=1):
        print(f"{idx:>3} {nom[:25]:25} {prom:8} {est:>10}")

    # Estadísticas adicionales
=======
    for idx, (nom, prom, est) in enumerate(zip(nombres, promedios, estados), start=1):
        print(f"{idx:>3} {nom[:25]:25} {prom:8} {est:>10}")

>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    promedio_general = calcular_promedio_clase()
    mejor = max(estudiantes, key=lambda x: x['promedio'])
    peor = min(estudiantes, key=lambda x: x['promedio'])
    print("\nEstadísticas:")
    print(f"Promedio general: {promedio_general}")
    print(f"Mejor promedio: {mejor['nombre']} -> {mejor['promedio']}")
    print(f"Peor promedio: {peor['nombre']} -> {peor['promedio']}")

<<<<<<< HEAD
    # Usar un iterador para ver los tres primeros estudiantes
=======
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    it = iter(estudiantes)
    print("\nTres primeros estudiantes (usando iterador):")
    for i in range(3):
        try:
            e = next(it)
            print(f"{i+1}. ID {e['id']} - {e['nombre']} (Prom: {e['promedio']})")
        except StopIteration:
            print(f"{i+1}. --- no hay más estudiantes ---")
            break


# -------------------------
# Función principal
# -------------------------
def main():
<<<<<<< HEAD
    """Bucle principal del programa."""
    print("Bienvenido/a al gestor de estudiantes. Soy tu asistente sencillo para manejar los datos.")
    # Pre-cargar algunos estudiantes de ejemplo (útil para pruebas)
=======
    print("Bienvenido/a al gestor de estudiantes. Soy tu asistente sencillo para manejar los datos.")
    # Pre-cargar algunos estudiantes de ejemplo
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    precarga = [
        create_example_student("Ana García", 20, [7.5, 8.0, 6.5]),
        create_example_student("Luis Pérez", 19, [4.0, 5.5]),
        create_example_student("Marta Ruiz", 21, [9.0, 8.5, 9.5])
    ]
    estudiantes.extend(precarga)

    while True:
        mostrar_menu()
        opcion = obtener_entero("Selecciona una opción (1-7): ", minimo=1, maximo=7)

        if opcion == 1:
            agregar_estudiante()
        elif opcion == 2:
            mostrar_estudiantes()
        elif opcion == 3:
            sid = obtener_entero("Introduce el ID del estudiante a buscar: ", minimo=1)
            encontrado = buscar_estudiante_por_id(sid)
            if encontrado:
                print("\nEstudiante encontrado:")
                print(f"ID: {encontrado['id']}")
                print(f"Nombre: {encontrado['nombre']}")
                print(f"Edad: {encontrado['edad']}")
                print(f"Notas: {encontrado['notas']}")
                print(f"Promedio: {encontrado['promedio']}")
                print(f"Estado: {encontrado['estado']}")
            else:
                print(f"No existe un estudiante con ID {sid}.")
        elif opcion == 4:
            calcular_promedio_clase()
        elif opcion == 5:
            estudiantes_aprobados()
        elif opcion == 6:
            generar_informe_completo()
        elif opcion == 7:
            print("Saliendo... ¡Buena suerte con el trimestre! 👋")
            break


# -------------------------
# Helpers de ejemplo (no solicitados pero útiles)
# -------------------------
def create_example_student(nombre, edad, notas):
<<<<<<< HEAD
    """
    Crea un estudiante sin modificar la variable global SIGUIENTE_ID directamente.
    Esta función se usa para precargar datos de ejemplo en el programa.
    """
=======

>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    global SIGUIENTE_ID
    promedio = calcular_promedio(notas)
    estado = determinar_estado(promedio)
    est = {
        'id': SIGUIENTE_ID,
        'nombre': nombre,
        'edad': edad,
        'notas': [round(n, 2) for n in notas],
        'promedio': promedio,
        'estado': estado
    }
    SIGUIENTE_ID += 1
    return est


# -------------------------
# Punto de entrada
# -------------------------
if __name__ == "__main__":
    main()
