﻿--Función para APROBAR o DENEGAR un permiso ya sea el jefe inmediato o jefe temporal
CREATE OR REPLACE FUNCTION "PERMISOS".F_APR_DNG_PERMISO_JPERSONAL(IN P_ID_JEFE_PERSONAL CHARACTER VARYING(10),
								  IN P_ID_PERMISO INTEGER, 
								  IN P_VEREDICTO_PARTICULAR BOOLEAN,
								  IN P_DESCRIPCION_DENEGACION_JEFE CHARACTER VARYING(100)) 
RETURNS VOID AS 
$BODY$
DECLARE
  v_fcambio_estado_jpersonal timestamp without time zone;
BEGIN
	v_fcambio_estado_jpersonal := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

	UPDATE "PERMISOS"."TBL_PERMISOS"
	SET "ID_EMPLEADO_PERSONAL" = P_ID_JEFE_PERSONAL, 
	    "ESTADO_JPERSONAL" = P_VEREDICTO_PARTICULAR, 
	    "F_CAMBIO_ESTADO_JPERSONAL" = v_fcambio_estado_jpersonal,
	    "DESCRIPCION_DENEGACION_JEFE" = P_DESCRIPCION_DENEGACION_JEFE
	WHERE "ID_PERMISO" = P_ID_PERMISO;

END;
$BODY$ 
LANGUAGE 'plpgsql';


SELECT * FROM "PERMISOS".F_APR_DNG_PERMISO_JPERSONAL('000242',7,'TRUE', null);