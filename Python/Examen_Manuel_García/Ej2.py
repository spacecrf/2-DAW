def calcular_valor_y_alerta(stock, precio_unitario):
    
    valor_total = stock * precio_unitario

    if stock > 20:
        cnt_stock = "Stock Optimo"
    else:
        cnt_stock = "Stock Bajo"
    return valor_total, cnt_stock

def main():
    inventario = [
    {
        "id_producto": "P001", 
        "nombre": "Teclado Mecánico", 
        "stock": 50, 
        "precio_unitario": 65.50
    },
    {
        "id_producto": "P002",
        "nombre": "Monitor Curvo 27\"",
        "stock": 15,
        "precio_unitario": 289.99
    },
    {
        "id_producto": "P003", 
        "nombre": "Ratón Inalámbrico", 
        "stock": 25, 
        "precio_unitario": 35.75
    },
    {
        "id_producto": "P004", 
        "nombre": "Auriculares Gaming", 
        "stock": 8, 
        "precio_unitario": 89.99
    }
    ]

    print("Informe de inventario - Valoracion y alertas de stock")
    print("="*30)

    for producto in inventario:
        valor, alerta = calcular_valor_y_alerta(
            producto["stock"],
            producto["precio_unitario"]
        )
    
        print(f"Id: {producto['id_producto']} - {producto['nombre']} - Stock: {producto['stock']} unidades")
        print(f"\n Precio unitario {producto['precio_unitario']}")
        print(f"\n Valor total: {valor} - Alerta: {alerta}")
        print("-"*30)

main()