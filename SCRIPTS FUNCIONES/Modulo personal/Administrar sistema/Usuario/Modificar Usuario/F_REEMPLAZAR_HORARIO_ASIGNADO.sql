-------------------	A D M I N I S T R A R     S I S T E M A     M O D I F I C A C I O N    U S U A R I O	-------------------
--OPCION 2.2: SI ELIJE REEMPLAZAR HORARIO SELECCIONADO
CREATE OR REPLACE FUNCTION "PERMISOS".F_REEMPLAZAR_HORARIO_ASIGNADO(IN P_ID_EMPLEADO CHARACTER VARYING(10), 
								    IN P_TIPO_HORARIO_ANTERIOR CHARACTER VARYING(60),
								    IN P_ID_NUEVO_TIPO_HORARIO INTEGER) 
RETURNS VOID AS $$
DECLARE
 v_fecha_asignacion timestamp without time zone;
 v_id_tipo_horario_anterior integer; 
BEGIN
	--Fecha asignacion
	v_fecha_asignacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

	--Obtener el id de tipo horario anterior
	SELECT A."ID_TIPO_HORARIO"
	INTO v_id_tipo_horario_anterior
	FROM "PERMISOS"."TBL_TIPOS_HORARIOS" A
	WHERE A."TIPO_HORARIO" = P_TIPO_HORARIO_ANTERIOR;
	
	UPDATE "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"
	SET "ID_TIPO_HORARIO" = P_ID_NUEVO_TIPO_HORARIO, "FECHA_ASIGNACION" = v_fecha_asignacion
	WHERE "ID_EMPLEADO" = P_ID_EMPLEADO AND "ID_TIPO_HORARIO" = v_id_tipo_horario_anterior;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutando
SELECT * FROM "PERMISOS".F_REEMPLAZAR_HORARIO_ASIGNADO('000028', 'HORARIO SABATINO', 1);