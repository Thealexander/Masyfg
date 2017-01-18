/*
Navicat PGSQL Data Transfer

Source Server         : PostgreSQL
Source Server Version : 90601
Source Host           : localhost:5439
Source Database       : msyfgaccesousuarios
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90601
File Encoding         : 65001

Date: 2016-11-20 23:34:11
*/


-- ----------------------------
-- Table structure for Tiposdeusuarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."Tiposdeusuarios";
CREATE TABLE "public"."Tiposdeusuarios" (
"idTipoUsuario" int4 NOT NULL,
"Tipodeusuario" varchar(15) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Table structure for Usuarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."Usuarios";
CREATE TABLE "public"."Usuarios" (
"IdUser" int4 NOT NULL,
"Nombreusuario" varchar(15) COLLATE "default" NOT NULL,
"Password" varchar(12) COLLATE "default" NOT NULL,
"idTipousuario" int4 NOT NULL,
"email" varchar(35) COLLATE "default" NOT NULL,
"Estado" bit(1) NOT NULL,
"Fotoperfil" bytea NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table Tiposdeusuarios
-- ----------------------------
ALTER TABLE "public"."Tiposdeusuarios" ADD PRIMARY KEY ("idTipoUsuario");

-- ----------------------------
-- Primary Key structure for table Usuarios
-- ----------------------------
ALTER TABLE "public"."Usuarios" ADD PRIMARY KEY ("IdUser");

-- ----------------------------
-- Foreign Key structure for table "public"."Usuarios"
-- ----------------------------
ALTER TABLE "public"."Usuarios" ADD FOREIGN KEY ("idTipousuario") REFERENCES "public"."Tiposdeusuarios" ("idTipoUsuario") ON DELETE NO ACTION ON UPDATE NO ACTION;
