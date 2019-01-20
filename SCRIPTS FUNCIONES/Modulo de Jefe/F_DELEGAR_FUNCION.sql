--Función para bdelegar el empleado que se ha seleccionado
--Parametro de Entrada:  ID_EMPLEADO_DELEGAR, FECHA_INICIO y FECHA_FIN
--Parametro de Salida: ninguno
CREATE OR REPLACE FUNCTION "PERMISOS".F_DELEGAR_FUNCION(IN P_ID_EMPLEADO_DELEGAR CHARACTER VARYING(10),
							IN P_FECHA_INICIO DATE,
							IN P_FECHA_FIN DATE) 
RETURNS VOID AS 
$BODY$
DECLARE
	v_id_tipo_usuario_jtemporal integer;
	v_fecha_agregacion timestamp without time zone;
	v_id_tipo_usuario_asignado integer;
	v_id_tjefe INTEGER;
	v_id_tjpersonal INTEGER;
	v_id_tjtemporal INTEGER;
	v_id_templeado_normal INTEGER;
 BEGIN
   v_fecha_agregacion := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;

   --Obtener el id tipo usuario jefe temporal
   SELECT "ID_TIPO_USUARIO"
   INTO v_id_tipo_usuario_jtemporal
   FROM "PERMISOS"."TBL_TIPOS_USUARIOS"
   WHERE "TIPO_USUARIO" = 'JEFE TEMPORAL';

   --Ver que tipo de usuario tiene asignado el empleado que se desea delegar
   SELECT "ID_TIPO_USUARIO"
   INTO v_id_tipo_usuario_asignado
   FROM "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"
   WHERE "ID_EMPLEADO" = P_ID_EMPLEADO_DELEGAR AND "ESTADO" = TRUE;

   IF (v_id_tipo_usuario_asignado <> v_id_tipo_usuario_jtemporal) THEN
	UPDATE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"
	   SET "ESTADO"=FALSE
	 WHERE "ID_TIPO_USUARIO" = v_id_tipo_usuario_asignado AND "ID_EMPLEADO" = P_ID_EMPLEADO_DELEGAR;
	 
	INSERT INTO "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"("ID_TIPO_USUARIO", "ID_EMPLEADO", "FECHA_AGREGADO", "FECHA_INICIO", "FECHA_FIN", "ESTADO")
	VALUES (v_id_tipo_usuario_jtemporal, P_ID_EMPLEADO_DELEGAR, v_fecha_agregacion, P_FECHA_INICIO, P_FECHA_FIN, TRUE);
   END IF;
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_DELEGAR_FUNCION('000028', CURRENT_DATE, CURRENT_DATE +17);