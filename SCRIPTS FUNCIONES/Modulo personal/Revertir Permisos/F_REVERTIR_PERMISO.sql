------------------------	R E V E R T I R		P E R M I S O S		------------------------
--Solo recibe el permisos a revertir, por sugerencia establecer un estado el cual será TRUE (en el campo ESTADO_REVERTIR_PERMISO) en la tabla de permisos.
CREATE OR REPLACE FUNCTION "PERMISOS".F_REVERTIR_PERMISO(IN P_ID_PERMISO INTEGER) 
RETURNS VOID AS $$
BEGIN
	UPDATE "PERMISOS"."TBL_PERMISOS" A
	   SET "ESTADO_REVERTIR_PERMISO" = TRUE
	 WHERE A."ID_PERMISO" = P_ID_PERMISO;

END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_REVERTIR_PERMISO(3);