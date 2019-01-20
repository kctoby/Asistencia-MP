-------------------	A D M I N I S T R A R     S I S T E M A 	U S U A R I O	-------------------
--Cuando se crea el usuario también se necesita guardar en la tabla de TBL_EMPLEADOS_TUSUARIO,
--para este caso solo interesa los parametros de entrada del ID_EMPLEADO, TIPO_USUARIO.
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_USUARIO_TUSR(IN P_ID_EMPLEADO CHARACTER VARYING(10), 
							     IN P_TIPO_USUARIO CHARACTER VARYING(50))
RETURNS VOID AS $$
DECLARE
v_id_tipo_usuario integer;
v_fecha_agregado timestamp without time zone;
v_estado boolean;
BEGIN
	--Fecha actual
	v_fecha_agregado := to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_estado := TRUE;
	
	--Obtener el tipo de usuario de acuerdo al nombre del tipo de usuario
	SELECT A."ID_TIPO_USUARIO" INTO v_id_tipo_usuario
	FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A
	WHERE A."TIPO_USUARIO" = P_TIPO_USUARIO;
	
	INSERT INTO "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"("ID_TIPO_USUARIO", "ID_EMPLEADO", "FECHA_AGREGADO", "FECHA_INICIO", 
							  "FECHA_FIN", "ESTADO")
	VALUES (v_id_tipo_usuario, P_ID_EMPLEADO, v_fecha_agregado, null, null, v_estado);
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_TUSR('000002','EMPLEADO');