﻿--Función para ver los permisos por parte del jefe temporal.
--Parametro de Entrada:  ID_JEFE_PERSONAL
--Parametro de Salida: ID_PERMISO, NOMBRE_COMPLETO_EMPLEADO, TIPO_AUSENCIA
CREATE OR REPLACE FUNCTION "PERMISOS".F_VER_PERMISOS_JPERSONAL(IN P_ID_JEFE_PERSONAL CHARACTER VARYING(10),
								OUT P_ID_PERMISO INTEGER,
								OUT P_NOMBRE_EMPLEADO TEXT,
								OUT P_TIPO_AUSENCIA CHARACTER VARYING(70)) 
RETURNS SETOF record AS 
$BODY$
 BEGIN
    RETURN query SELECT B."ID_PERMISO", 
			A."PRIMER_SEGUNDO_NOMBRE" ||' ' || A."PRIMER_SEGUNDO_APELLIDO" AS NOMBRE_COMPLETO,
			C."TIPO_AUSENCIA"
	FROM "PERMISOS"."TBL_EMPLEADOS" A
	LEFT JOIN "PERMISOS"."TBL_PERMISOS" B
	ON(A."ID_EMPLEADO" = B."ID_EMPLEADO")
	INNER JOIN "PERMISOS"."TBL_TIPOS_AUSENCIAS" C
	ON(B."ID_TIPO_AUSENCIA" = C."ID_TIPO_AUSENCIA")
	WHERE B."ESTADO_JEFE" = TRUE AND B."F_CAMBIO_ESTADO_JEFE" IS NOT NULL
		AND B."ESTADO_JPERSONAL" = FALSE AND B."F_CAMBIO_ESTADO_JPERSONAL" IS NULL 
		AND B."ESTADO_REVERTIR_PERMISO" = FALSE
	ORDER BY B."FECHA_SOLICITUD" ASC;
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_VER_PERMISOS_JPERSONAL('000200');