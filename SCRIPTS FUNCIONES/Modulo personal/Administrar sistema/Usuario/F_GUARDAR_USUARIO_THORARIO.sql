-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
--Cuando se crea el usuario también se necesita guardar en la tabla de TBL_HORARIOS_X_EMPLEADO,
--para este caso solo interesa los parametros de entrada del ID_EMPLEADO, TIPO_HORARIO.
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_USUARIO_THORARIO(IN P_ID_EMPLEADO CHARACTER VARYING(10), 
								 IN P_TIPO_HORARIO CHARACTER VARYING(50))
RETURNS VOID AS $$
DECLARE
v_id_tipo_horario integer;
v_fecha_asignacion timestamp without time zone;
v_estado boolean;
BEGIN
	--Fecha actual
	v_fecha_asignacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_estado := TRUE;
	
	--Obtener el tipo de usuario de acuerdo al nombre del tipo de usuario
	SELECT A."ID_TIPO_HORARIO" INTO v_id_tipo_horario
	FROM "PERMISOS"."TBL_TIPOS_HORARIOS" A
	WHERE A."TIPO_HORARIO" = P_TIPO_HORARIO;
	
	INSERT INTO "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"("ID_EMPLEADO", "ID_TIPO_HORARIO", "FECHA_ASIGNACION")
	VALUES (P_ID_EMPLEADO, v_id_tipo_horario, v_fecha_asignacion);
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_THORARIO('000002','HORARIO DE TRABAJO SOCIAL');