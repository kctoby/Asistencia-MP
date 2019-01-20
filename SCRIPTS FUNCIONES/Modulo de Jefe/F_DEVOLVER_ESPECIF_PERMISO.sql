﻿CREATE OR REPLACE FUNCTION "PERMISOS".F_DEVOLVER_ESPECIF_PERMISO(IN P_ID_PERMISO INTEGER, OUT P_NOMBRE_COMPLETO TEXT,
				OUT P_TIPO_AUSENCIA CHARACTER VARYING(70), OUT P_FECHA_SOLICITUD TIMESTAMP WITHOUT TIME ZONE,
				OUT P_FECHA_INICIO TIMESTAMP WITHOUT TIME ZONE, OUT P_FECHA_FIN TIMESTAMP WITHOUT TIME ZONE,
				OUT DESCRIPCION CHARACTER VARYING(60)) 
RETURNS SETOF record AS 
$BODY$
 BEGIN
	
     
    RETURN query SELECT B."PRIMER_SEGUNDO_NOMBRE" || ' ' || B."PRIMER_SEGUNDO_APELLIDO" AS NOMBRE_COMPLETO,
			C."TIPO_AUSENCIA", A."FECHA_SOLICITUD", A."FECHA_INICIO", A."FECHA_FIN", A."DESCRIPCION_PERMISO"
		FROM "PERMISOS"."TBL_PERMISOS" A
		INNER JOIN "PERMISOS"."TBL_EMPLEADOS" B
		ON (A."ID_EMPLEADO" = B."ID_EMPLEADO")
		INNER JOIN "PERMISOS"."TBL_TIPOS_AUSENCIAS" C
		ON(A."ID_TIPO_AUSENCIA" = C."ID_TIPO_AUSENCIA")
		WHERE A."ID_PERMISO" = P_ID_PERMISO;
   
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * 
FROM "PERMISOS".F_DEVOLVER_ESPECIF_PERMISO(1);