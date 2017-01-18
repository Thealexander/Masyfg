/*
Navicat MariaDB Data Transfer

Source Server         : MariaDB
Source Server Version : 100118
Source Host           : localhost:3309
Source Database       : msyfginformation

Target Server Type    : MariaDB
Target Server Version : 100118
File Encoding         : 65001

Date: 2016-11-20 23:33:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asistencia
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `idPeriodosActividad` int(11) NOT NULL,
  `FechadeInicio` date NOT NULL,
  `FechaFin` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Horario` int(11) NOT NULL,
  PRIMARY KEY (`idPeriodosActividad`),
  KEY `Horario` (`Horario`),
  CONSTRAINT `Horario` FOREIGN KEY (`Horario`) REFERENCES `horario` (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for asistenciapersona
-- ----------------------------
DROP TABLE IF EXISTS `asistenciapersona`;
CREATE TABLE `asistenciapersona` (
  `Prsona` int(11) NOT NULL,
  `NombrePerson` varchar(100) DEFAULT NULL,
  `AAsistencia` int(11) NOT NULL,
  KEY `Personaasis` (`Prsona`),
  KEY `NOmbresdePers` (`NombrePerson`),
  KEY `tomaasistencia` (`AAsistencia`),
  CONSTRAINT `NOmbresdePers` FOREIGN KEY (`NombrePerson`) REFERENCES `persona` (`Nombresdepersona`),
  CONSTRAINT `Personaasis` FOREIGN KEY (`Prsona`) REFERENCES `persona` (`Id_persona`),
  CONSTRAINT `tomaasistencia` FOREIGN KEY (`AAsistencia`) REFERENCES `asistencia` (`idPeriodosActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for asistenciavoluntarios
-- ----------------------------
DROP TABLE IF EXISTS `asistenciavoluntarios`;
CREATE TABLE `asistenciavoluntarios` (
  `idAsistencia` int(11) DEFAULT NULL,
  `idColegio` int(11) DEFAULT NULL,
  `idClub` int(11) DEFAULT NULL,
  `idVoluntario` int(11) DEFAULT NULL,
  KEY `Asisd` (`idAsistencia`),
  KEY `Cold` (`idColegio`),
  KEY `CLubb` (`idClub`),
  KEY `Voluund` (`idVoluntario`),
  CONSTRAINT `Asisd` FOREIGN KEY (`idAsistencia`) REFERENCES `asistencia` (`idPeriodosActividad`),
  CONSTRAINT `CLubb` FOREIGN KEY (`idClub`) REFERENCES `clubs` (`idClub`),
  CONSTRAINT `Cold` FOREIGN KEY (`idColegio`) REFERENCES `colegio` (`IdColegio`),
  CONSTRAINT `Voluund` FOREIGN KEY (`idVoluntario`) REFERENCES `voluntario` (`idVoluntario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `idCargo` int(11) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for clubs
-- ----------------------------
DROP TABLE IF EXISTS `clubs`;
CREATE TABLE `clubs` (
  `idClub` int(11) NOT NULL,
  `NombreClub` varchar(50) NOT NULL,
  `FechaApertura` date NOT NULL,
  `FechaCierre` date DEFAULT NULL,
  `IdProyecto` int(11) NOT NULL,
  `Activo` bit(1) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  PRIMARY KEY (`idClub`),
  KEY `Proyecto` (`IdProyecto`),
  KEY `Coordiner` (`idpersona`),
  CONSTRAINT `Coordiner` FOREIGN KEY (`idpersona`) REFERENCES `trabajadores` (`IdColaborador`),
  CONSTRAINT `Proyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for clubsvoluntarios
-- ----------------------------
DROP TABLE IF EXISTS `clubsvoluntarios`;
CREATE TABLE `clubsvoluntarios` (
  `idClub` int(11) NOT NULL,
  `idPerson` int(11) NOT NULL,
  PRIMARY KEY (`idClub`,`idPerson`),
  KEY `Volunnnn` (`idPerson`),
  CONSTRAINT `Clubbb` FOREIGN KEY (`idClub`) REFERENCES `clubs` (`idClub`),
  CONSTRAINT `Volunnnn` FOREIGN KEY (`idPerson`) REFERENCES `voluntario` (`idVoluntario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for colegio
-- ----------------------------
DROP TABLE IF EXISTS `colegio`;
CREATE TABLE `colegio` (
  `IdColegio` int(11) NOT NULL,
  `NombreDeColegio` varchar(100) NOT NULL,
  `NombresDirecto` varchar(100) NOT NULL,
  `TelefonoDirector` varchar(11) NOT NULL,
  `TelefonoColegio` varchar(11) DEFAULT NULL,
  `DireccionColegio` varchar(100) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  PRIMARY KEY (`IdColegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `NombreEmpresa` varchar(100) NOT NULL,
  `NombreContacto` varchar(100) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Celular` varchar(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `DescripcionContacto` varchar(100) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `Activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for estudiantes
-- ----------------------------
DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL,
  `idTurno` int(11) DEFAULT NULL,
  `Grado` varchar(10) NOT NULL,
  `idClub` int(11) DEFAULT NULL,
  `idtipodeHogar` int(11) DEFAULT NULL,
  `PrimeraVez` bit(1) NOT NULL,
  `NombresTutor` varchar(50) NOT NULL,
  `ApellidosTutor` varchar(50) NOT NULL,
  `ContactoTutor` varchar(11) NOT NULL,
  `CantidadDemiembrosenlafamilia` int(11) NOT NULL,
  `EsTiemClub` varchar(15) DEFAULT NULL,
  `idColegio` int(11) DEFAULT NULL,
  `ParConResp` varchar(20) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `Cole` (`idColegio`),
  KEY `Declub` (`idClub`),
  KEY `Turno` (`idTurno`),
  KEY `TipoHogar` (`idtipodeHogar`),
  CONSTRAINT `Cole` FOREIGN KEY (`idColegio`) REFERENCES `colegio` (`IdColegio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Declub` FOREIGN KEY (`idClub`) REFERENCES `clubs` (`idClub`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `TipoHogar` FOREIGN KEY (`idtipodeHogar`) REFERENCES `tipodehogar` (`idtipodeHogar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Turno` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`idturno`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `idEstudiante` FOREIGN KEY (`idEstudiante`) REFERENCES `persona` (`Id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `DiasdelaSemana` varchar(15) NOT NULL,
  `HoraFin` time NOT NULL,
  `HoraInicio` time NOT NULL,
  `Diastotales` int(11) NOT NULL,
  `horastotales` int(11) NOT NULL,
  `Comentario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for horariospersona
-- ----------------------------
DROP TABLE IF EXISTS `horariospersona`;
CREATE TABLE `horariospersona` (
  `Idperson` int(11) DEFAULT NULL,
  `NombrePersona` varchar(50) DEFAULT NULL,
  `Frhorario` int(11) DEFAULT NULL,
  KEY `APersona` (`Idperson`),
  KEY `NombPersona` (`NombrePersona`),
  KEY `Ahorario` (`Frhorario`),
  CONSTRAINT `APersona` FOREIGN KEY (`Idperson`) REFERENCES `persona` (`Id_persona`),
  CONSTRAINT `Ahorario` FOREIGN KEY (`Frhorario`) REFERENCES `horario` (`idHorario`),
  CONSTRAINT `NombPersona` FOREIGN KEY (`NombrePersona`) REFERENCES `persona` (`Nombresdepersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for organizacionesdeorigen
-- ----------------------------
DROP TABLE IF EXISTS `organizacionesdeorigen`;
CREATE TABLE `organizacionesdeorigen` (
  `IdOrganizacion` int(11) NOT NULL,
  `NombreEmpresa` varchar(100) NOT NULL,
  `Comentario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdOrganizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pasante
-- ----------------------------
DROP TABLE IF EXISTS `pasante`;
CREATE TABLE `pasante` (
  `idPasante` int(11) NOT NULL,
  `NombreUniversidad` varchar(50) NOT NULL,
  `HorasaEjecutar` int(11) DEFAULT NULL,
  `FechadeInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `idUniversitario` varchar(15) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `PeriodoqueCursa` varchar(15) NOT NULL,
  PRIMARY KEY (`idPasante`),
  CONSTRAINT `Pasante` FOREIGN KEY (`idPasante`) REFERENCES `persona` (`Id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for periodosactividad
-- ----------------------------
DROP TABLE IF EXISTS `periodosactividad`;
CREATE TABLE `periodosactividad` (
  `idPeriododeActividad` int(11) NOT NULL,
  `FechadeInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  PRIMARY KEY (`idPeriododeActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for periodosactividadpersona
-- ----------------------------
DROP TABLE IF EXISTS `periodosactividadpersona`;
CREATE TABLE `periodosactividadpersona` (
  `idPeriodoActividad` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idPeriodoActividad`,`idPersona`),
  KEY `idpersonaa` (`idPersona`),
  CONSTRAINT `IdPeriodoass` FOREIGN KEY (`idPeriodoActividad`) REFERENCES `periodosactividad` (`idPeriododeActividad`),
  CONSTRAINT `idpersonaa` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`Id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `Id_persona` int(11) NOT NULL,
  `Nombresdepersona` varchar(50) NOT NULL,
  `ApellidosdePersona` varchar(50) NOT NULL,
  `NoCedula` varchar(16) DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Celular` varchar(8) DEFAULT NULL,
  `Telefono` varchar(8) DEFAULT NULL,
  `Genero` varchar(15) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `FechadeNacimiento` date NOT NULL,
  `PaisdeOrigen` varchar(25) NOT NULL,
  `Nacionalidad` varchar(25) NOT NULL,
  `e-mail` varchar(25) DEFAULT NULL,
  `FotodePerfil` longblob,
  `tipodeimagen` varchar(255) DEFAULT NULL,
  `Estado` varchar(15) NOT NULL,
  `FechadeRegistro` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Fechadeultimaactualizacion` timestamp NULL DEFAULT NULL,
  `EstadoActual` bit(1) DEFAULT NULL,
  PRIMARY KEY (`Id_persona`),
  KEY `Nombresdepersona` (`Nombresdepersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for profesor
-- ----------------------------
DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `Gradoqueimparte` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `Colegio` int(11) NOT NULL,
  PRIMARY KEY (`idProfesor`),
  KEY `Colegio` (`Colegio`),
  CONSTRAINT `Colegio` FOREIGN KEY (`Colegio`) REFERENCES `colegio` (`IdColegio`) ON UPDATE CASCADE,
  CONSTRAINT `DatosPersona` FOREIGN KEY (`idProfesor`) REFERENCES `persona` (`Id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for proyectos
-- ----------------------------
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `idProyecto` int(11) NOT NULL,
  `NombreProyecto` varchar(50) NOT NULL,
  `FechaApertura` date NOT NULL,
  `Fechacierre` date DEFAULT NULL,
  `idEmpresaSocia` int(11) NOT NULL,
  `idColaborador` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `IDEmpre` (`idEmpresaSocia`),
  KEY `Colabb` (`idColaborador`),
  CONSTRAINT `Colabb` FOREIGN KEY (`idColaborador`) REFERENCES `trabajadores` (`IdColaborador`),
  CONSTRAINT `IDEmpre` FOREIGN KEY (`idEmpresaSocia`) REFERENCES `empresa` (`IdEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tareas
-- ----------------------------
DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `idtarea` int(11) NOT NULL,
  `Tarea` varchar(100) NOT NULL,
  PRIMARY KEY (`idtarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tareasvoluntarios
-- ----------------------------
DROP TABLE IF EXISTS `tareasvoluntarios`;
CREATE TABLE `tareasvoluntarios` (
  `idtarea` int(11) NOT NULL,
  `idvoluntario` int(11) DEFAULT NULL,
  KEY `tarea` (`idtarea`),
  KEY `VOlun` (`idvoluntario`),
  CONSTRAINT `VOlun` FOREIGN KEY (`idvoluntario`) REFERENCES `voluntario` (`idVoluntario`),
  CONSTRAINT `tarea` FOREIGN KEY (`idtarea`) REFERENCES `tareas` (`idtarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tipodehogar
-- ----------------------------
DROP TABLE IF EXISTS `tipodehogar`;
CREATE TABLE `tipodehogar` (
  `idtipodeHogar` int(11) NOT NULL,
  `tipodeHogar` varchar(20) NOT NULL,
  PRIMARY KEY (`idtipodeHogar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for trabajadores
-- ----------------------------
DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE `trabajadores` (
  `IdColaborador` int(11) NOT NULL,
  `CodigoTrabajador` varchar(11) NOT NULL,
  `Id_Cargo` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Salario` double DEFAULT NULL,
  PRIMARY KEY (`IdColaborador`),
  KEY `PosicionPerson` (`Id_Cargo`),
  CONSTRAINT `DatosPerson` FOREIGN KEY (`IdColaborador`) REFERENCES `persona` (`Id_persona`),
  CONSTRAINT `PosicionPerson` FOREIGN KEY (`Id_Cargo`) REFERENCES `cargos` (`idCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for turno
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `idturno` int(11) NOT NULL,
  `Turno` varchar(15) NOT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for voluntario
-- ----------------------------
DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE `voluntario` (
  `idVoluntario` int(11) NOT NULL,
  `OrganizaciondeOrigen` int(11) DEFAULT NULL,
  `Activo` bit(1) NOT NULL,
  PRIMARY KEY (`idVoluntario`),
  KEY `OrgOrigen` (`OrganizaciondeOrigen`),
  CONSTRAINT `OrgOrigen` FOREIGN KEY (`OrganizaciondeOrigen`) REFERENCES `organizacionesdeorigen` (`IdOrganizacion`),
  CONSTRAINT `Voluntario` FOREIGN KEY (`idVoluntario`) REFERENCES `persona` (`Id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
