﻿-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
--Lista de usuarios creados
CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTA_USUARIOS_CREADOS() 
RETURNS TABLE(NOMBRE_USUARIO CHARACTER VARYING(100)) AS $$ 
BEGIN
RETURN query SELECT A."NOMBRE_USUARIO"
		FROM "PERMISOS"."TBL_EMPLEADOS" A
		WHERE A."NOMBRE_USUARIO" IS NOT NULL;
END;
$$ LANGUAGE 'plpgsql';

SELECT * FROM "PERMISOS".F_LISTA_USUARIOS_CREADOS();