-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- PostgreSQL version: 9.2
-- Project Site: pgmodeler.com.br
-- Model Author: ---

-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: new_database | type: DATABASE --
-- CREATE DATABASE new_database
-- ;
-- -- ddl-end --
-- 

-- object: "PERMISOS"."TBL_EMPLEADOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_EMPLEADOS"(
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"PRIMER_SEGUNDO_NOMBRE" character varying(100) NOT NULL,
	"PRIMER_SEGUNDO_APELLIDO" character varying(100) NOT NULL,
	"NOMBRE_USUARIO" character varying(100),
	"CONTRASENIA" character varying(100),
	"FECHA_CREACION" date,
	"SUELDO_BRUTO" double precision,
	"ESTADO_V" boolean NOT NULL DEFAULT FALSE,
	"ID_DEPARTAMENTO" character varying(10),
	"ID_JEFE" character varying(10),
	"ID_REGIONAL_MODALIDAD" character varying(5),
	CONSTRAINT "PK_ID_EMPLEADO" PRIMARY KEY ("ID_EMPLEADO")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_EMPLEADOS" IS 'Almacena todos los empleados.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."ID_EMPLEADO" IS 'Código del empleado que lo iidentifica de manera única.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."PRIMER_SEGUNDO_NOMBRE" IS 'Primer nombre del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."PRIMER_SEGUNDO_APELLIDO" IS 'Primer apellido del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."NOMBRE_USUARIO" IS 'Nombre de usuario el cual se le asignará para ingresar al sistema de permisos.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."CONTRASENIA" IS 'Contraseña que le permitirá ingresar al sistema de permisos junto con el nombre de usuario, que éste tenga asignado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."FECHA_CREACION" IS 'Fecha de creciaón del usuario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."SUELDO_BRUTO" IS 'Sueldo Bruto que goza el empleado, sin incluir deducciones.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."ESTADO_V" IS 'Estado que identifica si el empleado se encuentra de vacaciones. En el caso afirmativo será "1" (TRUE), caso contrario "0" (FALSE).';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."ID_DEPARTAMENTO" IS 'Permite saber a cuál departamento pertenece el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."ID_JEFE" IS 'Permite saber quién es jefe del empleado. En el caso de ser null, es porque es el mismo.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS"."ID_REGIONAL_MODALIDAD" IS 'Regional a la cuál pertenece el empleado y que modalidad tiene.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_TIPOS_USUARIOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_TIPOS_USUARIOS"(
	"ID_TIPO_USUARIO" integer NOT NULL,
	"TIPO_USUARIO" varchar(50) NOT NULL,
	CONSTRAINT "PK_ID_TIPO_USUARIO" PRIMARY KEY ("ID_TIPO_USUARIO")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_TIPOS_USUARIOS" IS 'Almacena los tipos de usuarios en este caso se consideraron solo 3 que son: Empleado, jefe temporal, jefe inmediato y de personal.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_USUARIOS"."ID_TIPO_USUARIO" IS 'Código del tipo de usuario que tendrán acceso al sistema.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_USUARIOS"."TIPO_USUARIO" IS 'Nombre del tipo usuario para identificarlo de manera más específica.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_TIPOS_USUARIOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_DEPARTAMENTOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_DEPARTAMENTOS"(
	"ID_DEPARTAMENTO" character varying(10) NOT NULL,
	"NOMBRE_DEPARTAMENTO" character varying(100) NOT NULL,
	"ID_DEPARTAMENTO_ANTECESOR" character varying(10),
	CONSTRAINT "PK_ID_DEPARTAMENTO" PRIMARY KEY ("ID_DEPARTAMENTO")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_DEPARTAMENTOS" IS 'Almacena todos los departamentos que estan en la institución.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_DEPARTAMENTOS"."ID_DEPARTAMENTO" IS 'Código del departamento.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_DEPARTAMENTOS"."NOMBRE_DEPARTAMENTO" IS 'Nombre del departamento.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_DEPARTAMENTOS"."ID_DEPARTAMENTO_ANTECESOR" IS 'Código del departamento que esta sobre otro.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_DEPARTAMENTOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_PLANILLAS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_PLANILLAS"(
	"ID_PLANILLA" character varying(20) NOT NULL,
	"NOMBRE_PLANILLA" character varying(30) NOT NULL,
	"FECHA" date NOT NULL,
	"DESCRIPCION" character varying(100),
	CONSTRAINT "PK_ID_PLANILLA" PRIMARY KEY ("ID_PLANILLA")

);
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLAS"."NOMBRE_PLANILLA" IS 'Nombre de la planilla, por ejemplo: Enero2016';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_PLANILLAS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_TIPOS_HORARIOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_TIPOS_HORARIOS"(
	"ID_TIPO_HORARIO" integer NOT NULL,
	"TIPO_HORARIO" character varying(60) NOT NULL,
	"HORAS_TRABAJADAS" integer NOT NULL,
	"DIAS_SEMANA" character varying(30) NOT NULL,
	"HORA_INICIO" time without time zone NOT NULL,
	"HORA_FIN" time without time zone NOT NULL,
	"FECHA_CREACION" timestamp without time zone NOT NULL,
	"FECHA_MODIFICACION" timestamp without time zone NOT NULL,
	CONSTRAINT "PK_ID_TIPO_HORARIO" PRIMARY KEY ("ID_TIPO_HORARIO")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_TIPOS_HORARIOS" IS 'Tabla que almacena todos los tipos de horarios que se le podrá asignar al empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."ID_TIPO_HORARIO" IS 'Código del tipo horario que existen.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."TIPO_HORARIO" IS 'Nombre del tipo de horario existan y los que se creen.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."HORAS_TRABAJADAS" IS 'Horas que se trabajan por día según el tipo de horario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."DIAS_SEMANA" IS 'Días de la semana que incluye el horario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."HORA_INICIO" IS 'Hora de inicio que empezaría labores el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."HORA_FIN" IS 'Hora de fin, es decir que finaliza las labores el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."FECHA_CREACION" IS 'Fecha en la que se crea el horario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_HORARIOS"."FECHA_MODIFICACION" IS 'En el caso que se llegue modificar el horario.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_TIPOS_HORARIOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_PERMISOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_PERMISOS"(
	"ID_PERMISO" integer NOT NULL,
	"ID_TIPO_AUSENCIA" integer NOT NULL,
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"FECHA_SOLICITUD" timestamp without time zone NOT NULL,
	"FECHA_INICIO" timestamp without time zone NOT NULL,
	"FECHA_FIN" timestamp without time zone NOT NULL,
	"DESCRIPCION_PERMISO" character varying(60) NOT NULL,
	"ESTADO_JEFE" boolean NOT NULL DEFAULT FALSE,
	"F_CAMBIO_ESTADO_JEFE" timestamp without time zone,
	"ID_JEFE" character varying(10) NOT NULL,
	"DESCRIPCION_DENEGACION_JEFE" character varying(50),
	"ESTADO_JPERSONAL" boolean NOT NULL DEFAULT FALSE,
	"F_CAMBIO_ESTADO_JPERSONAL" timestamp without time zone,
	"ID_EMPLEADO_PERSONAL" character varying(10),
	"DESCRIPCION_DENEGACION_JPERSONAL" character varying(50),
	"VISTO" boolean NOT NULL,
	CONSTRAINT "PK_ID_PERMISO" PRIMARY KEY ("ID_PERMISO")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_PERMISOS" IS 'Almacena todos los permisos que han sido solicitados por los empleados.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ID_PERMISO" IS 'Código de solicitud de permiso. Generado automáticamente por secuencia.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ID_TIPO_AUSENCIA" IS 'Código del tipo de ausencia que solicita el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ID_EMPLEADO" IS 'Código del empleado que solicita el permiso.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."FECHA_SOLICITUD" IS 'Cuándo se hace la solicitud de permiso por parte del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."FECHA_INICIO" IS 'Fecha de inicio para el goce del permiso por parte del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."FECHA_FIN" IS 'Fecha cuando termina el permiso que solicita el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."DESCRIPCION_PERMISO" IS 'El empleado describe por qué solicita el permiso.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ESTADO_JEFE" IS 'Estado del jefe cuando responde a la solicitud de permiso del empleado. Por defecto será FALSE, cambiará en el caso de que ha sido desfavorable (0 o F) y favorable (1 o T).';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."F_CAMBIO_ESTADO_JEFE" IS 'Fecha en la que el Jefe a dado respuesta a la solicitud de permiso. Ya sea favorable o denegado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ID_JEFE" IS 'Jefe a quien va dirigida la solicitud de permiso.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."DESCRIPCION_DENEGACION_JEFE" IS 'En el caso de que la solicitud de permiso sea denegada, el jefe escribe la razón.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ESTADO_JPERSONAL" IS 'Estado del jefe de personal cuando responde a la solicitud de permiso del empleado. Por defecto será FALSE, cambiará en el caso de que ha sido desfavorable (0 o F) y favorable (1 o T).';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."F_CAMBIO_ESTADO_JPERSONAL" IS 'Fecha en la que el Jefe de Personal a dado respuesta a la solicitud de permiso. Ya sea favorable o denegado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."ID_EMPLEADO_PERSONAL" IS 'Empleado del Depto. de Personal que acepta o niega la solicitud de permiso.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."DESCRIPCION_DENEGACION_JPERSONAL" IS 'En el caso de que la solicitud de permiso sea denegada, el jefe de personal escribe la razón.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PERMISOS"."VISTO" IS 'Permite saber si el empleado ya miró el permiso solicitado.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_PERMISOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_TIPOS_AUSENCIAS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_TIPOS_AUSENCIAS"(
	"ID_TIPO_AUSENCIA" integer NOT NULL,
	"TIPO_AUSENCIA" character varying(70) NOT NULL,
	"FECHA_MODIFICACION" timestamp without time zone NOT NULL,
	"FECHA_CREACION" timestamp without time zone NOT NULL,
	"GOZA_SUELDO" boolean NOT NULL,
	"TIEMPO_MAXIMO_HORAS" integer,
	"TIEMPO_MAXIMO_DIAS" integer,
	CONSTRAINT "PK_ID_TIPO_PERMISO" PRIMARY KEY ("ID_TIPO_AUSENCIA")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_TIPOS_AUSENCIAS" IS 'Esta tabla se almacenará tanto los tipos de permisos como tipos de ausencias.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."ID_TIPO_AUSENCIA" IS 'Código para identifar el tipo de ausencia.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."TIPO_AUSENCIA" IS 'Se incluye nombres de los tipos de ausencia y/o tipos de permisos.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."FECHA_MODIFICACION" IS 'Si se llegasé a modificar el nombre del tipo de ausencia, goce de sueldo y/o uno de sus tiempos máximos.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."FECHA_CREACION" IS 'Fecha en la que se crea el tipo de ausencia o permiso.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."GOZA_SUELDO" IS 'Dirá si esa ausencia o permiso gozará de sueldo.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."TIEMPO_MAXIMO_HORAS" IS 'Tiempo máximo en horas que el usuario dispondrá según el tipo de ausencia.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_TIPOS_AUSENCIAS"."TIEMPO_MAXIMO_DIAS" IS 'Tiempo máximo en días que el empleado dispondrá según el tipo de ausencia.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_TIPOS_AUSENCIAS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_EMPLEADO_X_PLANILLA" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"(
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"ID_PLANILLA" character varying(20) NOT NULL,
	"HORAS_TOTAL_TRABAJADAS" integer NOT NULL,
	"DEDUCCIONES" double precision NOT NULL,
	"SUELDO_NETO" double precision NOT NULL
);
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"."ID_EMPLEADO" IS 'Código del empleado a quién se le esta pagando.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"."ID_PLANILLA" IS 'Código de la planilla a que hace referencia.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"."HORAS_TOTAL_TRABAJADAS" IS 'Horas total trabajadas del empleado en el mes.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"."DEDUCCIONES" IS 'Deducciones respecto las horas no laboradas, por medio de una función. Se toma en cuenta aquello permisos sin goce de sueldo.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADO_X_PLANILLA"."SUELDO_NETO" IS 'Sueldo calculado Sueldo Bruto - Deducciones';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_EMPLEADO_X_PLANILLA" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_BITACORA" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_BITACORA"(
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"FECHA_HORA" timestamp without time zone NOT NULL,
	"DESCRIPCION_ACCION" character varying(60) NOT NULL
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_BITACORA" IS 'Almacena los accesos al sistema.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_BITACORA"."ID_EMPLEADO" IS 'Código del empleado que accedió al sistema.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_BITACORA"."FECHA_HORA" IS 'Fecha y hora a la que accede al sistema.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_BITACORA"."DESCRIPCION_ACCION" IS 'Descripción de manera breve sobre la acción del empleado en el sistema.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_BITACORA" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS"(
	"NOMBRE_USUARIO" character varying(100) NOT NULL,
	"CONTRASENIA_ANTERIOR" character varying(100) NOT NULL,
	"FECHA_MODIFICACION" timestamp without time zone NOT NULL
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS" IS 'Almacena las modificaciones que hacen los empleados respecto a su contraseña.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS"."NOMBRE_USUARIO" IS 'Nombre del usuario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS"."CONTRASENIA_ANTERIOR" IS 'Contraseña anterior que el empleado tenía.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS"."FECHA_MODIFICACION" IS 'Fecha y hora  que el empleado modificó la contraseña.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"(
	"ID_TIPO_USUARIO" integer NOT NULL,
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"FECHA_AGREGADO" timestamp without time zone NOT NULL,
	"FECHA_INICIO" date,
	"FECHA_FIN" date,
	"ESTADO" boolean NOT NULL
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" IS 'Almacena todas las transacciones o cambios que se realice respecto al tipo de usuario que pueda tener el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."ID_TIPO_USUARIO" IS 'Código del tipo usuario asignado al empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."ID_EMPLEADO" IS 'Código del empleado a quién se le asigno un tipo de usuario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."FECHA_AGREGADO" IS 'Fecha cuando se le asignó el tipo de usuario.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."FECHA_INICIO" IS 'Fecha en la que empieza su cargo funcional solo cuando es como jefe temporal.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."FECHA_FIN" IS 'Fecha cuando termina su cargo funcional solo como jefe temporal.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"."ESTADO" IS 'Dos opciones 1: Activo 0: Inactivo, en los casos de cuando el empleado es dado de baja, se le da o quita la función de jefe temporal o cuando se le asigna un tipo de usuario.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_REGIONALES" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_REGIONALES"(
	"ID_REGIONAL_MODALIDAD" character varying(5) NOT NULL,
	"NOMBRE_REGIONAL" character varying(100) NOT NULL,
	"DIRECCION" character varying(100) NOT NULL,
	CONSTRAINT "PK_ID_REGIONAL" PRIMARY KEY ("ID_REGIONAL_MODALIDAD")

);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_REGIONALES" IS 'Almacena las regionales del país que tiene el MP.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_REGIONALES"."ID_REGIONAL_MODALIDAD" IS 'Código que identifica a la regional y la modalidad a la que pertenece.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_REGIONALES"."NOMBRE_REGIONAL" IS 'Nombre de la regional.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_REGIONALES"."DIRECCION" IS 'Direccion de dónde se encuentra la regional.';
-- ddl-end --
COMMENT ON CONSTRAINT "PK_ID_REGIONAL" ON "PERMISOS"."TBL_REGIONALES" IS 'Llave primaria.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_REGIONALES" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_HORARIOS_X_EMPLEADO" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"(
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"ID_TIPO_HORARIO" integer NOT NULL,
	"FECHA_ASIGNACION" timestamp without time zone NOT NULL
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO" IS 'Tabla que almacena todos los horarios que el empleado tiene asignado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"."ID_EMPLEADO" IS 'Código del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"."ID_TIPO_HORARIO" IS 'Código del tipo de horario que el empleado tiene asignado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"."FECHA_ASIGNACION" IS 'Fecha cuando le asignaron el horario al empleado.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_PLANILLA_GENERAL" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_PLANILLA_GENERAL"(
	"ID_EMPLEADO" character varying(10) NOT NULL,
	"NO_CORRELATIVO" integer NOT NULL,
	"NOMBRE_EMPLEADO" character varying(100) NOT NULL,
	"DEPARTAMENTO" character varying(100) NOT NULL,
	"MODALIDAD" character varying(60) NOT NULL,
	"ID_PLANILLA" character varying(20) NOT NULL,
	"FECHA" date NOT NULL,
	"DIAS_DEDUCCIONES" character varying(100) NOT NULL,
	"TOTAL_MINUTOS" integer NOT NULL,
	"TOTAL_DIAS" integer NOT NULL,
	"VALOR_POR_MINUTO" double precision NOT NULL,
	"TOTAL_MINUTOS_DEDUCIR" double precision NOT NULL,
	"VALOR_DIA" double precision NOT NULL,
	"TOTAL_DEDUCCIONES_DIAS" double precision NOT NULL,
	"TOTAL_DEDUCCIONES" double precision NOT NULL,
	"SUELDO_NETO" double precision NOT NULL
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_PLANILLA_GENERAL" IS 'Planilla general.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."ID_EMPLEADO" IS 'Código del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."NO_CORRELATIVO" IS 'Número correlativo';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."NOMBRE_EMPLEADO" IS 'Nombre y apellido del empleado';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."DEPARTAMENTO" IS 'Nombre del departamento que pertenece el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."MODALIDAD" IS 'Nombre de la modalidad que pertenece el empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."ID_PLANILLA" IS 'Código de la planilla generada.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."FECHA" IS 'Fecha en que se genera la planilla.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."DIAS_DEDUCCIONES" IS 'Especificación de los días a deducir.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."TOTAL_MINUTOS" IS 'Total en minutos a deducir.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."TOTAL_DIAS" IS 'Total de días a deducir.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."VALOR_POR_MINUTO" IS 'Valor por minuto en lempiras.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."TOTAL_MINUTOS_DEDUCIR" IS 'Total de minutos a deducir';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."VALOR_DIA" IS 'Pago por día trabajado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."TOTAL_DEDUCCIONES_DIAS" IS 'Total a deducir por los días no asistidos.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."TOTAL_DEDUCCIONES" IS 'Suma total de las deducciones de minuto y/o días.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_PLANILLA_GENERAL"."SUELDO_NETO" IS 'Sueldo neto del mes.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_PLANILLA_GENERAL" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_MARCAS_RELOJ" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_MARCAS_RELOJ"(
	"DEPARTAMENTO" character varying(100) NOT NULL,
	"APELLIDO_NOMBRE" character varying(100) NOT NULL,
	"NO_LEGAJO" character varying(10) NOT NULL,
	"FECHA_HORA" date NOT NULL,
	"LAPSO_HORARIO" character varying(60) NOT NULL,
	"REGISTRO_ENTRADA" timestamp without time zone,
	"REGISTRO_SALIDA" timestamp without time zone,
	"LLEGADA_TARDE" time without time zone,
	"SALIDA_ANTICIPADA" time without time zone,
	"TIEMPO_ADIC_EXTRA" time without time zone,
	"DESCRIPCION" text
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_MARCAS_RELOJ" IS 'Almacena las marcas del reloj por un mes.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."DEPARTAMENTO" IS 'Lugar donde trabaja.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."APELLIDO_NOMBRE" IS 'Apellido y nombre del empleado separado por comas.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."NO_LEGAJO" IS 'Número del empleado, sin ceros.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."FECHA_HORA" IS 'Fecha y hora de la marca.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."LAPSO_HORARIO" IS 'Horario asignado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."REGISTRO_ENTRADA" IS 'Fecha y hora en la que marcó la entrada.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."REGISTRO_SALIDA" IS 'Fecha y hora en la que marcó la salida.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."LLEGADA_TARDE" IS 'Total minutos que marco tarde, osea después de los diez minutos de gracia.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."SALIDA_ANTICIPADA" IS 'Total de minutos que marcó antes de su horario de salida.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."TIEMPO_ADIC_EXTRA" IS 'Tiempo compensatorio.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_MARCAS_RELOJ"."DESCRIPCION" IS 'Observaciones generales.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_MARCAS_RELOJ" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "PERMISOS"."TBL_ARCHIVO" | type: TABLE --
CREATE TABLE "PERMISOS"."TBL_ARCHIVO"(
	"DEPARTAMENTO" character varying(100) NOT NULL,
	"APELLIDO_NOMBRE" character varying(100) NOT NULL,
	"NO_LEGAJO" character varying(10) NOT NULL,
	"FECHA_HORA" character varying(30),
	"LAPSO_HORARIO" character varying(60) NOT NULL,
	"REGISTRO_ENTRADA" character varying(50),
	"REGISTRO_SALIDA" character varying(50),
	"LLEGADA_TARDE" character varying(30),
	"SALIDA_ANTICIPADA" character varying(30),
	"TIEMPO_ADIC_EXTRA" character varying(30),
	"DESCRIPCION" character varying(100)
);
-- ddl-end --
COMMENT ON TABLE "PERMISOS"."TBL_ARCHIVO" IS 'Almacena las marcas del reloj por un mes.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."DEPARTAMENTO" IS 'Lugar donde trabaja.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."APELLIDO_NOMBRE" IS 'Apellido y nombre separado por comas.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."NO_LEGAJO" IS 'Número del empleado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."FECHA_HORA" IS 'Fecha cuando marcó.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."LAPSO_HORARIO" IS 'Nombre del horario asignado.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."REGISTRO_ENTRADA" IS 'Fecha y hora en la que marcó la entrada.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."REGISTRO_SALIDA" IS 'Fecha y hora en la que marcó la salida.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."LLEGADA_TARDE" IS 'Total de minutos que marcó tarde en un día en específico.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."SALIDA_ANTICIPADA" IS 'Total de minutos que marcó antes de su horario de salida.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."TIEMPO_ADIC_EXTRA" IS 'Tiempo compensatorio.';
-- ddl-end --
COMMENT ON COLUMN "PERMISOS"."TBL_ARCHIVO"."DESCRIPCION" IS 'Observacion generales.';
-- ddl-end --
ALTER TABLE "PERMISOS"."TBL_ARCHIVO" OWNER TO "PERMISOS";
-- ddl-end --

-- object: "FK_ID_JEFE" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS" ADD CONSTRAINT "FK_ID_JEFE" FOREIGN KEY ("ID_JEFE")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_DEPARTAMENTO" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS" ADD CONSTRAINT "FK_ID_DEPARTAMENTO" FOREIGN KEY ("ID_DEPARTAMENTO")
REFERENCES "PERMISOS"."TBL_DEPARTAMENTOS" ("ID_DEPARTAMENTO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_REGIONAL_MODALIDAD" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS" ADD CONSTRAINT "FK_ID_REGIONAL_MODALIDAD" FOREIGN KEY ("ID_REGIONAL_MODALIDAD")
REFERENCES "PERMISOS"."TBL_REGIONALES" ("ID_REGIONAL_MODALIDAD") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_DEPTO_ANTECESOR" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_DEPARTAMENTOS" ADD CONSTRAINT "FK_DEPTO_ANTECESOR" FOREIGN KEY ("ID_DEPARTAMENTO_ANTECESOR")
REFERENCES "PERMISOS"."TBL_DEPARTAMENTOS" ("ID_DEPARTAMENTO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_TIPO_AUSENCIA" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_PERMISOS" ADD CONSTRAINT "FK_ID_TIPO_AUSENCIA" FOREIGN KEY ("ID_TIPO_AUSENCIA")
REFERENCES "PERMISOS"."TBL_TIPOS_AUSENCIAS" ("ID_TIPO_AUSENCIA") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_JEFE_INM" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_PERMISOS" ADD CONSTRAINT "FK_ID_JEFE_INM" FOREIGN KEY ("ID_JEFE")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_EMPLEADO_PERSONAL" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_PERMISOS" ADD CONSTRAINT "FK_ID_EMPLEADO_PERSONAL" FOREIGN KEY ("ID_EMPLEADO_PERSONAL")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_EMPLEADO_SOLIC" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_PERMISOS" ADD CONSTRAINT "FK_ID_EMPLEADO_SOLIC" FOREIGN KEY ("ID_EMPLEADO")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_EMPLEADO" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADO_X_PLANILLA" ADD CONSTRAINT "FK_ID_EMPLEADO" FOREIGN KEY ("ID_EMPLEADO")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_PLANILLA" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADO_X_PLANILLA" ADD CONSTRAINT "FK_ID_PLANILLA" FOREIGN KEY ("ID_PLANILLA")
REFERENCES "PERMISOS"."TBL_PLANILLAS" ("ID_PLANILLA") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_EMPLEADO_USR" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" ADD CONSTRAINT "FK_ID_EMPLEADO_USR" FOREIGN KEY ("ID_EMPLEADO")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_ID_TIPO_USUARIO_EMPL" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" ADD CONSTRAINT "FK_ID_TIPO_USUARIO_EMPL" FOREIGN KEY ("ID_TIPO_USUARIO")
REFERENCES "PERMISOS"."TBL_TIPOS_USUARIOS" ("ID_TIPO_USUARIO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_HORARIO_ID_EMPLEADO" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO" ADD CONSTRAINT "FK_HORARIO_ID_EMPLEADO" FOREIGN KEY ("ID_EMPLEADO")
REFERENCES "PERMISOS"."TBL_EMPLEADOS" ("ID_EMPLEADO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --


-- object: "FK_EMPLEADO_ID_TIPO_HORARIO" | type: CONSTRAINT --
ALTER TABLE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO" ADD CONSTRAINT "FK_EMPLEADO_ID_TIPO_HORARIO" FOREIGN KEY ("ID_TIPO_HORARIO")
REFERENCES "PERMISOS"."TBL_TIPOS_HORARIOS" ("ID_TIPO_HORARIO") MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE NOT DEFERRABLE;
-- ddl-end --



