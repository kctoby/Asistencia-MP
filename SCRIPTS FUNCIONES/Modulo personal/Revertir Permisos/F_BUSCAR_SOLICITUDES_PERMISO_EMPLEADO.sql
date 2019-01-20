------------------------	R E V E R T I R		P E R M I S O S		------------------------
-- Mostrar los permisos que el empleado ha solicitado en el mes actual.
-- IN: El jefe ingresa el nombre completo del empleado o se le va autocompletando.
-- OUT: Retorna el id del permiso, tipo de ausencia y la fecha de solicitud. 
-- 	Siendo los permisos ordenados de forma descendente con este ultimo campo mencionado
CREATE OR REPLACE FUNCTION "PERMISOS".F_BUSCAR_SOLICITUDES_PERMISO_EMPLEADO(IN P_NOMBRE_COMPLETO TEXT,
									    OUT P_ID_PERMISO INTEGER,
									    OUT P_TIPO_AUSENCIA CHARACTER VARYING(70),
									    OUT P_FECHA_SOLICITUD DATE) 
RETURNS SETOF RECORD AS $$
DECLARE
 v_id_empleado character varying(10);
BEGIN
	SELECT C."ID_EMPLEADO" INTO v_id_empleado
	FROM "PERMISOS"."TBL_EMPLEADOS" C
	WHERE CONCAT(C."PRIMER_SEGUNDO_NOMBRE", ' ', C."PRIMER_SEGUNDO_APELLIDO")= P_NOMBRE_COMPLETO;
	
	RETURN query SELECT A."ID_PERMISO", D."TIPO_AUSENCIA", A."FECHA_SOLICITUD"::DATE
		     FROM "PERMISOS"."TBL_PERMISOS" A
		     INNER JOIN "PERMISOS"."TBL_TIPOS_AUSENCIAS" D
		     ON(A."ID_TIPO_AUSENCIA" = D."ID_TIPO_AUSENCIA")
		     WHERE A."ID_EMPLEADO" = v_id_empleado AND (to_char(A."FECHA_SOLICITUD"::date, 'MONTH') = (SELECT * FROM to_char(current_timestamp, 'MONTH')))
			   AND A."ESTADO_REVERTIR_PERMISO" = FALSE
		     ORDER BY A."FECHA_SOLICITUD" DESC;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_BUSCAR_SOLICITUDES_PERMISO_EMPLEADO('Alfredo Augusto Dormes Valladares');