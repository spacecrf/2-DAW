def calcular_descuento(total):
    if total > 200:
        return 20
    elif 100 <= total < 200:
        return 10
    else:
        return 0

def main():
    print("===Calculadora de precio final===")

    total_compra = 0

    while True:
        precio = float(input("Introduce el precio del articulo (0 para terminar) "))

        if precio == 0:
            break
        
        cantidad = int(input("Introduce la cantidad "))

        total_compra += precio * cantidad

        print(f"Total acumulado {total_compra}")

    descuento = calcular_descuento(total_compra)
    total_final = total_compra *(1- descuento / 100)
    valor_descuento = (total_compra * descuento)/100

    print("=" *20)
    print("Resumen de la compra")
    print("="*20)
    print(f"Total acumulado (sin descuento) {total_compra} €")
    print(f"Descuento aplicado {descuento}%")
    print(f"Valor del descuento {valor_descuento}")
    print(f"Total a pagar {total_final}€")

main()