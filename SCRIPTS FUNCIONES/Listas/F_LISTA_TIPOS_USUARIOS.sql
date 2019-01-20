-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
CREATE OR REPLACE FUNCTION "PERMISOS".F_LISTA_TIPOS_USUARIOS() 
RETURNS TABLE(TIPO_USUARIO character varying) AS 
$BODY$
DECLARE
 BEGIN    
    RETURN query SELECT A."TIPO_USUARIO"
		 FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A;
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--+++++++++++++++++++++++++++++++++++++++++++++++++
SELECT * FROM "PERMISOS".F_LISTA_TIPOS_USUARIOS();