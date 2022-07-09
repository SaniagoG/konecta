-- Producto con más Stock en el inventario
SELECT id,nombre,referencia,precio,peso,categoria,MAX(stock) as stock
FROM producto;

