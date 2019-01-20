-------------------	A D M I N I S T R A R     S I S T E M A 	T I P O S	A U S E N C I A S	-------------------
-- Función para guardar cuando se modifica un tipo de ausencia.   
--    P_ID_TIPO_AUSENCIA es el id del tipo ausencia a modificar.
CREATE OR REPLACE FUNCTION "PERMISOS".F_MODIFICAR_TIPO_AUSENCIA(IN P_ID_TIPO_AUSENCIA INTEGER,
								IN P_RENOMBRAR_TIPO_AUSENCIA CHARACTER VARYING(60), 
								IN P_GOZA_SUELDO BOOLEAN, 
								IN P_GUIA CHARACTER VARYING(8),
								IN P_TIEMPO_MAXIMO INTEGER) 
RETURNS VOID AS $$
DECLARE
v_fecha_modificacion timestamp without time zone;
BEGIN
	--Obtener la fecha actual
	v_fecha_modificacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

	IF(P_GUIA = 'DIAS')THEN
		UPDATE "PERMISOS"."TBL_TIPOS_AUSENCIAS"
		SET "TIPO_AUSENCIA" = P_RENOMBRAR_TIPO_AUSENCIA, "FECHA_MODIFICACION" = v_fecha_modificacion, 
		       "GOZA_SUELDO" = P_GOZA_SUELDO, "TIEMPO_MAXIMO_DIAS" = P_TIEMPO_MAXIMO, 
		       "TIEMPO_MAXIMO_HORAS" = null
		 WHERE "ID_TIPO_AUSENCIA" = P_ID_TIPO_AUSENCIA;
	  ELSE IF(P_GUIA = 'HORAS')THEN
		UPDATE "PERMISOS"."TBL_TIPOS_AUSENCIAS"
		SET "TIPO_AUSENCIA" = P_RENOMBRAR_TIPO_AUSENCIA, "FECHA_MODIFICACION" = v_fecha_modificacion, 
		       "GOZA_SUELDO" = P_GOZA_SUELDO, "TIEMPO_MAXIMO_DIAS" = null, 
		       "TIEMPO_MAXIMO_HORAS" = P_TIEMPO_MAXIMO
		 WHERE "ID_TIPO_AUSENCIA" = P_ID_TIPO_AUSENCIA;
	  END IF;
	END IF;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutando 
SELECT * FROM "PERMISOS".F_MODIFICAR_TIPO_AUSENCIA(6,'AUSENCIA POR EXAMEN', 'TRUE', 'HORAS', 5);