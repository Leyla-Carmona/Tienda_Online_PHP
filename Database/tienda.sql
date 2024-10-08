CREATE DATABASE tienda;

CREATE TABLE productos (
    codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    detalle TEXT,
    imagen VARCHAR(100),
    precio DECIMAL(10, 2)
);

INSERT INTO productos (nombre, detalle, imagen, precio) VALUES
('Auriculares Inalámbricos', 'Auriculares con tecnología Bluetooth', 'auriculares_inalambricos.jpg', 59.99),
('Consola de Videojuegos', 'Consola de última generación', 'consola_videojuegos.jpg', 499.99),
('Disco Duro Externo', 'Disco de almacenamiento de 1TB', 'disco_duro_externo.jpg', 89.99),
('Laptop Gaming', 'Laptop para gamers con tarjeta gráfica avanzada', 'laptop_gaming.jpg', 999.99),
('Monitor Ultra HD', 'Monitor 4K para alta resolución', 'monitor_ultrahd.jpg', 299.99),
('Ratón Ergonómico', 'Ratón cómodo para largas horas de trabajo', 'raton_ergonomico.jpg', 29.99),
('Reloj Inteligente', 'Smartwatch con monitor de ritmo cardíaco', 'reloj_inteligente.jpg', 199.99),
('Smartphone', 'Teléfono inteligente con pantalla de 6.5 pulgadas', 'smartphone.jpg', 799.99),
('Teclado Mecánico', 'Teclado con switches mecánicos', 'teclado_mecanico.jpg', 129.99),
('Webcam HD', 'Cámara web con resolución HD', 'webcam_hd.jpg', 49.99);
