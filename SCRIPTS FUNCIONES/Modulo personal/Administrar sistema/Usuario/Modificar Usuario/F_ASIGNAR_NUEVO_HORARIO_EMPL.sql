-------------------	A D M I N I S T R A R     S I S T E M A     M O D I F I C A C I O N    U S U A R I O	-------------------
--OPCION 3: Asignar un nuevo horario al empleado.
CREATE OR REPLACE FUNCTION "PERMISOS".F_ASIGNAR_NUEVO_HORARIO_EMPL(IN P_ID_EMPLEADO CHARACTER VARYING(10),
								   IN P_TIPO_HORARIO_NUEVO CHARACTER VARYING(60)) 
RETURNS VOID AS $$
DECLARE
 v_fecha_asignacion timestamp without time zone;
 v_id_tipo_horario_nuevo integer; 
BEGIN
	--Fecha asignacion
	v_fecha_asignacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

	--Seleccionar el id del nuevo tipo horario asignar.
	SELECT A."ID_TIPO_HORARIO"
	INTO v_id_tipo_horario_nuevo
	FROM "PERMISOS"."TBL_TIPOS_HORARIOS" A
	WHERE A."TIPO_HORARIO" = P_TIPO_HORARIO_NUEVO;

	INSERT INTO "PERMISOS"."TBL_HORARIOS_X_EMPLEADO"("ID_EMPLEADO", "ID_TIPO_HORARIO", "FECHA_ASIGNACION")
	VALUES (P_ID_EMPLEADO, v_id_tipo_horario_nuevo, v_fecha_asignacion);
END;
$$ LANGUAGE 'plpgsql';

--Ejecutando
SELECT * FROM "PERMISOS".F_ASIGNAR_NUEVO_HORARIO_EMPL('000028','HORARIO SABATINO');