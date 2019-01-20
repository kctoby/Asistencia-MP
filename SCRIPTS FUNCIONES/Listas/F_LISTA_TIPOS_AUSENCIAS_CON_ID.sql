-------------------	A D M I N I S T R A R     S I S T E M A 	T I P O S	A U S E N C I A S	-------------------
-- Función que retorna la lista de tipos de ausencias que existen con su respectivo id.
CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTA_TIPOS_AUSENCIAS_CON_ID() 
RETURNS TABLE(ID_TIPO_AUSENCIA INTEGER, TIPO_AUSENCIA CHARACTER VARYING(70))AS $$
BEGIN
	RETURN query SELECT A."ID_TIPO_AUSENCIA", A."TIPO_AUSENCIA"
		     FROM "PERMISOS"."TBL_TIPOS_AUSENCIAS" A
		     ORDER BY "ID_TIPO_AUSENCIA";
END;
$$ LANGUAGE 'plpgsql';


--Ejecutando 
SELECT * FROM "PERMISOS".F_LISTA_TIPOS_AUSENCIAS_CON_ID();