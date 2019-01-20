--Solicitar permiso
CREATE OR REPLACE FUNCTION "PERMISOS".F_SOLICITAR_PERMISO(IN P_TIPO_AUSENCIA CHARACTER VARYING(70), 
								IN P_ID_EMPLEADO CHARACTER VARYING(10),
								IN P_FECHA_INICIO TIMESTAMP WITHOUT TIME ZONE, 
								IN P_FECHA_FIN TIMESTAMP WITHOUT TIME ZONE,
								IN P_DESCRIPCION_PERSMISO CHARACTER VARYING(100), 
								IN P_NOMBRE_SCOMPLETO_JEFE TEXT) 
RETURNS TABLE(ID_PERMISO_SOLICITA INTEGER) AS 
$BODY$
DECLARE
 v_id_tipo_ausencia integer;
 v_fecha_solicitud timestamp without time zone;
 v_fecha_inicio timestamp without time zone;
 v_fecha_fin timestamp without time zone;
 v_estado_jefe boolean;
 v_estado_jpersonal boolean;
 v_primer_nombre_jefe character varying;
 v_primer_apellido_jefe character varying;
 v_id_jefe character varying;
 v_nombre_semi_completo text;
 v_id_permiso_actual integer;
 --Declarando el cursor para obtener todos los nombres de los empleados completo
 C_EMPLEADOS CURSOR IS SELECT C."PRIMER_SEGUNDO_NOMBRE", C."PRIMER_SEGUNDO_APELLIDO", C."ID_EMPLEADO"
			FROM "PERMISOS"."TBL_EMPLEADOS" C;
 V_REGISTRO "PERMISOS"."TBL_EMPLEADOS"%ROWTYPE;
 BEGIN
	v_fecha_solicitud := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_fecha_inicio := to_char(P_FECHA_INICIO, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_fecha_fin := to_char(P_FECHA_FIN, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_estado_jefe := FALSE;
	v_estado_jpersonal := FALSE;

	--Seleccionar el identificador del tipo de ausencia seleccionada
	SELECT A."ID_TIPO_AUSENCIA" INTO v_id_tipo_ausencia
	FROM "PERMISOS"."TBL_TIPOS_AUSENCIAS" A
	WHERE A."TIPO_AUSENCIA" = P_TIPO_AUSENCIA;

	OPEN C_EMPLEADOS;
	 LOOP
		 FETCH C_EMPLEADOS INTO V_REGISTRO."PRIMER_SEGUNDO_NOMBRE", V_REGISTRO."PRIMER_SEGUNDO_APELLIDO", 
					V_REGISTRO."ID_EMPLEADO";
		  EXIT WHEN NOT FOUND;
		  
			v_nombre_semi_completo := V_REGISTRO."PRIMER_SEGUNDO_NOMBRE" || ' ' || V_REGISTRO."PRIMER_SEGUNDO_APELLIDO";
			v_id_jefe := V_REGISTRO."ID_EMPLEADO";

			IF (v_nombre_semi_completo = P_NOMBRE_SCOMPLETO_JEFE ) THEN


			   BEGIN
				INSERT INTO "PERMISOS"."TBL_PERMISOS"("ID_TIPO_AUSENCIA", "ID_EMPLEADO", "FECHA_SOLICITUD", 
				    "FECHA_INICIO", "FECHA_FIN", "DESCRIPCION_PERMISO", "ESTADO_JEFE", 
				    "F_CAMBIO_ESTADO_JEFE", "ID_JEFE", "DESCRIPCION_DENEGACION_JEFE", 
				    "ESTADO_JPERSONAL", "F_CAMBIO_ESTADO_JPERSONAL", "ID_EMPLEADO_PERSONAL", 
				    "DESCRIPCION_DENEGACION_JPERSONAL", "VISTO", "ESTADO_REVERTIR_PERMISO")
				VALUES (v_id_tipo_ausencia, P_ID_EMPLEADO, v_fecha_solicitud, 
				    v_fecha_inicio, v_fecha_fin, P_DESCRIPCION_PERSMISO, 
				    v_estado_jefe, null, v_id_jefe, null, 
				    v_estado_jpersonal, null, null, null, FALSE, FALSE);
			   END;
			END IF;
	 END LOOP;
	CLOSE C_EMPLEADOS;

	RETURN query SELECT last_value::integer
		     FROM "PERMISOS".sqidpermiso;
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar función
SELECT * FROM "PERMISOS".F_SOLICITAR_PERMISO('AUSENCIA DE MEDIO TIEMPO', '000001', 
		'2016-08-08 13:00:00', '2016-08-08 17:00:00' ,
		'Tengo examen.', 'Alexandra Elisa Mora Juarez') 