﻿CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTA_REGIONALES() 
RETURNS TABLE(ID_REGIONAL_MODALIDAD CHARACTER VARYING, NOMBRE_REGIONAL CHARACTER VARYING) AS 
$BODY$
 BEGIN
 RETURN query SELECT "ID_REGIONAL_MODALIDAD", "NOMBRE_REGIONAL"
	      FROM "PERMISOS"."TBL_REGIONALES";
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar función
SELECT * FROM "PERMISOS".F_LISTA_REGIONALES();