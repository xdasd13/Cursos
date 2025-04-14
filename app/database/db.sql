-- Crear la base de datos
CREATE DATABASE curso;
USE curso;

-- Tabla categorias (adaptada al nuevo formato)
CREATE TABLE Categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(50) NOT NULL,
    creado DATETIME NOT NULL DEFAULT NOW(),
    modificado DATETIME NULL,
    CONSTRAINT uk_categoria UNIQUE (categoria)
) ENGINE = INNODB;

-- Tabla cursos (adaptada al nuevo formato)
CREATE TABLE Cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idcategoria INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    duracion_horas INT NOT NULL,
    nivel ENUM('Basico', 'Intermedio', 'Avanzado') NOT NULL,
    precio DECIMAL(7,2) NOT NULL,
    fecha_inicio DATE NOT NULL,
    creado DATETIME NOT NULL DEFAULT NOW(),
    modificado DATETIME NULL,
    CONSTRAINT fk_idcategoria FOREIGN KEY (idcategoria) REFERENCES Categorias(id)
) ENGINE = INNODB;

-- Insertar datos de ejemplo (adaptados a las nuevas categorías)
INSERT INTO Categorias (categoria) VALUES 
    ('Matematicas'),
    ('Literatura'),
    ('Informatica');

-- Insertar cursos de ejemplo adaptados a las nuevas categorías
INSERT INTO Cursos (idcategoria, titulo, duracion_horas, nivel, precio, fecha_inicio) VALUES
    (3, 'PHP Basico', 40, 'Basico', 150.00, '2025-05-01'),
    (3, 'JavaScript Avanzado', 60, 'Avanzado', 250.00, '2025-06-01'),
    (1, 'Algebra Lineal', 30, 'Intermedio', 200.00, '2025-05-15'),
    (2, 'Literatura Española', 20, 'Basico', 100.00, '2025-04-20');

-- Vista adaptada (mantiene la misma funcionalidad pero con los nuevos nombres)
CREATE VIEW vista_cursos_todos AS
SELECT
    C.id,
    CAT.categoria,
    C.titulo,
    C.duracion_horas,
    C.nivel,
    C.precio,
    C.fecha_inicio
FROM Cursos C
INNER JOIN Categorias CAT ON C.idcategoria = CAT.id
ORDER BY C.id;

-- Procedimiento almacenado adaptado para filtrar por nivel
DELIMITER //
CREATE PROCEDURE spu_cursos_filtrar_nivel(IN _nivel ENUM('Basico', 'Intermedio', 'Avanzado'))
BEGIN
    SELECT * FROM vista_cursos_todos WHERE nivel = _nivel;
END //
DELIMITER ;

-- Procedimiento almacenado adaptado para registrar cursos
DELIMITER //
CREATE PROCEDURE spu_cursos_registrar(
    IN _idcategoria INT,
    IN _titulo VARCHAR(100),
    IN _duracion_horas INT,
    IN _nivel ENUM('Basico', 'Intermedio', 'Avanzado'),
    IN _precio DECIMAL(7,2),
    IN _fecha_inicio DATE
)
BEGIN
    INSERT INTO Cursos (idcategoria, titulo, duracion_horas, nivel, precio, fecha_inicio)
    VALUES (_idcategoria, _titulo, _duracion_horas, _nivel, _precio, _fecha_inicio);
END //
DELIMITER ;

-- Trigger adaptado para actualizar fecha de modificación
DELIMITER //
CREATE TRIGGER cursos_actualizar_fecha_modificacion
BEFORE UPDATE ON Cursos
FOR EACH ROW
BEGIN
    SET NEW.modificado = NOW();
END //
DELIMITER ;

-- Nuevo trigger para actualizar fecha de modificación en categorías
DELIMITER //
CREATE TRIGGER categorias_actualizar_fecha_modificacion
BEFORE UPDATE ON Categorias
FOR EACH ROW
BEGIN
    SET NEW.modificado = NOW();
END //
DELIMITER ;

-- Consulta de ejemplo
SELECT * FROM vista_cursos_todos;

-- Procedimiento nuevo para buscar cursos por categoría
DELIMITER //
CREATE PROCEDURE spu_cursos_filtrar_categoria(IN _idcategoria INT)
BEGIN
    SELECT * FROM vista_cursos_todos WHERE categoria = (SELECT categoria FROM Categorias WHERE id = _idcategoria);
END //
DELIMITER ;

-- Procedimiento nuevo para obtener estadísticas de cursos
DELIMITER //
CREATE PROCEDURE spu_estadisticas_cursos()
BEGIN
    SELECT 
        CAT.categoria,
        COUNT(C.id) AS total_cursos,
        AVG(C.precio) AS precio_promedio,
        SUM(C.duracion_horas) AS horas_totales
    FROM Cursos C
    INNER JOIN Categorias CAT ON C.idcategoria = CAT.id
    GROUP BY CAT.categoria;
END //
DELIMITER ;