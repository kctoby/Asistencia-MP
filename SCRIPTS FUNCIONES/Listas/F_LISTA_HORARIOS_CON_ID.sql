﻿-------------------	A D M I N I S T R A R     S I S T E M A     M O D I F I C A C I O N    U S U A R I O	-------------------
--Lista de Horarios con id
CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTA_HORARIOS_CON_ID() 
RETURNS TABLE(ID_TIPO_HORARIO INTEGER, TIPO_HORARIO CHARACTER VARYING) AS $$
DECLARE
BEGIN
	RETURN query
		SELECT B."ID_TIPO_HORARIO", B."TIPO_HORARIO"
		FROM "PERMISOS"."TBL_TIPOS_HORARIOS" B;
END;
$$ LANGUAGE 'plpgsql';


--Ejecutando la función
SELECT * FROM "PERMISOS".F_LISTA_HORARIOS_CON_ID();