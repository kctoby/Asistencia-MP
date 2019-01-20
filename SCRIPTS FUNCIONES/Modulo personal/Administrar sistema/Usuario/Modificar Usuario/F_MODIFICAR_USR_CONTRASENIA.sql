-------------------	A D M I N I S T R A R     S I S T E M A     M O D I F I C A C I O N    U S U A R I O	-------------------
--OPCION 1: ELEGIR MODIFICAR CONTRASEÑA
--Tabla afectada: TBL_MODIFICACIONES_EMPLEADOS (si elije contraseña) y TBL_EMPLEADOS
CREATE OR REPLACE FUNCTION "PERMISOS".F_MODIFICAR_USR_CONTRASENIA(IN P_ID_EMPLEADO CHARACTER VARYING(10),
								  IN P_NUEVA_CONTRASENIA CHARACTER VARYING(50)) 
RETURNS VOID AS $$
DECLARE
 v_nombre_usuario character varying(100);
 v_contrasenia_anterior character varying(100);
 v_fecha_modificacion timestamp without time zone;
BEGIN

	--Fecha modificación
	v_fecha_modificacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	
	--Seleccionar la contraseña anterior y el usuario.
	SELECT A."NOMBRE_USUARIO", A."CONTRASENIA"
	INTO v_nombre_usuario, v_contrasenia_anterior
	FROM "PERMISOS"."TBL_EMPLEADOS" A
	WHERE A."ID_EMPLEADO" = P_ID_EMPLEADO;
	
	--En la tabla empleados se guarda la nueva contrasenia reemplazando la contraseña anterior.
	UPDATE "PERMISOS"."TBL_EMPLEADOS"
	SET "CONTRASENIA" = P_NUEVA_CONTRASENIA
	WHERE "ID_EMPLEADO" = P_ID_EMPLEADO;

	--Insertar en la tabla de modificaciones de empleados.
	INSERT INTO "PERMISOS"."TBL_MODIFICACIONES_EMPLEADOS"("NOMBRE_USUARIO", "CONTRASENIA_ANTERIOR", "FECHA_MODIFICACION")
	VALUES (v_nombre_usuario, v_contrasenia_anterior, v_fecha_modificacion);
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_MODIFICAR_USR_CONTRASENIA('000001', 'ASD.456');
