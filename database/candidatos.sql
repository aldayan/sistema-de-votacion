
CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,/*Colocar el AutoIncremento*/
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `partido` varchar(150) DEFAULT NULL,
  `puesto` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;