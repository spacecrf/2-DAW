print("Dame dos números:")
num1 = float (input("Número 1: "))
num2 = float (input("Número 2: "))

operacion = input("¿Que quieres hacer? (+ ,- ,* ,/): ")

if operacion == "+":
    resultado = num1 + num2
    print(f"El resultado de la suma es: {resultado}")
elif operacion == "-":
    resultado = num1 - num2
    print(f"El resultado de la resta es: {resultado}")
elif operacion == "*":
    resultado = num1 * num2
    print(f"El resultado de la multiplicación es: {resultado}")
elif operacion == "/":
    if num2 == 0:
        print("Error: No se puede dividir entre cero.")
    else:
        resultado = num1 / num2
        print(f"El resultado de la división es: {resultado}")
else:
    print("Operación no válida. Por favor, elige +, -, * o /.")
    