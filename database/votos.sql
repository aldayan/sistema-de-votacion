CREATE TABLE `votos` (
  `id` int(11) NOT NULL,/*Colocar el AutoIncremento*/
  `candidatoid` int(11) NOT NULL,
  `puesto` varchar(150) NOT NULL,
  `votos` int(11) NOT NULL,
  `ciudadanoid` varchar(150) NOT NULL,
  `eleccionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;