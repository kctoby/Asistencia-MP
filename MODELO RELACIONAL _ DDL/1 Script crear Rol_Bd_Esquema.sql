--Se crea el rol llamado "PERMISOS" con la contraseña 'permisos.MP'
CREATE ROLE "PERMISOS" LOGIN ENCRYPTED PASSWORD 'md5fc74e85dceb0ea0453175fd3c072b733'
  CREATEDB CREATEROLE REPLICATION
   VALID UNTIL 'infinity';

--Se crea la Base de Datos llamada "PERMISOS" con el propietario "PERMISOS"
CREATE DATABASE "BD_PERMISOS"
  WITH ENCODING='UTF8'
       OWNER="PERMISOS"
       CONNECTION LIMIT=-1;

--Se realiza una nueva conexión con la base de datos "BD_PERMISOS", nombre de usuario "PERMISOS".
-- object: "PERMISOS" | type: SCHEMA --
CREATE SCHEMA "PERMISOS";
ALTER SCHEMA "PERMISOS" OWNER TO "PERMISOS";
-- ddl-end --