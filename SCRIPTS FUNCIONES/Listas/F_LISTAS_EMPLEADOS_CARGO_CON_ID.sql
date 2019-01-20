﻿--Función para buscar el empleado que se desea delegar.
--Parametro de Entrada:  ID_EMPLEADO_JEFE
--Parametro de Salida: ID_EMPLEADO & NOMBRE_COMPLETO_EMPLEADO de todos aunque no tenga usuario.
-- En el caso que seleccione a alguien que no tiene usuario creado sería validarlo aparte.
CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTAS_EMPLEADOS_CARGO_CON_ID(IN P_ID_EMPLEADO_JEFE CHARACTER VARYING(10)) 
RETURNS TABLE(ID_EMPLEADO CHARACTER VARYING(10), NOMBRE_COMPLETO TEXT) AS 
$BODY$
 BEGIN
	 RETURN query SELECT "ID_EMPLEADO", CONCAT("PRIMER_SEGUNDO_NOMBRE", ' ', "PRIMER_SEGUNDO_APELLIDO") AS NOMBRE_COMPLETO
		      FROM "PERMISOS"."TBL_EMPLEADOS"
		      WHERE "ID_JEFE" = P_ID_EMPLEADO_JEFE AND "NOMBRE_USUARIO" IS NOT NULL;     
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_LISTAS_EMPLEADOS_CARGO_CON_ID('000001');