﻿/*	Funcion guardar en bitácora. 	*/
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_BITACORA(IN P_ID_EMPLEADO CHARACTER VARYING(10), 
							 IN P_FECHA_HORA TIMESTAMP WITHOUT TIME ZONE, 
							 IN P_DESCRIPCION_ACCION CHARACTER VARYING(600)) 
RETURNS void AS $BODY$
DECLARE 
 BEGIN
	INSERT INTO "PERMISOS"."TBL_BITACORA"(
            "ID_EMPLEADO", "FECHA_HORA", "DESCRIPCION_ACCION")
	VALUES (P_ID_EMPLEADO, P_FECHA_HORA, P_DESCRIPCION_ACCION);

 END;
$BODY$
LANGUAGE plpgsql;


/*	Ejecutar la función.	*/
SELECT "PERMISOS".F_GUARDAR_BITACORA('000028', '2016-02-21 09:15:03', 'Probando');