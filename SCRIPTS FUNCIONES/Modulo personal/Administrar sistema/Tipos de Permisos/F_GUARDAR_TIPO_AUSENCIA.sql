-------------------	A D M I N I S T R A R     S I S T E M A 	T I P O S	A U S E N C I A S	-------------------
-- Función para guardar cuando se cree un tipo de ausencia.
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_TIPO_AUSENCIA(IN P_TIPO_AUSENCIA CHARACTER VARYING(60), 
							      IN P_GOZA_SUELDO BOOLEAN, 
							      IN P_GUIA CHARACTER VARYING(8),
							      IN P_TIEMPO_MAXIMO INTEGER) 
RETURNS VOID AS $$
DECLARE
v_fecha_creacion timestamp without time zone;
v_fecha_modificacion timestamp without time zone;
BEGIN
	--Obtener la fecha actual
	v_fecha_creacion:= to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_fecha_modificacion := v_fecha_creacion;

	IF(P_GUIA = 'DIAS')THEN
		INSERT INTO "PERMISOS"."TBL_TIPOS_AUSENCIAS"("TIPO_AUSENCIA", "FECHA_MODIFICACION", "FECHA_CREACION", 
			    "GOZA_SUELDO", "TIEMPO_MAXIMO_HORAS", "TIEMPO_MAXIMO_DIAS")
		VALUES (P_TIPO_AUSENCIA, v_fecha_modificacion, v_fecha_creacion, 
			    P_GOZA_SUELDO, null, P_TIEMPO_MAXIMO);
	  ELSE IF(P_GUIA = 'HORAS')THEN
		INSERT INTO "PERMISOS"."TBL_TIPOS_AUSENCIAS"("TIPO_AUSENCIA", "FECHA_MODIFICACION", "FECHA_CREACION", 
			    "GOZA_SUELDO", "TIEMPO_MAXIMO_HORAS", "TIEMPO_MAXIMO_DIAS")
		VALUES (P_TIPO_AUSENCIA, v_fecha_modificacion, v_fecha_creacion, 
			    P_GOZA_SUELDO, P_TIEMPO_MAXIMO, null);
	  END IF;
	END IF;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutando 
SELECT * FROM "PERMISOS".F_GUARDAR_TIPO_AUSENCIA('LUTO EXTRA FAMILIAR 3', 'TRUE', 'DIAS', 4);