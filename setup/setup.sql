-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2015 a las 20:11:38
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.4.36-0+deb7u3
DROP DATABASE 	'CinesLy';

CREATE DATABASE 'CinesLy';

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE 'CinesLy';
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CinesLy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agrega`
--

CREATE TABLE IF NOT EXISTS `agrega` (
  `email1` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `email2` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`email1`,`email2`),
  KEY `email2` (`email2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `agrega`
--

INSERT INTO `agrega` (`email1`, `email2`, `estado`) VALUES
('docasarlorena@gmail.com', 'miguel@gmail.com', 0),
('docasarlorena@gmail.com', 'tojeiro@tojeiro.com', 0),
('i.gd1989@hotmail.es', 'docasarlorena@gmail.com', 0),
('i.gd1989@hotmail.es', 'miguel@gmail.com', 0),
('i.gd1989@hotmail.es', 'tojeiro@tojeiro.com', 0),
('miguel@gmail.com', 'tojeiro@tojeiro.com', 0),
('mltallon@gmail.com', 'docasarlorena@gmail.com', 0),
('mltallon@gmail.com', 'tojeiro@tojeiro.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comenta`
--

CREATE TABLE IF NOT EXISTS `comenta` (
  `idPelicula` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `comentario` varchar(140) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idPelicula`,`email`,`comentario`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `comenta`
--

INSERT INTO `comenta` (`idPelicula`, `email`, `comentario`, `fecha`) VALUES
(1, 'i.gd1989@hotmail.es', 'Matao que yo no fui!!', '2014-12-26 11:00:47'),
(1, 'i.gd1989@hotmail.es', 'Me gusta ver esta pelicula comiendo pepinillos :) :)', '2014-12-24 00:19:36'),
(1, 'miguel@gmail.com', 'es top', '2014-12-23 23:23:07'),
(1, 'miguel@gmail.com', 'hello', '2014-12-18 13:00:01'),
(1, 'tojeiro@tojeiro.com', 'AdemÃ¡s, ahora los comentarios salen en orden de fecha insertada', '2014-12-23 14:35:10'),
(1, 'tojeiro@tojeiro.com', 'Ahora ya funcionan los comentarios de nuevo', '2014-12-23 14:33:21'),
(1, 'tojeiro@tojeiro.com', 'Cosa', '2014-12-18 13:00:02'),
(1, 'tojeiro@tojeiro.com', 'hola', '2014-12-18 13:00:03'),
(1, 'tojeiro@tojeiro.com', 'Sigue funcionando esto?', '2014-12-18 13:00:09'),
(1, 'tojeiro@tojeiro.com', 'test', '2014-12-18 13:00:10'),
(2, 'mltallon@gmail.com', 'Es un pelicula TOP', '2014-12-25 16:33:13'),
(2, 'mltallon@gmail.com', 'fddfg', '2014-12-31 19:21:35'),
(2, 'tojeiro@tojeiro.com', 'Probando cosas', '2014-12-18 13:00:11'),
(2, 'tojeiro@tojeiro.com', 'Prueba de comentario', '2014-12-18 13:00:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE IF NOT EXISTS `contiene` (
  `id_evento` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_evento`,`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`id_evento`, `email`) VALUES
(62, 'docasarlorena@gmail.com'),
(62, 'i.gd1989@hotmail.es'),
(51, 'miguel@gmail.com'),
(51, 'mltallon@gmail.com'),
(59, 'tojeiro@tojeiro.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `idSesion` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(140) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `idSesion` (`idSesion`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `idSesion`, `email`, `descripcion`, `nombre`) VALUES
(51, 1, 'i.gd1989@hotmail.es', 'adasdasdasdasdas', 'asdasdasdasdaasd'),
(59, 1, 'docasarlorena@gmail.com', 'andres no quiere ser nombre de grupo', 'AndrÃ©s OKA'),
(62, 2, 'tojeiro@tojeiro.com', 'testtttt', 'testtest'),
(63, 2, 'i.gd1989@hotmail.es', 'asdasdasdasdasdasd asdasd', 'asdasdadsasdasd'),
(64, 1, 'i.gd1989@hotmail.es', 'as ss', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idNotificacion`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=11117 ;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`email`, `idNotificacion`, `fecha`, `descripcion`, `tipo`) VALUES
('tojeiro@tojeiro.com', 2, '2014-12-30 00:00:00', 'Un nuevo amigo te ha añadido. Vé a la página de amigos a ver quien es!', 'amigo_add'),
('tojeiro@tojeiro.com', 3, '2014-12-30 00:00:00', 'Un nuevo amigo te ha añadido. Vé a la página de amigos a ver quien es!', 'amigo_add'),
('mltallon@gmail.com', 11116, '2015-01-16 15:19:54', 'Tienes un nuevo amigo ( mltallon@gmail.com )', 'amistad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `idPelicula` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `director` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `distribuidora` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `duracion` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `sinopsis` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `actores` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `anho` year(4) DEFAULT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `genero` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `pais` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `votos` int(11) DEFAULT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `tipo` enum('cartelera','especial','proximamente') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cont_valoracion` int(11) DEFAULT NULL,
  `foto` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idPelicula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `titulo`, `director`, `distribuidora`, `duracion`, `sinopsis`, `actores`, `anho`, `fecha_estreno`, `genero`, `pais`, `votos`, `valoracion`, `tipo`, `cont_valoracion`, `foto`) VALUES
(1, 'Hay Leyenda', 'Isaac', 'ESEI', '90 seg', 'AÃ±o 2014. Jose Tojeiro (Andoni Da Silva) es el Ãºltimo hombre vivo que hay sobre la interFaz de la Tierra, pero no estÃ¡ solo. Los demÃ¡s seres humanos se han convertido en gente sin vista que no puede leer una leyenda. Durante el dÃ­a vive en estado de aledsfdsfsdfsdoche debe esconderse de ellos y esperar el amanecer. Esta pesadilla empezÃ³ en Noviembre con la asignaciÃ³n ', 'Andoni Da Silva, Javier Rodeiro', 2016, '0000-00-00', 'ficcion', 'Ourense', 3, 700, 'cartelera', 143, 'img/peliculas/Beth Humphreys.jpg'),
(2, 'El seÃ±or de los Anillos El retorno del rey', 'Tolkien', 'Trola Films', '89', 'Tras la victoria en el abismo de Foz, Aragorn, Gandalf y compaÃ±Ã­a, se dirijen a interrogar a Saruman. AllÃ­ conseguirÃ¡n valiosa informaciÃ³n, aunque ellos no se enterarÃ¡n de nada. Mientras, Sam, Frodo y Gollum, siguen su viaje hacia la Ponderosa. Gollum y Sam siguen haciÃ©ndose la puÃ±eta mutuamente mientras llegan a la cÃ¡rcel de Guantanamo, lugar peligrosÃ­simo protegido por el seÃ±or de los NazgÃºl, ligado intimamente al destino del anillo. Aragorn, por su parte, serÃ¡ obligado.', 'Julio Iglesias', 2016, '2014-12-15', 'terror,ficcion', '2', 6, 285, 'especial', 59, 'img/buda.jpg '),
(3, 'Star Wars Episodio I: La Amenaza Fantasma', 'George Lucas', ' Lucasfilm', '131', 'Ambientada treinta aÃ±os antes que "La guerra de las galaxias" (1977), muestra la infancia de Darth Vader, el pasado de Obi-Wan Kenobi y el resurgimiento de los Sith, los caballeros Jedi dominados por el Lado Oscuro. La FederaciÃ³n de Comercio ha bloqueado el pequeÃ±o planeta de Naboo, gobernado por la joven Reina Amidala; se trata de un plan ideado por Sith Darth Sidious, que, manteniÃ©ndose en el anonimato, dirige a los neimoidianos, que estÃ¡n al mando de la FederaciÃ³n. ', ' Liam Neeson, Ewan McGregor, Natalie Portman, Jake Lloyd y Ray Park.', 1999, '0000-00-00', 'ficcion', 'USA', 123, 376, 'cartelera', 79, 'img/starwars.jpg'),
(18, 'adsfasdfadfa', '', '', '', '"', '', 1998, '0000-00-00', '', '', 0, 0, 'cartelera', 0, 'img/peliculas/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `publica` varchar(300) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idPublicacion`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=118 ;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`email`, `idPublicacion`, `fecha`, `publica`) VALUES
('i.gd1989@hotmail.es', 4, '2014-12-18 00:00:00', 'Revisar parrafos'),
('i.gd1989@hotmail.es', 5, '2014-12-18 20:00:00', 'Revisar parrafos'),
('i.gd1989@hotmail.es', 6, '2014-12-18 10:00:00', 'Revisar parrafos'),
('i.gd1989@hotmail.es', 7, '2014-12-18 10:00:00', 'Revisar parrafos'),
('i.gd1989@hotmail.es', 11, '2014-12-18 10:00:00', 'Revisar parrafosSSASAS'),
('docasarlorena@gmail.com', 17, '2014-12-21 00:00:00', 'Comentario de Lorena'),
('tojeiro@tojeiro.com', 19, '2014-12-20 23:54:14', 'Insertando una publicaciÃ³n'),
('tojeiro@tojeiro.com', 20, '2014-12-20 23:55:27', 'Probando publicaciones'),
('tojeiro@tojeiro.com', 21, '2014-12-21 00:16:20', 'En teorÃ­a las publicaciones ya estÃ¡n implementadas. Probando...'),
('tojeiro@tojeiro.com', 22, '2014-12-21 11:19:31', 'Probando EdiciÃ³n de un comentario'),
('i.gd1989@hotmail.es', 31, '2014-12-22 18:07:28', 'Jajaja Zubizarreta marica!!maricÃ³n!!JeJe'),
('admin@gmail.com', 37, '2014-12-23 21:37:51', 'asdfasdfasdf'),
('miguel@gmail.com', 42, '2014-12-24 14:43:25', 'The amazing tarantula'),
('i.gd1989@hotmail.es', 66, '2014-12-24 00:00:00', 'JKLWEROQUERP'),
('i.gd1989@hotmail.es', 76, '2014-12-24 00:00:00', 'KBJDFBNDFJD'),
('mltallon@gmail.com', 100, '2014-12-24 20:26:56', 'jklasdkf'),
('mltallon@gmail.com', 101, '2014-12-24 20:26:59', 'mjhgd'),
('tojeiro@tojeiro.com', 102, '2014-12-24 20:34:00', 'Prueba '),
('tojeiro@tojeiro.com', 103, '2014-12-24 20:34:39', 'Prueba de publicaciÃ³n'),
('tojeiro@tojeiro.com', 104, '2014-12-24 20:35:34', 'EstÃ¡n en orden cronolÃ³gico? Esta deberÃ­a salir de primera'),
('i.gd1989@hotmail.es', 106, '2014-12-24 21:47:43', 'Ã©Ã©Ã­Ã­'),
('miguel@gmail.com', 111, '2014-12-25 21:11:06', 'isaac cabron! jajaja'),
('i.gd1989@hotmail.es', 112, '2014-12-25 21:47:40', 'Jajajaja pois eu non o escribÃ­n.'),
('javier@javier.com', 115, '2014-12-26 20:22:49', 'Ã±lk'),
('docasarlorena@gmail.com', 117, '2014-12-31 19:37:51', 'testasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendada`
--

CREATE TABLE IF NOT EXISTS `recomendada` (
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `idPelicula` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`,`idPelicula`),
  KEY `idPelicula` (`idPelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `recomendada`
--

INSERT INTO `recomendada` (`email`, `idPelicula`) VALUES
('admin@gmail.com', 1),
('i.gd1989@hotmail.es', 1),
('javier@javier.com', 1),
('miguel@gmail.com', 1),
('mltallon@gmail.com', 1),
('tojeiro@tojeiro.com', 1),
('mltallon@gmail.com', 2),
('tojeiro@tojeiro.com', 2),
('i.gd1989@hotmail.es', 3),
('mltallon@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `idPelicula` int(11) NOT NULL,
  `idSesion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `sala` int(11) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSesion`),
  KEY `idPelicula` (`idPelicula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idPelicula`, `idSesion`, `fecha`, `sala`, `capacidad`) VALUES
(1, 1, '2015-12-12 12:30:00', 5, 400),
(2, 2, '2015-03-10 19:30:00', 3, 200),
(3, 9, '2015-03-11 20:30:00', 2, 674);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombreUsuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT 'img/default_user.png',
  `preferencia1` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `preferencia2` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `preferencia3` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ciudadActual` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `eslogan` varchar(140) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombreUsuario`, `email`, `pass`, `foto`, `preferencia1`, `preferencia2`, `preferencia3`, `estado`, `ciudadActual`, `fechaNacimiento`, `tipoUsuario`, `eslogan`) VALUES
('admin', 'admin@gmail.com', 'admin', 'img/fotosPerfil/faceles.jpg', 'fantasia', 'aventura', 'ficcion', 'de parra', 'ourense', '0000-00-00', 1, 'carallo'),
('æ˜ ç”»', 'æ˜ ç”»', 'æ˜ ç”»', 'img/fotosPerfil/tallon.jpg', '', '', '', '', '', '0000-00-00', 0, ''),
('Lorena', 'docasarlorena@gmail.com', 'asdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
('fgfg', 'dssd@', 'a', 'img/default_user.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
('gabrielEpicGay', 'gabridguez@gmail.com', 'asdf', 'img/default_user.png', '', '', '', '', '', '0000-00-00', 0, ''),
('Isaac', 'i.gd1989@hotmail.es', 'provisiona', 'img/fotosPerfil/faceles.jpg', '', '', '', '', '', '0000-00-00', 0, 'El futbol es como el ajedrez, pero sin los dados.'),
('Javier Villalobos Sa', 'javier@javier.com', 'javier', 'img/fotosPerfil/', '', '', '', '', '', '0000-00-00', 0, 'hola'),
('joselito', 'joselito@gmail.com', 'asd', 'img/fotosPerfil/Penguins.jpg', '', '', '', '', '', '0000-00-00', 0, ''),
('Miguel', 'miguel@gmail.com', 'miguel', 'img/fotosPerfil/000-2014-chevrolet-corvette.jpg', '', '', '', '', '', '0000-00-00', 0, 'Hola ramones'),
('Tallon43', 'mltallon@gmail.com', 'vilardevos', 'img/yo.jpg', '', '', '', '', '', '0000-00-00', 0, 'Bieeeeen'),
('JosÃ© Tojeiro', 'tojeiro@tojeiro.com', 'tojeiro', 'img/user-at-user-dot-com.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Me echaron droja... en el culacao!');

--
-- Disparadores `usuario`
--
DROP TRIGGER IF EXISTS `controlarImagenInsert`;
DELIMITER //
CREATE TRIGGER `controlarImagenInsert` BEFORE INSERT ON `usuario`
 FOR EACH ROW BEGIN
       	IF (NEW.foto = "") 
       		THEN
             SET NEW.foto ="img/default_user.png";
         
       	END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `controlarImagenUpdate`;
DELIMITER //
CREATE TRIGGER `controlarImagenUpdate` BEFORE UPDATE ON `usuario`
 FOR EACH ROW BEGIN
       	IF (NEW.foto = "" AND OLD.foto = "") 
       		THEN
             SET NEW.foto ="img/default_user.png";
         
       	END IF;
       	IF (NEW.foto = "" AND OLD.foto != "")
       		THEN
       			SET NEW.foto = OLD.foto;
        END IF; 
END
//
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agrega`
--
ALTER TABLE `agrega`
  ADD CONSTRAINT `agrega_ibfk_1` FOREIGN KEY (`email1`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agrega_ibfk_2` FOREIGN KEY (`email2`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD CONSTRAINT `comenta_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comenta_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idSesion`) REFERENCES `sesion` (`idSesion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendada`
--
ALTER TABLE `recomendada`
  ADD CONSTRAINT `recomendada_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recomendada_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP USER 'usrCinesLy';
CREATE USER 'usrCinesLy'@'%' IDENTIFIED BY  'AVVeY4MYU6bVXYhJ';

GRANT USAGE ON * . * TO  'usrCinesLy'@'%' IDENTIFIED BY  'AVVeY4MYU6bVXYhJ' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON  `CinesLy` . * TO  'usrCinesLy'@'%' WITH GRANT OPTION ;
