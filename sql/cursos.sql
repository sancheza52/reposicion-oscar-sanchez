DROP TABLE IF EXISTS cursos;

CREATE TABLE cursos (
    curso_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(150),
    duracion_horas INT,
    estado VARCHAR(20)
);

-- =========================
-- INSERTS (20 REGISTROS)
-- =========================
INSERT INTO cursos (nombre, descripcion, duracion_horas, estado) VALUES
('Programación I', 'Introducción a la programación', 60, 'ACT'),
('Programación II', 'Programación orientada a objetos', 80, 'ACT'),
('Base de Datos I', 'Fundamentos de bases de datos', 70, 'ACT'),
('Base de Datos II', 'SQL avanzado y modelado', 80, 'ACT'),
('Desarrollo Web I', 'HTML y CSS básico', 50, 'ACT'),
('Desarrollo Web II', 'JavaScript y frontend', 70, 'ACT'),
('Ingeniería de Software', 'Ciclo de vida del software', 60, 'ACT'),
('Sistemas Operativos', 'Conceptos de sistemas operativos', 75, 'ACT'),
('Redes I', 'Fundamentos de redes', 65, 'ACT'),
('Redes II', 'Configuración de redes', 80, 'ACT'),
('Seguridad Informática', 'Principios de seguridad', 70, 'ACT'),
('Estructura de Datos', 'Listas, pilas y colas', 80, 'ACT'),
('Algoritmos', 'Diseño y análisis de algoritmos', 90, 'ACT'),
('Arquitectura de Computadoras', 'Componentes de hardware', 60, 'ACT'),
('Desarrollo Móvil', 'Apps móviles básicas', 70, 'ACT'),
('Gestión de Proyectos', 'Metodologías de gestión', 60, 'ACT'),
('Calidad de Software', 'Normas y pruebas', 55, 'ACT'),
('Inteligencia Artificial', 'Conceptos básicos de IA', 80, 'ACT'),
('Minería de Datos', 'Análisis de datos', 75, 'ACT'),
('Computación en la Nube', 'Servicios cloud', 65, 'ACT');