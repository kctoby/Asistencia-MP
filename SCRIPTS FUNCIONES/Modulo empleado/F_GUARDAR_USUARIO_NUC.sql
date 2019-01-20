-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
--Función para crear usuario & guardar el nombre de usuario y contraseña
--Parametros de entrada: ID_EMPLEADO, NOMBRE_USUARIO, CONTRASEÑA
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_USUARIO_NUC(IN P_ID_EMPLEADO CHARACTER VARYING (10),
							    IN P_NOMBRE_USUARIO CHARACTER VARYING (100), 
							    IN P_CONTRASENIA CHARACTER VARYING(100)) 
RETURNS VOID AS $$
DECLARE 
 v_fecha_creacion timestamp without time zone;
 v_nombre_usuario character varying(100);
 v_contrasenia character varying(100);
BEGIN
	v_fecha_creacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

	UPDATE "PERMISOS"."TBL_EMPLEADOS"
	   SET "NOMBRE_USUARIO" = P_NOMBRE_USUARIO, "CONTRASENIA" = P_CONTRASENIA, "FECHA_CREACION" = v_fecha_creacion, "ESTADO_V" = TRUE
	 WHERE "ID_EMPLEADO" = P_ID_EMPLEADO;

END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_NUC('000002', 'isabel.tejada', 'asd.123456');