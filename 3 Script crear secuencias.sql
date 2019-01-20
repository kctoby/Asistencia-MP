--Crear secuencias
--1. Secuencia para la tabla TBL_TIPOS_USUARIOS
CREATE SEQUENCE "PERMISOS".sqidtipousuario
   INCREMENT 1
   START 1;
ALTER SEQUENCE "PERMISOS".sqidtipousuario
  OWNER TO "PERMISOS";

ALTER TABLE "PERMISOS"."TBL_TIPOS_USUARIOS"
   ALTER COLUMN "ID_TIPO_USUARIO" SET DEFAULT nextval('"PERMISOS".sqidtipousuario'::regclass);

--2. Secuencia para la tabla TBL_TIPOS_HORARIOS
CREATE SEQUENCE "PERMISOS".sqidtipohorario
   INCREMENT 1
   START 1;
ALTER SEQUENCE "PERMISOS".sqidtipohorario
  OWNER TO "PERMISOS";


 ALTER TABLE "PERMISOS"."TBL_TIPOS_HORARIOS"
   ALTER COLUMN "ID_TIPO_HORARIO" SET DEFAULT nextval('"PERMISOS".sqidtipohorario'::regclass);

--3. Secuencia para la tabla TBL_PERMISOS
CREATE SEQUENCE "PERMISOS".sqidpermiso
   INCREMENT 1
   START 8;
ALTER SEQUENCE "PERMISOS".sqidpermiso
  OWNER TO "PERMISOS";


 ALTER TABLE "PERMISOS"."TBL_PERMISOS"
   ALTER COLUMN "ID_PERMISO" SET DEFAULT nextval('"PERMISOS".sqidpermiso'::regclass);

--4. Secuencia para la tabla TBL_TIPOS_AUSENCIAS
CREATE SEQUENCE "PERMISOS".sqidtipoausencia
   INCREMENT 1
   START 1;
ALTER SEQUENCE "PERMISOS".sqidtipoausencia
  OWNER TO "PERMISOS";


 ALTER TABLE "PERMISOS"."TBL_TIPOS_AUSENCIAS"
   ALTER COLUMN "ID_TIPO_AUSENCIA" SET DEFAULT nextval('"PERMISOS".sqidtipoausencia'::regclass);				
