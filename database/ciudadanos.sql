
CREATE TABLE `ciudadanos` (
  `cedula` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id` int(11) NOT NULL /*Colocar el AutoIncremento*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
