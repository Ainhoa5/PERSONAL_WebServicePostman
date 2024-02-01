USE andercode_webservice;
CREATE TABLE tm_producto (
    pro_id INT AUTO_INCREMENT PRIMARY KEY,
    pro_nom VARCHAR(255),
    pro_desc TEXT,
    cat_id INT
);
INSERT INTO tm_producto (pro_nom, pro_desc, cat_id) VALUES ('NombreProducto', 'Descripción del Producto', 1);

