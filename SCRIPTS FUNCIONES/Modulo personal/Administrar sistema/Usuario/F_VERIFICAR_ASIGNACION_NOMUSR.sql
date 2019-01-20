-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
CREATE OR REPLACE FUNCTION "PERMISOS".F_VERIFICAR_ASIGNACION_NOMUSR(IN P_ID_EMPLEADO CHARACTER VARYING(10),
								    OUT P_NOMBRE_APELLIDO TEXT, 
								    OUT P_GUIA CHARACTER VARYING(40)) 
RETURNS SETOF RECORD AS $$
DECLARE
 v_estado_v boolean;
BEGIN
	--Obtener el nombre de usuario si es que lo tiene
	SELECT A."ESTADO_V"
	INTO v_estado_v
	FROM "PERMISOS"."TBL_EMPLEADOS" A
	WHERE A."ID_EMPLEADO" = P_ID_EMPLEADO;
	
	IF(v_estado_v = FALSE) THEN
		RETURN query SELECT CONCAT(E."PRIMER_SEGUNDO_NOMBRE", ' ', E."PRIMER_SEGUNDO_APELLIDO") AS P_NOMBRE_APELLIDO, 
				'No tiene usuario creado.'::character varying
				FROM "PERMISOS"."TBL_EMPLEADOS" E
				WHERE E."ID_EMPLEADO" = P_ID_EMPLEADO;
				
	   ELSE IF(v_estado_v = TRUE) THEN
		RETURN query SELECT CONCAT(F."PRIMER_SEGUNDO_NOMBRE", ' ', F."PRIMER_SEGUNDO_APELLIDO") AS P_NOMBRE_APELLIDO, 
				'Ya tiene usuario creado.'::character varying
			     FROM "PERMISOS"."TBL_EMPLEADOS" F
			     WHERE F."ID_EMPLEADO" = P_ID_EMPLEADO;
	   END IF;
	END IF;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_VERIFICAR_ASIGNACION_NOMUSR('000003');