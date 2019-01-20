------------------------	R E V E R T I R		P E R M I S O S		------------------------
-- Mostrar los permisos que el empleado ha solicitado en el mes actual.
-- IN: El jefe ingresa el id del empleado.
-- OUT: Retorna el id del permiso, tipo de ausencia y la fecha de solicitud. 
-- 	Siendo los permisos ordenados de forma descendente con este ultimo campo mencionado
CREATE OR REPLACE FUNCTION "PERMISOS".F_BUSCAR_SOLICITUDES_PERMISO_EMPLEADO_ID(IN P_ID_EMPLEADO CHARACTER VARYING(10),
									    OUT P_ID_PERMISO INTEGER,
									    OUT P_TIPO_AUSENCIA CHARACTER VARYING(70),
									    OUT P_FECHA_SOLICITUD DATE) 
RETURNS SETOF RECORD AS $$
BEGIN
	RETURN query SELECT A."ID_PERMISO", D."TIPO_AUSENCIA", A."FECHA_SOLICITUD"::DATE
		     FROM "PERMISOS"."TBL_PERMISOS" A
		     INNER JOIN "PERMISOS"."TBL_TIPOS_AUSENCIAS" D
		     ON(A."ID_TIPO_AUSENCIA" = D."ID_TIPO_AUSENCIA")
		     WHERE A."ID_EMPLEADO" = P_ID_EMPLEADO AND (to_char(A."FECHA_SOLICITUD"::date, 'MONTH') = (SELECT * FROM to_char(current_timestamp, 'MONTH')))
			   AND A."ESTADO_REVERTIR_PERMISO" = FALSE
		     ORDER BY A."FECHA_SOLICITUD" DESC;
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_BUSCAR_SOLICITUDES_PERMISO_EMPLEADO_ID('000028');